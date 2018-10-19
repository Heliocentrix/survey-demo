<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use SoftDeletes;
    /**
      * The attributes that should be mutated to dates.
      *
      * @var array
      */
     protected $dates = ['deleted_at'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function survey_types()
    {
        return $this->belongsTo(SurveyType::class);
    }
    public function survey_questions()
    {
        return $this->hasMany(SurveyQuestions::class);
    }
}
