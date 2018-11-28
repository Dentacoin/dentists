<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadAssetsController extends Controller
{
    protected function getView()   {
        return view('pages/single-page', []);
    }
}
