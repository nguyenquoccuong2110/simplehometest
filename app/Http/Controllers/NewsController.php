<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class NewsController extends AppController
{
    public function index(){
    	$this->View["List_News"]=App\News::where("status",1)->orderBy("updated_at","DESC")->paginate(7);
    	$this->View['TSeo']['title']="NEWS";
        return view("default.news.index",$this->View);
    }
    public function detail($alias){
    	$this->View["Detail"]=$news=App\News::where("alias","LIKE",$alias)->first();
    	$this->View['TSeo']=(array)json_decode($news['seo']);
        return view("default.news.detail",$this->View);
    }
}
