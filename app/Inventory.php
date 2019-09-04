<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
  public function user(){
    return $this->belongsTo('App\User','id','user_id');
  }
    protected $table = 'inventories';
    protected $fillable = [
      'inventory',
      'user_id',
      'category_id',
      'amount',
      'status_id'
    ];
}
