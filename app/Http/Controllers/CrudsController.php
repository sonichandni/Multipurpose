<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Crud;

class CrudsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        //echo json_encode($request);
     /*   $x="";
       // $f=$request->file('up_file');
        $x.=$request->input('title')." ";
        $x.=$request->input('desc')." ";
        //$x.=$f->up_file;
       // echo $request->input('title')." ".$request->input('desc')." ".$request->file('up_file')->getClientOriginalExtension();
        if($request->hasFile('up_file'))
        {
            $x.=$request->file('up_file')->path();
        }
        echo $x;
        //print_r($request);
        //exit();  */
        
        //dd($request->all(),$request->hasFile('up_file'));
        
        /*if($request->has('up_file'))
        {
            return response()->json('Yes');            
        }
        else
        {
            return response()->json('NO');
        }*/

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Crud::cindex('2');
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = '';
        $post = new Crud();
        $post->id='0';
        return view('posts.create')->with('post',$post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Crud::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Crud::find($id);
        return view('posts.create')->with('post',$post);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = 0)
    {
        $post = Crud::cupdate($request,$id);
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Crud::cdestroy($id);
        return redirect('/posts')->with('success','Post Removed');
    }
}
