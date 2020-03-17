<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table="roles";
    protected $primary="id";
    protected $timestamp=true;
    public function User(){
    	return $this->belongsToMany(User::class,"lock_role_user","cid_role","cid_user");
    }
    
}
