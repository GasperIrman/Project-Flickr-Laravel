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

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {
    	$posts = Post::orderBy('created_at', 'desc')->get();
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
        $videos = array('avi', 'mpeg', 'mp4');
       // return var_dump(in_array($request->file('image')->getClientOriginalExtension(), $videos));
        $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'mimes:video/avi,mp4,video/mpeg,video/quicktime,jpeg,bmp,png,jpg,gif|required|max:19999'
        ]);
        
        $fWx = Post::latest()->first();
        //return var_dump($request->file());
        $ayy = ($fWx->id +1).'.'.$request->file('image')->getClientOriginalExtension();

        $lmao = new Post();
        $lmao->title = $request->title;
        $lmao->description = $request->description;

        $request->file('image')->storeAs('public/', $ayy);
        $lmao->url = $ayy;
        $lmao->user_id = auth()->user()->id;
        if(in_array($request->file('image')->getClientOriginalExtension(), $videos, true))
        {
            $lmao->video = true;
            $lmao->type = $request->file('image')->getClientOriginalExtension();
        }
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
