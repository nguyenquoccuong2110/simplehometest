<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use image;
use Validator;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

       
        if($request->isMethod("post")){
            $validate=Validator::make($request->all(),[
                    "name"=>"required",
                    "sitename"=>"required",
                    "email"=>"required|email",
                    "phone"=>"required",
                    "address"=>"required"
                  


            ]
      /*      ,[
                    "name.required"=>"Vui lòng nhập tên. ",
                    "sitename.required"=>"Vui lòng nhập tên site.",
                    "email.requried"=>"Vui lòng nhập Email. ",
                    "email.email"=>"Vui lòng nhập đúng định dạng Email. ",
                    "phone.required"=>"Vui lòng nhập số điện thoại. ",
                    "address.required"=>"Vui lòng nhập địa chỉ. "

            ]*/
          );
            if($validate->fails()){
                return redirect("/admin/index/index")->withErrors($validate)->withInput();
            }else{

                $TNew=App\General::findOrNew(1);
                $TNew->name=$request->input("name");
                $TNew->sitename=$request->input("sitename");
                $TNew->phone=$request->input("phone");
                $TNew->email=$request->input("email");
                $TNew->address=$request->input("address");
                $TNew->description=$request->input("description");
                $TNew->fax=$request->input("fax");
                $TNew->factory=$request->input("factory");
                $TNew->mainproduct1=$request->input("mainproduct1");
                $TNew->mainproduct2=$request->input("mainproduct2");
                $TNew->mainproduct3=$request->input("mainproduct3");

                $TNew->socialate=json_encode(array(
                        "facebook"=>$request->input("facebook"),
                        "youtube"=>$request->input("youtube"),
                        "google"=>$request->input("google"),
                        "skype"=>$request->input("skype"),
                         "twitter"=>$request->input("twitter"),
                          "pinterest"=>$request->input("pinterest"),

                ));
                $TNew->seo=json_encode(array(

                        "title"=>(empty($request->input("seo_title")) ? $request->input("name") : $request->input("seo_title")),
                        "description"=>(empty($request->input("seo_description")) ? $request->input("name") : $request->input("seo_description")),
                        "keyword"=>(empty($request->input("seo_keyword")) ? $request->input("name") : $request->input("seo_keyword"))
                ));
                $picture=$request->file("picture");
                if($picture){
                    $name_picture="index_".time().".".$picture->getClientOriginalExtension();
                    $picture->move(NEWS_PATH,$name_picture);
                    $TNew->picture=$name_picture;
                }
                $TNew->save();

                $logo=$request->file("logo");

                if($logo){
                    $logo->move(NEWS_PATH,"logo.png");
                }
            
                $request->session()->flash("success","Changes have been saved. ");
                return redirect("/admin/index/index");
            }
        }
         $this->View['data']=App\General::find(1);
         $seo=(array)json_decode($this->View['data']['seo']);
         $socialate=(array)json_decode($this->View['data']['socialate']);

         @$this->View['data']['facebook']=$socialate['facebook'];
          @$this->View['data']['youtube']=$socialate['youtube'];
           @$this->View['data']['google']=$socialate['google'];
            @$this->View['data']['skype']=$socialate['skype'];
             @$this->View['data']['pinterest']=$socialate['pinterest'];
              @$this->View['data']['twitter']=$socialate['twitter'];
            
             @$this->View['data']['seo_title']=$seo['title'];
             @$this->View['data']['seo_keyword']=$seo['keyword'];
             @$this->View['data']['seo_description']=$seo['description'];
        return view("admin.index.index",$this->View);
    }
     public function uploaduser(Request $request)
    {
                 if ($request->hasFile('upload')) {
                            $fileName=md5(date("Y-m-d H:i:s")).".png";
                                $request->file('upload')->move(PUBLIC_PATH."upload/user_upload/",$fileName);
                                

                    }
                       $html = "";
                        $html .= "<script type='text/javascript'>";
                        $html .= " var funcNum = "  .$request->input("CKEditorFuncNum") .";";
                        $html .= " var url = '/public/upload/user_upload/{$fileName}';";
                        $html .= " var message = \"Uploaded file successfully\";";
                        $html .= "";
                        $html .= " window.parent.CKEDITOR.tools.callFunction(funcNum, url, message);";
                        $html .= "</script>";

           echo $html;exit;
    }
   
}
