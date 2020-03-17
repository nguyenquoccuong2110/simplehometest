<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
     protected $table="pl_product";
    protected $primary="id";
    protected $timestamp=true;
 
    public function Cate(){
    	return $this->belongsTo(Cate::class,"cid_cate")->getResults();
    }
  
}
