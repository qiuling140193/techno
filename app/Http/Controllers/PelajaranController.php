<?php

namespace App\Http\Controllers;

use App\Pelajaran;
use App\Kelas;
use Datatables;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();      
       return view('pelajaran.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listData()
   {
   
     $pelajaran = Pelajaran::leftJoin('kelas', 'kelas.id_kelas', '=', 'pelajaran.id_kelas')
      ->orderBy('pelajaran.id_pelajaran', 'desc')
      ->get();
     $no = 0;
     $data = array();
     foreach($pelajaran as $list){
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->name_kelas;
       $row[] = $list->pelajaran;
       $row[] = '<div class="btn-group">
               <a onclick="editForm('.$list->id_pelajaran.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
               <a onclick="deleteData('.$list->id_pelajaran.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
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
        $pelajaran = new Pelajaran;
        $pelajaran->id_kelas = $request['kelas'];
        $pelajaran->pelajaran= $request['pelajaran'];
        $pelajaran->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelajaran $pelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelajaran = Pelajaran::find($id);
        echo json_encode($pelajaran);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelajaran = Pelajaran::find($id);
        $pelajaran->id_kelas = $request['kelas'];
        $pelajaran->pelajaran = $request['pelajaran'];
        $pelajaran->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelajaran = Pelajaran::find($id);
        $pelajaran->delete();
    }
}
