<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{

   protected $users;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $users)
    {
        $this->users=$users;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last_query=$this->getLastExecutedQuery();
        return view('home',compact('last_query'));
    }
}
