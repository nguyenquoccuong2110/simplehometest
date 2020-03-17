<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
     protected $table="pl_news";
    protected $primary="id";
    protected $timestamp=true;
}
