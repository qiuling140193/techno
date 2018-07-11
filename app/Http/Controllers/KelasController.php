<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Datatables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelas.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listData()
   {
   
     $kelas = Kelas::orderBy('id_kelas', 'desc')->get();
     $no = 0;
     $data = array();
     foreach($kelas as $list){
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->name_kelas;
       $row[] = '<div class="btn-group">
               <a onclick="editForm('.$list->id_kelas.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
               <a onclick="deleteData('.$list->id_kelas.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
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
        $kelas = new Kelas;
        $kelas->name_kelas = $request['name_kelas'];
        $kelas->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        echo json_encode($kelas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->name_kelas = $request['name_kelas'];
        $kelas->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
    }
}
