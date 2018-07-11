<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kelas;
use Datatables;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('guru.index', compact('kelas')); 
    }

     public function listData()
    {
    
      $guru= Guru::leftJoin('kelas', 'kelas.id_kelas', '=', 'guru.kelas')
      ->orderBy('guru.id_guru', 'desc')
      ->get();
      $no = 0;
      $data = array();
      foreach($guru as $list){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $list->nig;
         $row[] = $list->name_guru;
         $row[] = $list->alamat;
         $row[] = $list->tempat_lahir;
         $row[] = $list->tanggal_lahir;
         $row[] = $list->kelas;
         $row[] = '<div class="btn-group">
                    <a onclick="editForm('.$list->id_guru.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    <a onclick="deleteData('.$list->id_guru.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
         $data[] = $row;
      }

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
        $guru = new Guru();
        $guru->nig  = $request['nig'];
        $guru->name_guru   = $request['name'];
        $guru->alamat = $request['alamat'];
        $guru->tempat_lahir = $request['tempat_lahir'];
        $guru->tanggal_lahir = $request['tanggal_lahir'];
        $guru->kelas = $request['kelas'];
        $guru->save();
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
        $guru = Guru::find($id);
        echo json_encode($guru);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);
        $guru->name_guru   = $request['name'];
        $guru->alamat = $request['alamat'];
        $guru->tempat_lahir = $request['tempat_lahir'];
        $guru->tanggal_lahir = $request['tanggal_lahir'];
        $guru->kelas = $request['kelas'];
        $guru->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();
    }
}
