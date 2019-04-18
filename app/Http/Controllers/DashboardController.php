<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Crud::orderBy('created_at','desc')->paginate(5);
        return view('dashboard')->with('posts',$posts);
    }
}
