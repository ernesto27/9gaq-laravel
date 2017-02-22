<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\User;
use Session;
use Auth;
use Storage;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store', 'loginShow', 'loginCreate');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
        $this->validate($request, User::$validationRules);

        // Insert user on DB
        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'active' => 1,
        ]);
        
        Session::flash('message', "El registro se realizo correctamente");
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        return view('users.show');
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
   
        $this->validate($request, User::$validationRulesProfile);

        // Make thumb of the avatar
        $resource = $this->getThumbResource($request);

        // Save on S3 aws
        if($upload = Storage::disk('s3')->put("users/avatars/".Auth::user()->id.".jpg", $resource)){
            $message = "El avatar se guardo correctamente";
        }else{
            $message = "Ocurrio un error , intentalo mas tarde...";
        }

        Session::flash('message', $message);
        return redirect("/users/". Auth::user()->id . '/edit' );
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

    public function loginShow()
    {
        return view('users.login');
    }

    public function loginCreate(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if($user){
            if(password_verify($request->input('password'), $user->password)){
                Auth::login($user, true);
                return redirect('posts');
            }
        }

        Session::flash('errorLogin', true);
        return redirect('users/login'); 
    }

    public function logout()
    {
        Auth::logout();
        return redirect('posts');
    }


    private function getThumbResource($request)
    {
        $img = Image::make($request->file('file')->getRealPath())->resize(120, 120);
        $resource = $img->stream()->detach();
        return $resource;
    }

}
