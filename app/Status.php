<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function inventories(){
      return $this->belongsToMany(Inventories::class);
    }
    protected $table = 'status';
    protected $fillable = [
      'id',
      'status'
    ];
}
