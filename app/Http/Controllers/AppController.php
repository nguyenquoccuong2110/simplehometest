<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
class AppController extends Controller
{
    protected $View;
    public function __construct(){
        $this->View['TGeneral']=$General=App\General::find(1);
        $this->View["TSeo"]=(array)json_decode($General['seo']);
        $this->View['TSocial']=(array)json_decode($General['socialate']);
        $this->View['TCate']=App\Cate::where("status",1)->orderBy("position","ASC")->get();
    }
}
