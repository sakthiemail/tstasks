<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
  protected $table = 'posts';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'content', 'user_id',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
