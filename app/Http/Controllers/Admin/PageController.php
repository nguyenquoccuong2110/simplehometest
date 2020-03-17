<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Validator;

class PageController extends Controller
{
   protected $View=[];
    public function add(Request $request){
        $this->View['data']=[];
        if($request->isMethod("post")){
            $Validator=Validator::make($request->all(),[
                    "name"=>"required|unique:pl_page"
            ]);
            if($Validator->fails()){
                return redirect("/admin/page/add")->withErrors($Validator)->withInput();
            }else{
                $TNew=new App\Page();
                $TNew->name=$request->input("name");
                $TNew->alias=App\MrData::toAlias2($request->input("name"));
                $TNew->content=$request->input("contents");
                $TNew->save();
                $request->session()->flash("success","Successfull");
                return redirect("/admin/page/add");
            }
        }

        return view("admin.page.add",$this->View);
    }
    public function lists(Request $request){
        $search="";
        if($request->isMethod("get")){
            $search=$request->input("search");
        }
        $this->View['search']=$search;
        $this->View['data_list']=App\Page::where("name","LIKE","%{$search}%")->paginate(20);
        return view("admin.page.list",$this->View);
    }
    public function edit(Request $request){
        $data=[];

        if($id=$request->input("id")){
            $get_page=App\Page::find($id);
            if($request->isMethod("post")){
                $validator=Validator::make($request->all(),[
                    "name"=>"required|unique:pl_page,name,{$id},id"
                ],[
                    "name.required"=>"Vui lòng nhập tên trang",
                    "name.unique"=>" Tên trang đã tồn tại "
                ]);
                if($validator->fails()){
                    return redirect("/admin/page/edit?id=".$id)->withErrors($validator)->withInput();
                }else{
                    $get_page->name=$request->input("name");
                    $get_page->alias=App\MrData::toAlias2($get_page->name);
                    $get_page->content=$request->input("contents");
                    $get_page->save();
                    $request->session()->flash("success"," Changes have been saved. ");
                    return redirect("/admin/page/edit?id=".$id);
                }
            }

            $data['id']=$get_page['id'];
            $data['name']=$get_page['name'];
            $data['contents']=$get_page['content'];
            $this->View['data']=$data;

            return view("admin.page.edit",$this->View);
        }
    }
    public function remove(Request $request)
    {
        
        if($request->isMethod("post")){
            if($id=$request->input("id")){
              
                echo 'destroy success';exit;
            }
        }

    }
}
