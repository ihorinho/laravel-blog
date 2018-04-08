<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (request()->input("sort_by")) {
            case "id" : $posts = Post::orderBy("id", "desc")->paginate(10); break;

            case "updated" : $posts = Post::orderBy("updated_at", "desc")->paginate(10); break;

            default : $posts = Post::paginate(10);
        } 

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate(
            $request,
            array(
                'title' => 'required|max:255',
                'body'  => 'required',
            )
        );

        // store data to database
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        Session::flash("success", "Post has been successfully created!");

        // redirect 
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit')->withPost($post);
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
        // validate the data
        $this->validate(
            $request,
            array(
                'title' => 'required|max:255',
                'body'  => 'required',
            )
        );    

        //Uodate data in DB
        $post = Post::find($id);
        $post->title = $request->input("title");
        $post->body = $request->input("body");
        $post->save();

        //Redirect to show post page
        Session::flash("success", "Post has been successfully updated!");

        return redirect()->route("posts.show", $post->id);
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

        Session::flash("success", "Post successfully deleted!");

        return redirect()->route("posts.index");
    }
}
