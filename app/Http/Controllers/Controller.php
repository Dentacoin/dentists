<?php

namespace App\Http\Controllers;

use App\Menu;
use App\MenuElement;
use App\Page;
use App\PagesHtmlSection;
use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const POSTS_PER_PAGE = 8;
    const currencies = ['USD', 'EUR', 'GBP', 'RUB', 'INR', 'CNY', 'JPY'];

    public function __construct() {
        if(!empty(Route::getCurrentRoute()) && !Request::isMethod('post')) {
            View::share('mobile', $this->isMobile());
            View::share('meta_data', $this->getMetaData());
            View::share('socials', $this->getSocials());
            View::share('client_ip', $this->getClientIp());
        }
    }

    public static function instance() {
        return new Controller();
    }

    protected function getMetaData()    {
        $route = Route::getCurrentRoute()->getName();
        if($route == 'logged-home') {
            $route = 'home';
        }
        return Page::where(array('slug' => $route))->get()->first();
    }

    /*public function getCurrentDcnUsdRate()  {
        //API connection
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.coinmarketcap.com/v1/ticker/dentacoin/?convert=USD',
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(sizeof($resp) > 0)   {
            if(property_exists($resp[0], 'price_usd'))  {
                return (float)$resp[0]->price_usd;
            }else {
                return 0;
            }
        } else {
            return 0;
        }
    }*/

    protected function isMobile()   {
        return (new Agent())->isMobile();
    }

    protected function getSocials() {
        return DB::connection('mysql2')->table('socials')->leftJoin('media', 'socials.media_id', '=', 'media.id')->select('socials.*', 'media.name as media_name', 'media.alt as media_alt')->orderByRaw('socials.order_id ASC')->get();
    }

    protected function getSitemap() {
        $sitemap = App::make("sitemap");
        // set cache (key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean))
        // by default cache is disabled
        //$sitemap->setCache('laravel.sitemap', 3600);

        // check if there is cached sitemap and build new only if is not
        //if(!$sitemap->isCached())  {
        // add item to the sitemap (url, date, priority, freq)

        $sitemap->add(URL::to('/'), '2018-11-25T20:10:00+02:00', '1.0', 'daily');
        $sitemap->add(URL::to('how-it-works'), '2020-09-25T20:10:00+02:00', '1.0', 'weekly');
        $sitemap->add(URL::to('faq'), '2018-11-25T20:10:00+02:00', '0.8', 'monthly');
        $sitemap->add(URL::to('download-guides-assets'), '2018-11-25T20:10:00+02:00', '0.7', 'monthly');

        // get all posts from db
        //$posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
        //
        //// add every post to the sitemap
        //foreach ($posts as $post)
        //{
        //   $sitemap->add($post->slug, $post->modified, $post->priority, $post->freq);
        //}
        //}
        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap->render('xml');
    }

    protected function transliterate($str) {
        return str_replace(['а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п', 'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ','_'], ['a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p', 'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya','-','-'], mb_strtolower($str));
    }

    public function minifyHtml($response)   {
        $buffer = $response->getContent();
        if(strpos($buffer,'<pre>') !== false) {
            $replace = array(
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/"                  => '<?php ',
                "/\r/"                      => '',
                "/>\n</"                    => '><',
                "/>\s+\n</"                 => '><',
                "/>\n\s+</"                 => '><',
            );
        }
        else {
            $replace = array(
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/"                  => '<?php ',
                "/\n([\S])/"                => '$1',
                "/\r/"                      => '',
                "/\n/"                      => '',
                "/\t/"                      => '',
                "/ +/"                      => ' ',
            );
        }
        $buffer = preg_replace(array_keys($replace), array_values($replace), $buffer);
        $response->setContent($buffer);
        ini_set('zlib.output_compression', 'On'); // If you like to enable GZip, too!
        return $response;
    }

    protected function refreshCaptcha() {
        return response()->json(['captcha' => captcha_img()]);
    }

    protected function clearPostData($data) {
        foreach($data as &$value) {
            if(is_string($value)) {
                $value = trim(strip_tags($value));
            }
        }
        return $data;
    }

    public function encrypt($raw_text, $algorithm, $key) {
        $length = openssl_cipher_iv_length($algorithm);
        $iv = openssl_random_pseudo_bytes($length);
        $encrypted = openssl_encrypt($raw_text, $algorithm, $key, OPENSSL_RAW_DATA, $iv);
        //here we append the $iv to the encrypted, because we will need it for the decryption
        $encrypted_with_iv = base64_encode($encrypted) . '|' . base64_encode($iv);
        return $encrypted_with_iv;
    }

    public function decrypt($encrypted_text) {
        list($data, $iv) = explode('|', $encrypted_text);
        $iv = base64_decode($iv);
        $raw_text = openssl_decrypt($data, getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY'), 0, $iv);
        return $raw_text;
    }

    public function getClientIp() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function prepareUserName($userData) {
        if ($userData->is_dentist) {
            $api_enums = (new APIRequestsController())->getAllEnums();
            if (!(empty($api_enums)) && !empty($userData->title)) {
                foreach ($api_enums->titles as $key => $title) {
                    if ($userData->title == $key) {
                        return $title . ' ' . $userData->name;
                    }
                }
            } else {
                return $userData->name;
            }
        } else {
            return $userData->name;
        }
    }

    public function getDentacoinLocations($id) {
        return DB::connection('mysql2')->table('map_locations')
            ->leftJoin('map_countries', 'map_locations.country_id', '=', 'map_countries.id')
            ->leftJoin('clinics', 'map_locations.clinic_id', '=', 'clinics.id')
            ->leftJoin('location_types', 'map_locations.type_id', '=', 'location_types.id')
            ->leftJoin('media as clinic_media', 'clinics.media_id', '=', 'clinic_media.id')
            ->select('map_locations.*', 'clinics.name as clinic_name', 'clinics.link as website', 'clinics.link as clinic_link', 'location_types.id as location_type_id', 'clinic_media.name as clinic_media', 'clinic_media.alt as clinic_media_alt', 'map_countries.code as country_code', 'map_countries.name as country_name')
            ->where(array('map_locations.type_id' => $id))
            ->get()->toArray();
    }
}