<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetsController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->name;
        $job = $request->job;
        $entry_data = $request->entry_data;
        $start_data = $request->start_data;

        $query = Tweet::query();

        if(!empty($name)){
            $tweets = $query->where('name','LIKE',"%{$name}%")->get();
        }
        if(!empty($job)){
            $tweets = $query->where('job','LIKE',"%{{$job}}%")->get();
        }
        if(!empty($entry_date)){
            $tweets = $query->where('entry_data','>',"{{$entry_data}}")->get();
        }
        if(!empty($start_date)){
            $tweets = $query->where('start_data','>',"{{$start_data}}")->get();
        }
        $tweets = $query->get();
        return view('tweets/index',compact('tweets'));
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
        return redirect('/tweets');
    }
}
