<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function tweetskillrelations()
    {
        return $this->hasMany('App\TweetSkillRelation');
    }
    public function skilltweets()
    {
        return $this->hasManyThrough(
            'App\Tweet',
            'App\TweetSkillRelation',
            'skill_id',
            'id',
            null,
            'tweet_id'
        );
    }
    protected $fillable = ['name'];
}
