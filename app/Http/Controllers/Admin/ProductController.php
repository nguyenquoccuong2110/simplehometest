<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Validator;
use Image;
use Excel;

class ProductController extends Controller
{
    protected $View=array();
    public function add(Request $request){
        if($request->isMethod("post")){
            $validater=Validator::make($request->all(),[
                "name"=>"required|unique:pl_product",
                "picture"=>"required",
                "cid_cate"=>"required"
            ]);
            if($validater->fails()){
                return redirect("/admin/product/add")->withErrors($validater)->withInput();
            }else{
              
                $picture=$request->file("picture");
                $TNew=new App\Product();
                $TNew->name=$request->input("name");
                $TNew->alias=App\MrData::toAlias2($request->input("name"));
                $TNew->code=$request->input("code");

                $name_picture="picture_".time().".".$picture->getClientOriginalExtension();
                $picture->move(PRODUCT_PATH,$name_picture);
                Image::make(PRODUCT_PATH.$name_picture)->resize(100,100)->save(PRODUCT_PATH."small/".$name_picture);
                 Image::make(PRODUCT_PATH.$name_picture)->resize(281,281)->save(PRODUCT_PATH."big/".$name_picture);
                $TNew->picture= $name_picture;

             
               

                $TNew->cid_cate=$request->input("cid_cate");
         
                $TNew->description=$request->input("description");
                $TNew->content=$request->input("content");
              
                $TNew->status=$request->input("status");
               
                $TNew->seo=json_encode(array(
                    "title"=>empty($request->input("seo_title"))? $request->input("name") : $request->input('seo_title'),
                    "description"=>empty($request->input("seo_description"))? $request->input("name") : $request->input('seo_description'),
                    "keyword"=>empty($request->input("seo_keyword"))? $request->input("name") : $request->input('seo_keyword'),

                ));
                $TNew->save();

               
                $request->session()->flash("success"," Changes have been saved.");
                return redirect("/admin/product/add");
            }
        }
        $data=array();
        $data['status']=1;
        $this->View['cid_cate']=App\Cate::where("status",1)->orderBy("position","ASC")->get()->pluck('name','id');
      
       
       
        $this->View['data']=$data;
        return view("admin.product.add",$this->View);
    }


    public function lists(Request $request){
        $search=array();
        $sql="id>0";
        if($is_search=$request->input("is_search")){
            $search['is_search']=$request->input("is_search");
            if($search['name']=$request->input("name")){
                $sql .= " AND name LIKE '%{$search['name']}%'";
            }
            if($search['cid_cate']=$request->input("cid_cate")){
                $sql .= " AND cid_cate={$search['cid_cate']}";
            }
            

        }
        $this->View['search']=$search;
        $this->View['cid_cate']=App\Cate::where("status",'1')->get()->pluck("name","id");
        $this->View['cid_cate']['']="Tuỳ chọn";
       
        $this->View['data_list']=App\Product::whereRaw($sql)->orderBy("id","DESC")->paginate(20);
        return view("admin.product.lists",$this->View);
    }
    public function remove(Request $request){
        $id=$request->input("id");
        App\Product::find($id)->delete();
        return 'succes';
    }
    public function edit(Request $request){
        $id=$request->input("id");
        $TUpdate=App\Product::find($id);
        if($TUpdate){

            if($request->isMethod("post")){
                $validater=Validator::make($request->all(),[
                    "name"=>"required|unique:pl_product,name,{$id},id",
                

                ]);
                if($validater->fails()){
                    return redirect("/admin/product/list")->withErrors($validater)->withInput();
                }else{
                    $picture=$request->file("picture");

                    $TUpdate->name=$request->input("name");
                    $TUpdate->alias=App\MrData::toAlias2($request->input("name"));
                    $TUpdate->code=$request->input("code");
                    $TUpdate->description=$request->input("description");
                    $TUpdate->content=$request->input("content");
                    $TUpdate->cid_cate=$request->input("cid_cate");

                    
                    $TUpdate->status=$request->input("status");
               
                    if($picture){
                        $name_picture="product_".time().".".$picture->getClientOriginalExtension();
                         $picture->move(PRODUCT_PATH,$name_picture);
                            Image::make(PRODUCT_PATH.$name_picture)->resize(100,100)->save(PRODUCT_PATH."small/".$name_picture);
                             Image::make(PRODUCT_PATH.$name_picture)->resize(281,281)->save(PRODUCT_PATH."big/".$name_picture);
                            $TUpdate->picture= $name_picture;
                    }
                    $TUpdate->seo=json_encode(array(
                        "title"=>$request->input("seo_title"),
                        "description"=>$request->input("seo_description"),
                        "keyword"=>$request->input("seo_keyword")
                    ));
                    $TUpdate->save();
                  
                    $request->session()->flash("succes"," Changes have been saved .");
                    return redirect("/admin/product/edit?id=".$id);  
                }
            }
            $data=array();
            $data['id']=$TUpdate['id'];
            $data['name']=$TUpdate['name'];
            $data['code']=$TUpdate['code'];
            $data['description']=$TUpdate['description'];
            $data['content']=$TUpdate['content'];
            $data['cid_cate']=$TUpdate['cid_cate'];
           
            $data['status']=$TUpdate['status'];
          
            $data['picture']=$TUpdate['picture'];
       
            
            $seo=(array)json_decode($TUpdate['seo']);
           @$data['seo_title']=$seo['title'];
            @$data['seo_description']=$seo['description'];
            @$data['seo_keyword']=$seo['keyword'];
             $this->View['cid_cate']=App\Cate::where("status",1)->orderBy("position","ASC")->get()->pluck('name','id');
            $this->View['data']=$data;
              return view("admin.product.edit",$this->View);
          }
    }
    public function export(Request $request){
        $name_excel="Product_".time();
        Excel::create($name_excel,function($excel) use ($request){
            $excel->sheet('Danh sách', function($sheet) use ($request) {


                $search=array();
                $sql="id>0";
                if($is_search=$request->input("is_search")){
                    $search['is_search']=$request->input("is_search");
                    if($search['name']=$request->input("name")){
                        $sql .= " AND name LIKE '%{$search['name']}%'";
                    }
                    if($search['cid_cate']=$request->input("cid_cate")){
                        $sql .= " AND cid_cate={$search['cid_cate']}";
                    }
                    

                }
            

               $TData=App\Product::whereRaw($sql)->orderBy("id","DESC")->get();


                $result=[];
                $result[]=["ID","NAME","CODE","CATEGORIES","CREATED AT"];
              
                foreach ($TData as  $value) {
                  
                    $result[]=array(
                      $value['id'],
                      $value['name'],
                      $value['code'],
                   
                      $value->Cate()->name,
                   
                      $value['created_at']
                    );
                  
                }
               
                $sheet->fromArray($result);

            });

        })->download('csv');
    }

}
