<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Murid;
use App\Guru;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Datatables;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        $murid = Murid::all();
        $comment = Comment::all();
        $user = User::all();
        return view('comment.index',compact('murid','guru','comment','user')); 
    }


    public function listData()
   {
    $comment = Comment::where('nig', Auth::user()->id_user)
          ->leftJoin('murid', 'murid.induk_murid', '=', 'comment.induk_murid')
          ->orderBy('murid.induk_murid', 'desc')
          ->get();   
         $no = 0;
         $data = array();
         foreach($comment as $list){
           $no ++;
           $row = array();
           $row[] = $no;
           $row[] = $list->name;
           $row[] = $list->comment;
           $row[] = $list->updated_at->format('d F Y H:i:s');
           $row[] = '<div class="btn-group">
                   <a onclick="editForm('.$list->id_comment.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                   <a onclick="deleteData('.$list->id_comment.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
           $data[] = $row;
         }
            // dd($list);
         $output = array("data" => $data);
         return response()->json($output);
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->nig = $request['guru'];
        $comment->induk_murid = $request['murid'];
        $comment->comment = $request['comment'];
        $comment->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $comment = Comment::where('induk_murid', Auth::user()->id_user)
        //   ->orderBy('murid.induk_murid', 'desc')
        //   ->get(); 
        //   $data = array();  
        //   return View::make('ortu', compact('murid','guru','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $comment = Comment::find($id);
        echo json_encode($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->nig = $request['guru'];
        $comment->induk_murid = $request['murid'];
        $comment->comment = $request['comment'];
        $comment->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }
}
