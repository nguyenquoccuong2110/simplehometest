<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App;
use Image;
use Excel;
class NewsController extends Controller
{
    protected $View=[];
   
    /*
        NEWS
    */
    public function add(Request $request){
         $data=[];
 
        $data['status']=1;
        
        if($request->isMethod("post")){
            $validator=Validator::make($request->all(),[
                "name"=>"required|unique:pl_news",
           
                "description"=>"required",
                "picture"=>"required"
            ]/*,[
                    "name.required"=>"Vui lòng nhập tên tin tức",
                   "name.unique"=>"Tin tức này đã tồn tại ",
                
                   "description.required"=>"Vui lòng nhập mô tả ",
                   "picture.required"=>"Vui lòng chọn hình ảnh tin tức "
            ]*/);
            if($validator->fails()){
                return redirect("/admin/news/add")->withErrors($validator)->withInput();
            }else{
                $TNew=new App\News();
                $TNew->name=$request->input("name");
                $TNew->alias=App\MrData::toAlias2($request->input("name"));
                $TNew->description=$request->input("description");
                $TNew->counter=1;
                $TNew->content=$request->input("content");

                $TNew->status=$request->input("status");
              
                 $TNew->seo=json_encode([
                        'title'=> (empty($request->input("seo_title"))) ? $request->input("name") : $request->input("seo_title"),

                         'description'=> (empty($request->input("seo_description"))) ? $request->input("name") : $request->input("seo_description"),

                        'keyword'=> (empty($request->input("seo_keyword"))) ? $request->input("name") : $request->input("seo_keyword"),

                 ]);
                 $picture=$request->file("picture");
                 $name_picture="news_".time().".".$picture->getClientOriginalExtension();
                 $picture->move(NEWS_PATH,$name_picture);
                 Image::make(NEWS_PATH.$name_picture)->resize(424,238)->save(NEWS_PATH."big/".$name_picture);
                 Image::make(NEWS_PATH.$name_picture)->resize(273,154)->save(NEWS_PATH."small/".$name_picture);
                 $TNew->picture=$name_picture;

                $TNew->save();
                $request->session()->flash("success"," Changes have been saved. ");
                return redirect("/admin/news/add");
            }
        }

        $this->View['data']=$data;
        return view("admin.news.add",$this->View);
    }
     public function lists(Request $request){
        $search="";
        if($request->isMethod("get")){
            $search=$request->input("search");
        }
        $this->View['search']=$search;
        $this->View['data_list']=App\News::where("name","LIKE","%$search%")->orderBy("id","DESC")->paginate(20);
        return view("admin.news.list",$this->View);

    }
    public function remove(Request $request){
         if($request->isMethod("post")){
            if($id=$request->input("id")){
                $data=App\News::find($id);
               
                $data->delete();
                echo 'destroy success';exit;
            }
        }

    }
    public function edit(Request $request){
        $data=[];
        if($id=$request->input('id')){
            $TUpdated=App\News::find($id);
            if($request->isMethod("post")){
                $validator=Validator::make($request->all(),[
                        "name"=>"required|unique:pl_news,name,{$id},id",
                     
                        "description"=>"required",
                     
                    ]);
                if($validator->fails()){
                    return redirect("/admin/news/edit?id=".$id)->withErrors($validator)->withInput();
                }else{
                    $TUpdated->name=$request->input("name");
                    $TUpdated->alias=App\MrData::toAlias2($request->input("name"));
                    $TUpdated->description=$request->input("description");
                  
                    $TUpdated->content=$request->input("content");

                    $TUpdated->status=$request->input("status");
             
                    $TUpdated->seo=json_encode([
                            'title'=> (empty($request->input("seo_title"))) ? $request->input("name") : $request->input("seo_title"),

                             'description'=> (empty($request->input("seo_description"))) ? $request->input("name") : $request->input("seo_description"),

                            'keyword'=> (empty($request->input("seo_keyword"))) ? $request->input("name") : $request->input("seo_keyword"),

                     ]);
                      $picture=$request->file("picture");
                    if($picture){
                       
                         $name_picture="news_".time().".".$picture->getClientOriginalExtension();
                         $picture->move(NEWS_PATH,$name_picture);
                         Image::make(NEWS_PATH.$name_picture)->resize(424,238)->save(NEWS_PATH."big/".$name_picture);
                          Image::make(NEWS_PATH.$name_picture)->resize(273,154)->save(NEWS_PATH."small/".$name_picture);
                          $TUpdated->picture=$name_picture;
                    }
                    $TUpdated->save();
                    $request->session()->flash("success","Changes have been saved.");
                    return redirect("/admin/news/edit?id=".$id);
                }
            }
            $data['id']=$TUpdated['id'];
            $data['name']=$TUpdated['name'];
            $data['alias']=$TUpdated['alias'];
            $data['status']=$TUpdated['status'];
            $data['description']=$TUpdated['description'];
            $data['content']=$TUpdated['content'];
          
            $data['picture']=$TUpdated['picture'];

            $seo=(array)json_decode($TUpdated['seo']);
            $data['seo_title']=$seo['title'];
            $data['seo_description']=$seo['description'];
            $data['seo_keyword']=$seo['keyword'];
            
            $this->View['data']=$data;
            return view("admin.news.edit",$this->View);
        }
    }
}
