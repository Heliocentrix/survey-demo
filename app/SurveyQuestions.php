<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyQuestions extends Model
{
    //
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
