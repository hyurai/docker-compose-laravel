<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = Tweet::all();
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
