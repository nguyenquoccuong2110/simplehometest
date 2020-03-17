<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use App;
use Excel;

class UserController extends Controller
{
    protected $View=[];
     public function add(Request $request)
    {
        $data=[];
        if($request->isMethod("post")){
            $validater=Validator::make($request->all(),[
                "name"=>"required|max:225",
                "email"=>"required|max:225|unique:users",
               
                "password"=>"required|confirmed|min:6",
              
            ]);
            if($validater->fails()){
                return redirect("/admin/customer/add")->withErrors($validater)->withInput();
            }else{

                $TNew=new App\User();
                $TNew->name=$request->input("name");
                $TNew->email=$request->input("email");
             
                $TNew->password=bcrypt($request->input("password"));
                //$TNew->roles()->detach($TNew->id);
                $TNew->save();
              
                $request->session()->flash("success","Changes have been saved.");
                return redirect("/admin/customer/add");
            }
        }
     
        $this->View['data']=$data;
        return view("admin.user.add",$this->View);
    }
    


    
    public function lists(Request $request){
        $search=[];
        $sql=" id > 0";
        $url="";
       
        $this->View['url']=$url;
       
        $this->View['data_list']=App\User::whereRaw($sql)->orderBy('id')->paginate(20);
        $this->View['search']=$search;
        return view("admin.user.lists",$this->View);
    }
    public function edit(Request $request){
        if($id=$request->input("id")){
            $TUPdated=App\User::find($id);
            if(!empty($TUPdated)){
                    $data=[];
                    $get_request=[
                            "name"=>"required|max:225",
                            "email"=>"required|email|max:225|unique:users,email,{$id},id",
                            "phone"=>"required",
                            "username"=>"required|max:225|unique:users,username,{$id},id",
                            
                            "role"=>"required"
                        ];
                    $message_request=[
                            "name.required"=>"Vui lòng nhập tên.",
                            "name.max"=>"Vượt quá ký tự giới hạn",
                            "email.required"=>" Vui lòng nhập Email",
                            "email.email"=>"Vui lòng nhập đúng định dạng Email",
                            "email.unique"=>"Email đã tồn tại",
                            "phone.required"=>"Vui lòng số điện thoại",
                            "username.required"=>"Vui lòng nhập tên đăng nhập",
                            "username.unique"=>"Tên đăng nhập đã tồn tại ",
                            
                            "role.required"=>"Vui lòng chọn phân quyền  ",
                            "password.confirmed"=>"Nhập lại mật khẩu không chính xác"
                        ];
                        if($password=$request->input("password")){
                            $get_request['password']="required|confirmed|min:6";
                            $message_request['password.required']="Vui lòng nhập mật khẩu";
                            $message_request['password.min']="Mật khẩu không nhỏ hơn 6 ký tự";
                        }
                    if($request->isMethod("post")){
                        $validater=Validator::make($request->all(),$get_request,$message_request);

                        if($validater->fails()){
                            return redirect("/admin/customer/edit?id=".$id)->withErrors($validater)->withInput();
                        }else{

                         
                            $TUPdated->name=$request->input("name");
                            $TUPdated->email=$request->input("email");
                            $TUPdated->username=$request->input("username");
                            $TUPdated->phone=$request->input("phone");
                            $TUPdated->address=$request->input("address");
                            $TUPdated->username=$request->input("username");
                            if(!empty($password)){
                            $TUPdated->password=bcrypt($request->input("password"));
                            }
                            $TUPdated->save();
                            $TUPdated->roles()->detach($TUPdated->roles[0]->id);
                            $TUPdated->roles()->attach($request->input("role"));
                            $request->session()->flash("success","Cập nhật thành công.");
                            return redirect("/admin/customer/edit?id=".$id);
                        }
                    }
                    $this->View['roles']=App\Roles::orderBy('name','DESC')->get()->pluck('name','id');
                    
                    $data['id']=$TUPdated['id'];
                    $data['name']=$TUPdated['name'];
                    $data['email']=$TUPdated['email'];
                    $data['phone']=$TUPdated['phone'];
                    $data['address']=$TUPdated['address'];
                    $data['username']=$TUPdated['username'];
                    if(count($TUPdated->roles)>0){
                         $data['role']=$TUPdated->roles[0]->id;
                    }
                   
                    $data['id']=$TUPdated['id'];
                    

                    $this->View['data']=$data;
                    return view("admin.user.edit",$this->View);
                }
        }
    }
    public function remove(Request $request)
    {
        
        if($request->isMethod("post")){
            if($id=$request->input("id")){
                $User = App\User::find($id);
                 $User->delete();
                echo 'destroy success';exit;
            }
        }

    }
}
