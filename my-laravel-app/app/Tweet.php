<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function tweetskillrelations()
    {
        return $this->hasMany('App\TweetSkillRelation');
    }
    public function tweetskills()
    {
        return $this->hasManyThrough(
            'App\Skill',
            'App\TweetSkillRelation',
            'tweet_id',
            'id',
            null,
            'skill_id'
        );
    }
}
