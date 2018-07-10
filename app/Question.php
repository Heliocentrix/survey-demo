<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['title', 'question_type', 'user_id'];

    protected $casts = [
    'id' => 'array',
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
