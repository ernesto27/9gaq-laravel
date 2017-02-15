<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\PostVote;
use Auth;
use Session;

class PostController extends Controller
{

    private $count;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = $request->get('order');

        $posts = Post::with('user');
        if($order == 'latest' || $order == null){
            $posts->byId();
        }elseif($order == 'votes'){
            $posts->byVotes();
        }
        
        $posts = $posts->paginate($this->count);
        return view('posts.index', compact('posts', 'order'));
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
        // Validate request data
        $this->validate($request, Post::$validationRules);

        $store = $request->file->store('public/images');
        if($store){
            $post = Post::create([
                'title' => $request->input('title'),
                'image_url' => $store,
                'user_id' => Auth::id()
            ]);
            Session::flash('success', true);
            return redirect("posts/{$post->id}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('user')->where('id', $id)->first();
        $comments = Comment::with('user')->where('post_id', $id)->orderBy('id', 'desc')->get();
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function vote(Request $request)
    {
        // Verificar si existe una entrada en tabla votos - posts
        $postVote = PostVote::where('user_id', Auth::id())->where('post_id', $request->input('post_id'))->first();
        $post = Post::find($request->input('post_id'));
        // Si no existe agregagmos entrada y sumamos un punto al post

        if(!$postVote){
            PostVote::create([
                'user_id' => Auth::id(),
                'post_id' => $request->input('post_id')
            ]);
            $post->votes = $post->votes + 1;
            $post->save();
        }else{
            // Si existe la eliminaos y bajamos un punto al post
            $postVote->delete();
            $post->votes = $post->votes - 1;
            $post->save();
        }
        return back();

    }
}












