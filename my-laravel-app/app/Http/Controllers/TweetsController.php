<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tweet;
use App\Skill;
use App\TweetSkillRelation;
use Illuminate\Support\Facades\DB;


class TweetsController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->name;
        $job = $request->job;
        $before_entry_data = $request->entry_data;
        $before_start_data = $request->start_data;
        $skillname = $request->skillname;

        $tweet_query = Tweet::query();
        $skill_query = Skill::query();
        $tweet_skill_relation_query = TweetSkillRelation::query();

        if(!empty($name)){
            $tweets = $tweet_query->where('name','LIKE',"%{$name}%")->get();
        }
        if(!empty($job)){
            $tweets = $tweet_query->where('job','LIKE',"%{$job}%")->get();
        }
        if(!empty($before_entry_data)){
            $date = date_create($before_entry_data);
            $entry_date = date_format($date,'Y-m-d');
            $tweets = $tweet_query->whereDate('entry_data','>=',"{$entry_date}")->get();
        }
        if(!empty($before_start_data)){
            $date = date_create($before_start_data);
            $start_date = date_format($date,'Y-m-d');
            $tweets = $tweet_query->where('start_data','>=',"{$start_date}")->get();
        }
        if(!empty($skillname)){
            //$skill = $skill_query->where('name','LIKE',"%{$skillname}%")->first();
            //$tweet_skill_relation = $tweet_skill_relation_query->where('skill_id',$skill->id)->first();
            //$tweets = $tweet_query->where('id',$tweet_skill_relation->tweet_id)->get(); 
            
            $skill =  $skill_query->where('name',"{$skillname}")->first();
            $tweets = $tweet_query->join('tweet_skill_relations','tweets.id','=','tweet_skill_relations.tweet_id')->join('skills','skills.id','=','tweet_skill_relations.skill_id')->where('skill_id','=',"{$skill->id}")->get();
        }

        //サブクエリ使え！！！！！
        $tweets = $tweet_query->get();
        return view('tweets/index',compact('tweets'));
    }
    public function create()
    {
        $tweet = new Tweet;
        return view('tweets/new',compact('tweet'));
    }
    public function store(Request $request)
    {
        $tweet =  new Tweet;
        $tweet->title = $request->title;
        $tweet->name = $request->name;
        $tweet->job = $request->job;
        $tweet->entry_data = $request->entry_data;
        $tweet->start_data = $request->start_data;
        $tweet->end_data = $request->end_data;
        $tweet->text = $request->text;
        $tweet->save();


        foreach($request->skills as $skill_name){
            $skill = Skill::firstOrcreate(['name' => $skill_name]);
            $tweetskillrelation = new TweetSkillRelation;
            $tweetskillrelation->tweet_id = $tweet->id;
            $tweetskillrelation->skill_id = $skill->id;
            $tweetskillrelation->save();
        }

        return redirect('/tweets');
    }
}
