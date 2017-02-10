<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}
	/*
    public function index()
    {
    	$posts = Post::latest()
    	    ->filter(request(['month', 'year']))
    	    ->get();
    
        // $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        // ->groupBy('year', 'month')
        // ->orderByRaw('min(created_at) desc')
        // ->get()
        // ->toArray();


    	// $archives = Post::archives();

    	// return view('posts.index', compact('posts', 'archives'));
    	return view('posts.index', compact('posts'));
    }
*/
    public function index(Post $posts)
    {
    	$posts = $posts->all();

    	return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
    	// $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
     //    ->groupBy('year', 'month')
     //    ->orderByRaw('min(created_at) desc')
     //    ->get()
     //    ->toArray();

     //    $archives = Post::archives();

    	// return view('posts.show', compact('post', 'archives'));
    	return view('posts.show', compact('post'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	//Create a new Post using the request data
    	// $post = new Post;
    	// $post->title = request('title'); 
    	// $post->body = request('body'); 

    	// //save  it to database
    	// $post->save();

    	// Post::create([
    	// 	'title' => request('title'),
    	// 	'body' => request('body')
    	// 	]);

    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required'
    		]);

        auth()->user()->publish(
        	    new Post(request(['title', 'body']))
        	);
        session()->flash("message", "Your post is published now!");
    	//And redirect to the home page
    	return redirect('/');
    }
}
