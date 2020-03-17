<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Image;
use Validator;

class CateController extends Controller
{
    protected $View=array();
    public function add(Request $request){
        if($request->isMethod("post")){
            $validate=Validator::make($request->all(),[
                "name"=>"required|unique:pl_cate",
                "picture"=>"required"

            ]/*,[
                "name.required"=>"Vui lòng nhập tên dang mục ",
                "name.unique"=>"Tên danh mục đã tồn tại "
            ]*/);
            if($validate->fails()){
                return redirect("/admin/cate/add")->withErrors($validate)->withInput();
            }else{
                $TNew=new App\Cate();
                $TNew->name=$request->input("name");
                $TNew->alias=App\MrData::toAlias2($request->input("name"));

                $TNew->status=$request->input("status");
                $TNew->position=$request->input("position");
             
                $TNew->seo=json_encode(array(
                        "title"=> (empty($request->input("seo_title"))? $request->input("name") : $request->input("seo_title")),
                        "description"=>(empty($request->input("seo_description"))? $request->input("name") : $request->input("seo_description")),
                        "keyword"=>(empty($request->input("seo_keyword"))? $request->input("name") : $request->input("seo_keyword")),
                ));
                $picture=$request->file("picture");
                $name_picture="cate_".time().".".$picture->getClientOriginalExtension();
                $picture->move(CATE_PATH,$name_picture);
                Image::make(CATE_PATH.$name_picture)->resize(100,100)->save(CATE_PATH."big/".$name_picture);
                $TNew->picture=$name_picture;
                $TNew->save();
                $request->session()->flash("success","Changes have been saved.");
                return redirect("/admin/cate/add");
            }
        }
        $data=array();
        $data['status']=1;
     
        $data['position']=1;
        $this->View['data']=$data;
        return view("admin.cate.add",$this->View);
    }
    public function lists(Request $request){
        $this->View['search']="";
        $sql="%%";
        if($search=$request->input("search")){
            $sql="%$search%";
            $this->View['search']=$search;
        }
        $this->View['data_list']=App\Cate::where("name","LIKE",$sql)->orderBy('position',"ASC")->paginate(20);
        return view("admin.cate.lists",$this->View);
    }
    public function edit(Request $request){
        $id=$request->input("id");
        $TUpdate=App\Cate::find($id);
        if($request->isMethod("post")){
            $validate=Validator::make($request->all(),[
                "name"=>"required|unique:pl_cate,name,{$id},id",

            ]/*,[
                "name.required"=>"Vui lòng nhập tên dang mục ",
                "name.unique"=>"Tên danh mục đã tồn tại "
            ]*/);
            if($validate->fails()){
                return redirect("/admin/cate/edit?id=".$id)->withErrors($validate)->withInput();
            }else{
              
                $TUpdate->name=$request->input("name");
                $TUpdate->alias=App\MrData::toAlias2($request->input("name"));
       
                $TUpdate->status=$request->input("status");
                $TUpdate->position=$request->input("position");
               
                $TUpdate->seo=json_encode(array(
                        "title"=> (empty($request->input("seo_title"))? $request->input("name") : $request->input("seo_title")),
                        "description"=>(empty($request->input("seo_description"))? $request->input("name") : $request->input("seo_description")),
                        "keyword"=>(empty($request->input("seo_keyword"))? $request->input("name") : $request->input("seo_keyword")),
                ));
                 $picture=$request->file("picture");
                 if($picture){
                    $name_picture="cate_".time().".".$picture->getClientOriginalExtension();
                    $picture->move(CATE_PATH,$name_picture);
                    Image::make(CATE_PATH.$name_picture)->resize(100,100)->save(CATE_PATH."big/".$name_picture);
                    $TUpdate->picture=$name_picture;
                 }
                $TUpdate->save();
                $request->session()->flash("success","Changes have been saved. ");
                return redirect("/admin/cate/edit?id=".$id);
            }
        }
        $data=array();
         $data['id']=$TUpdate['id'];
        $data['name']=$TUpdate['name'];
     
        $data['status']=$TUpdate['status'];

        $data['position']=$TUpdate['position'];
        $data['picture']=$TUpdate['picture'];
    
        
        $seo=(array)json_decode($TUpdate['seo']);
        $data['seo_title']=$seo['title'];
        $data['seo_description']=$seo['description'];
        $data['seo_keyword']=$seo['keyword'];
    
        $this->View['data']=$data;
        return view("admin.cate.edit",$this->View);
    }
    public function remove(Request $request){
            $id=$request->input('id');
            App\Cate::find($id)->delete();
    }
}
