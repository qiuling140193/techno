<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Guru;
use App\Murid;
use App\User;
use App\Kelas;
use App\Pelajaran;
use Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level == 1){
            $murid = Murid::count();
            $guru = Guru::count();
            $user = User::count();
            $kelas = Kelas::count();
            $pelajaran = Pelajaran::count();
         return view('home.admin', compact('murid','user','guru','kelas','pelajaran'));
     }
        else if(Auth::user()->level == 2) return view('home.guru');

        else $comment = Comment::where('induk_murid', Auth::user()->id_user)
          ->leftJoin('guru', 'guru.nig', '=', 'comment.nig')
          ->orderBy('comment.id_comment', 'desc')
          ->get();  

       return view('home.home', compact('comment'));
    }

    public function view()
    {
        $guru = Guru::all();
         $comment = Comment::where('induk_murid', Auth::user()->id_user)
          ->leftJoin('guru', 'guru.nig', '=', 'comment.nig')
          ->get();  
       return view('home.com', compact('comment','guru'));
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
        $comment->nig = $request['nig'];
        $comment->induk_murid = $request['murid'];
        $comment->comment = $request['comment'];
        $comment->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
