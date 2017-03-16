<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
  protected $table='posts';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'text', 'author',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];

  public function author(){
    return $this->hasOne('App\User', 'id', 'author');
  }
}
