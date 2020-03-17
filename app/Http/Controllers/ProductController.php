<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
class ProductController extends AppController
{
    public function product(){

        return view("default.product.allproduct",$this->View);
    }
     public function cate($alias){
        $this->View['Cate']=$cate=App\Cate::where("alias","LIKE",$alias)->first();
        if(!empty($this->View['Cate'])){
            $this->View['TSeo']=(array)json_decode($cate['seo']);
            $this->View['Product']=App\Product::where("status",1)->where("cid_cate",$cate['id'])->paginate(20);

            return view("default.product.cate",$this->View);
        }
    }
    public function detail($cate,$alias){
         $this->View['Cate']=$cate=App\Cate::where("alias","LIKE",$cate)->first();
        if(!empty($this->View['Cate'])){
            $this->View["Detail"]=$product=App\Product::where("alias","LIKE",$alias)->first();
            if(!empty($product)){
            $this->View['TSeo']=(array)json_decode($product['seo']);
            $this->View["News"]=App\News::where("status",1)->orderBy("updated_at","DESC")->limit(5)->get();
            $this->View['ProductOther']=App\Product::where("status",1)->where("id","!=",$product['id'])->where("cid_cate",$cate['id'])->limit(6)->get();

            return view("default.product.detail",$this->View);
            }
        }
    }
     public function search(Request $request){
        $key=$request->input('search',"");
     
            $this->View['Product']=App\Product::where("status",1)->where("name","LIKE","%$key%")->paginate(20);

            return view("default.product.search",$this->View);
        
    }
}
