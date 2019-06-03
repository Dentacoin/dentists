<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getView() {
        if((new UserController())->checkSession()) {
            return $this->getLoggedView();
        } else {
            return $this->getNotLoggedView();
        }
    }

    protected function getNotLoggedView()   {
        //$latest_blog_articles = json_decode(file_get_contents('https://blog.dentacoin.com/dumb-latest-posts/'));
        $latest_blog_articles = [];
        $testimonials = DB::connection('mysql2')->table('user_expressions')->leftJoin('media', 'user_expressions.media_id', '=', 'media.id')->select('user_expressions.*', 'media.name as media_name', 'media.alt as media_alt')->orderByRaw('user_expressions.order_id ASC')->get()->toArray();

        return view('pages/homepage', ['testimonials' => $testimonials, 'applications' => $this->getDentacoinHubApplications(), 'latest_blog_articles' => $latest_blog_articles]);
    }

    protected function getLoggedView()   {
        //LOGGED show hub
        $params = ['applications' => $this->getDentacoinHubApplications()];
        return view('pages/logged-user/homepage', $params);
    }

    public function getDentacoinHubApplications() {
        $applications = DB::connection('mysql2')->table('applications')->select('applications.*')->orderByRaw('applications.order_id ASC')->get()->toArray();
        foreach($applications as $application) {
            $application->logo_url = DB::connection('mysql2')->table('media')->where('id', $application->logo_id)->select('media.name')->get()->first()->name;
            $application->media_url = DB::connection('mysql2')->table('media')->where('id', $application->media_id)->select('media.name')->get()->first()->name;
            $application->media_created_at = DB::connection('mysql2')->table('media')->where('id', $application->media_id)->select('media.created_at')->get()->first()->created_at;
            $application->popup_logo_url = DB::connection('mysql2')->table('media')->where('id', $application->popup_logo_id)->select('media.name')->get()->first()->name;
        }

        return $applications;
    }

    public function redirectToHome() {
        return redirect()->route('home');
    }
}

