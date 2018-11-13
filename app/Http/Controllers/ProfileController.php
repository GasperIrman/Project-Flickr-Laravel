<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

class ProfileController extends Controller
{
    public function index($id)
    {
    	$user = User::find($id);
    	return view('profile')->with('user', $user);
    }

    public function follow($id, $followedId)
    {
    	$follow = new Follow();
    	$follow->follower_id = $id;
    	$follow->followed_id = $followedId;
    	$follow->save();
        return 'follow';
    	return redirect()->back();
    }

    public function unfollow($id, $followedId)
    {
        $follow = Follow::find(2);
        $follow->delete();
        return 'unfollow';
        return redirect()->back();
    }
}
