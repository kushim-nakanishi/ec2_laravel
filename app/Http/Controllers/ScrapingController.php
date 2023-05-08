<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrapingController extends Controller
{
    public function Scraping(Request $req){
        if($req->url){
            $url = $req->url;
        }else{
            $url = $req->select_url;
        }
        return view('/scraping',['url'=>$url]);
    }
}
