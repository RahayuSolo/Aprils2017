<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	public $fillable = ['article_id','content', 'user'];
	
	public static function valid() {

    return array(

      'content' => 'required|min:20'

    );

  }

	public function article() {

    return $this->belongsTo('App\Article', 'article_id');

  }
}
