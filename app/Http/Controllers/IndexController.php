<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
class IndexController extends AppController
{
    public function index(){
        $this->View['Product']=App\Product::where("status",1)->limit(9)->get();
        
        return view("default.index.index",$this->View);
    }
}
