<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Response;
use View;
use DB;

class PostController extends Controller
{
   protected $posts;
   protected $rules=[
     'title'=>'required|min:2|max:32',
     'content'=>'required|min:2|max:255',
   ];

   public function __construct(Post $posts)
   {
       $this->posts=$posts;
       $this->middleware(['auth']);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
      $user=Auth::user();
      if($user->hasRole('administrator'))
      {
        $posts=$this->posts->paginate(5);
        if ($request->ajax()) {
            return view('posts.load', ['posts' => $posts])->render();
        }
        $last_query=$this->getLastExecutedQuery();
        return view('posts.index',compact(['posts','last_query']));
      }
      $posts=$this->posts->where('user_id',$user->id)->paginate(5);
      $last_query=$this->getLastExecutedQuery();
      if ($request->ajax()) {
          return view('posts.load', ['posts' => $posts,'last_query'=>$last_query])->render();
      }
      $last_query=$this->getLastExecutedQuery();
      return view('posts.index',compact(['posts','last_query']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make(Input::all(),$this->rules);
        if($validator->fails()){
          return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
        }else{
          $post= new Post();
          $post->title= $request->title;
          $post->content = $request->content;
          $post->user_id = Auth::user()->id;
          $post->save();
          return response()->json($post);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator=Validator::make(Input::all(),$this->rules);
      if($validator->fails()){
        return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
      }else{
        $post = Post::findOrFail($id);
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=Auth::user()->id;
        $post->save();
        return response()->json($post);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post= Post::findOrFail($id);
      $post->delete();
      return response()->json($post);
    }
}
