<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'title', 'quiz_id','options', 'answer', 'role_id', 'created_at','updated_at'
    ];
    protected $table = 'questions';

    public function get_quiz(){
    	return $this->belongsTo('App\Quiz', 'quiz_id', 'id');
    }
}
