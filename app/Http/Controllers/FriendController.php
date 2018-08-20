<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use App\Http\Resources\Friend as FriendResource;

class FriendController extends Controller
{
    //
	public function index()
	{
		return json_encode(Friend::all());
	}

    public function create(Request $request)
    {
    	$request->validate([
    		"name" => 'required|string|max:255',
    	]);

    	Friend::create([
    		"name" => trim(request("name")),
    	]);

    	return json_encode(Friend::all());
    }

    public function update(Friend $friend, Request $request)
    {
        $request->validate([
            "name" => 'required|string|max:255',
        ]);

        $friend->name = trim($request['name']);
        $friend->save();
    }

    public function destroy(Friend $friend)
    {
        $friend->delete();
    }
}
