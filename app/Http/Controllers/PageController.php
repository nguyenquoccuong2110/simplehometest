<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Validator;

class PageController extends AppController
{
        public function about(){
            $this->View["News"]=App\News::where("status",1)->orderBy("updated_at","DESC")->limit(4)->get();
            $this->View['TSeo']['title']="About us";
            $page=array();
            $page[1]=App\Page::find(1);
            $page[2]=App\Page::find(2);
            $page[3]=App\Page::find(3);
            $page[4]=App\Page::find(4);
            $this->View["Page"]=$page;
            return view("default.page.page",$this->View);
        }
        public function contact(){
            $this->View['TSeo']['title']="Contact us";
            return view("default.page.contact",$this->View);
        }
        public function postcontact(Request $request){
            $validater=Validator::make($request->all(),[
                "name"=>"required",
                "email"=>"required|email",
                "phone"=>"required",
                "subject"=>"required",
                "content"=>"required"
            ]);
            if($validater->fails()){
                return redirect("/contact")->withErrors($validater)->withInput();
            }else{
                $TNew=new App\Contact();
                $TNew->name=$request->input("name");
                $TNew->email=$request->input("email");
                $TNew->phone=$request->input("phone");
                $TNew->subject=$request->input("subject");
                $TNew->content=$request->input("content");
                $TNew->save();
                $request->session()->flash("success","Thank you for contact.");
                return redirect("/contact");
            }
        }
}
