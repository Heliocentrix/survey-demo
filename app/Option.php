<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    protected $table = 'options';
    protected $fillable = ['id', 'question_id', 'text'];

    public function options()
    {
        return $this->belongsTo(Question::class);
    }
}
