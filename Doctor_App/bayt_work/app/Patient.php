<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //Table name
    protected $table='patients';
    //Primary key
    protected $primaryKey='id';
    //TimeStamps
    public $timestamps=true;

    public function doctor(){
      return $this->belongsTo(User::class);
    }
}
