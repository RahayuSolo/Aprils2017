<?php

namespace App;

use App\Comment;

use Illuminate\Database\Eloquent\Model;


class Article extends Model

{
    public $table = 'articles';
	
    public $fillable = ['title', 'content'];
	
	
	  public static function valid() {

    return array(

      'content' => 'required'

     );

  }


  public function comments() {

    return $this->hasMany('App\Comment', 'article_id');

  }
}




