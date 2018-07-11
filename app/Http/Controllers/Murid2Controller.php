<?php

namespace App\Http\Controllers;

use App\Murid;
use App\Kelas;
use Illuminate\Http\Request;
use Datatables;
use Image;

class Murid2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();      
       return view('view.index', compact('kelas'));
    }

     public function listData()
    {
    
      $murid = Murid::leftJoin('kelas', 'kelas.id_kelas', '=', 'murid.id_kelas')
      ->orderBy('murid.id_murid', 'desc')
      ->get();
      $no = 0;
      $data = array();
      foreach($murid as $list){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $list->induk_murid;
         $row[] = $list->name;
         $row[] = $list->alamat;
         $row[] = $list->tempat_lahir;
         $row[] = $list->tanggal_lahir;
         $row[] = $list->name_ayah;
         $row[] = $list->name_ibu;
         $row[] = $list->name_kelas;
         $row[] = '<img src="images/'.$list->foto.'" width="100" />';
         $row[] = '<div class="btn-group">
                    <a onclick="editForm('.$list->id_murid.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a></div>';
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
        //
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
        $murid = Murid::find($id);
        echo json_encode($murid);
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
        $murid = Murid::find($id);
        $murid->name   = $request['name'];
        $murid->id_kelas = $request['kelas'];
        $murid->update();
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
