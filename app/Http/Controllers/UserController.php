<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
          $users=$this->users->with('roles')->paginate(5);
          $last_query=$this->getLastExecutedQuery();
          return view('users.index',compact(['users','last_query']));
      }
}
