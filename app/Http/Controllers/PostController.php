<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\PostVote;
use App\Category;
use Auth;
use Session;
use DB;
use Storage;
use Image;

class PostController extends Controller
{

    private $count;

    public function __construct()
    {
        $this->count = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = $request->get('order');
        $category = $request->get('category');
        $posts = Post::with('user');
        $postsFactory = $this->filter($posts, $order, $category);
        $posts = $postsFactory->paginate($this->count);
        return view('posts.index', compact('posts', 'order', 'category'));
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

        $file = $request->file('file');
        $pathAvatar = "posts/user-".Auth::user()->id;
        $uploadPath = Storage::disk('s3')->put($pathAvatar, $file);
        if($uploadPath){
            $message = "El avatar se guardo correctamente";
        }else{
            $message = "Ocurrio un error , intentalo mas tarde...";
        }        

        if($uploadPath){
            $post = Post::create([
                'title' => $request->input('title'),
                'image_url' => $uploadPath,
                'user_id' => Auth::id(),
                'category_id' => $request->input('category')
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
        $comments = Comment::with('user', 'children')
                           ->where('post_id', $id)
                           ->orderBy('id', 'desc')
                           ->get();
        //return $comments;
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

    private function filter($postsFactory, $order, $category)
    {
        if($category){
            $postsFactory->where('category_id', $category);
        }
        if($order == 'latest' || $order == null){
            $postsFactory->byId();
        }elseif($order == 'votes'){
            $postsFactory->byVotes();
        }

        return $postsFactory;
    }
}












