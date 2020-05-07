<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetails extends Model
{
    protected $fillable = ['item_id','filename'];

    public function item(){
        return $this->belongsTo('App\Item');

    }
}
