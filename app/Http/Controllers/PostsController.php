<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
    	$posts = Post::all();
        return view('posts.home')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'image|required|max:1999'
        ]);
        $fWx = Post::all();
        $fWx->count();
        //return var_dump($request->file());
        $ayy = ($fWx->count()+1).'.'.$request->file('image')->getClientOriginalExtension();

        $lmao = new Post();
        $lmao->title = $request->title;
        $lmao->description = $request->description;

        $request->file('image')->storeAs('public/', $ayy);
        $lmao->url = $ayy;
        $lmao->user_id = auth()->user()->id;
        $lmao->save();
        return redirect('/')->with('success', 'Post was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if(!empty($request->input('title')))
        {
            $post->title = $request->input('title');
            $post->save();
            return redirect()->back()->with('success', 'Post title edited successfully');

        }
        if(!empty($request->input('description')))
        {
            $post->description = $request->input('description');
            $post->save();
            return redirect()->back()->with('success', 'Post description edited successfully');

        }
        return redirect()->back()->with('error', 'No value specified for title / description');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully');
    }
}
