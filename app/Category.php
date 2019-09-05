<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function inventories(){
      return $this->belongsToMany('App\Inventory','category_id','id');
    }
    protected $table = 'categories';
    protected $fillable = [
      'category'
    ];
}
