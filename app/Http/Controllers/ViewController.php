<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Comment;
use App\Guru;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::all();
        $comment = Comment::where('induk_murid', Auth::user()->id_user)
          ->get();  
       return view('home.home', compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listData()
   {
     $nilai = Nilai::where('induk_murid', Auth::user()->id_user)
      ->leftJoin('pelajaran', 'pelajaran.id_pelajaran', '=', 'nilai.id_pelajaran')
      ->leftJoin('kelas', 'kelas.id_kelas', '=', 'nilai.id_kelas')
      ->orderBy('pelajaran.id_pelajaran', 'desc')
      ->get();
      
     $no = 0;
     $data = array();
     foreach($nilai as $list){
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->name_kelas;
       $row[] = $list->pelajaran;
       $row[] = $list->nilai;
       $data[] = $row;
     }

     $output = array("data" => $data);
     return response()->json($output);
    }


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     

        // echo json_encode($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nilai  $nilai
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
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $nilai= Nilai::find($id);
        // $nilai->delete();
    }
}
