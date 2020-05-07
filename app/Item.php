<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['username','name', 'type','color','cost','quantity','des1','des2','des3','des4'];
}
