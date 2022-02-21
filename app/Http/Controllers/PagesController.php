<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PagesController extends Controller
{
    // create shortcodes logic for admin pages CKEditors
    public function shortcodeExtractor($html) {
        $pattern = '/\[shortcode(.*?)?\](?:(.+?)?\[\/shortcode\])?/';
        $data = array();

        preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
        foreach ($matches as $key => $match) {
            $url_like_params = str_replace('" ', '&', trim($match[1]));
            $url_like_params = str_replace('"', '', $url_like_params);
            parse_str($url_like_params, $params);

            $data[] = array('shortcode' => $match[0], 'params' => $params);
        }

        foreach($data as $shortcode) {
            $view = view('partials/shortcode-' . $shortcode['params']['type']);
            $view = $view->render();

            $html = str_replace($shortcode['shortcode'], $view, $html);
        }

        echo $html;
    }

    public function getPageView() {
        $route = Route::getCurrentRoute()->getName();
        if($route == 'logged-home') {
            $route = 'home';
        }
        return view('pages/index-page-with-content', ['page' => Page::where(array('slug' => $route))->get()->first()]);
    }
}
