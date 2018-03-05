<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help_Content extends Model
{
     public $table = "help_contents";
     public $fillable = ['url','title','details'];
}
