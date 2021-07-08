<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TweetSkillRelation extends Model
{
    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }
    public function skill()
    {
        return $this->belongsTo('App\Skill');
    }
}