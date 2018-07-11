<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Murid;
use App\Kelas;
use App\Pelajaran;
use Datatables;
use Illuminate\Http\Request;
use Auth;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::all();
        $kelas = Kelas::all();
        $groups = [];
        foreach ($kelas as $k) {
            $murid = Murid::where('id_kelas', $k->id_kelas)->get();
            $pelajaran = Pelajaran::where('id_kelas', $k->id_kelas)->get();
            array_push($groups, (Object) [
                'kelas' => $k,
                'murid' => $murid,
                'pelajaran' => $pelajaran
                ]);
            
        }
        // $pelajaran = Pelajaran::all();
        // $murid = Murid::all();  
       return view('nilai.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listData()
   {
   
     $nilai = Nilai::where('nig', Auth::user()->id_user)
      ->leftJoin('murid', 'murid.induk_murid', '=', 'nilai.induk_murid')
      ->leftJoin('pelajaran', 'pelajaran.id_pelajaran', '=', 'nilai.id_pelajaran')
      ->leftJoin('kelas', 'kelas.id_kelas', '=', 'nilai.id_kelas')
      ->orderBy('murid.induk_murid', 'desc')
      ->get();
     $no = 0;
     $data = array();
     foreach($nilai as $list){
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->name;
       $row[] = $list->name_kelas;
       $row[] = $list->pelajaran;
       $row[] = $list->nilai;
       $row[] = '<div class="btn-group">
               <a onclick="editForm('.$list->id_nilai.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
               <a onclick="deleteData('.$list->id_nilai.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
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
        $nilai = new Nilai();
        $nilai->nig = $request['guru'];
        $nilai->induk_murid = $request['murid'];
        $nilai->id_kelas = $request['kelas'];
        $nilai->id_pelajaran= $request['pelajaran'];
        $nilai->nilai = $request['nilai'];
        $nilai->save();
        echo json_encode(array('msg'=>'success'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = Nilai::find($id);
        echo json_encode($nilai);
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
        $nilai = Nilai::find($id);
        $nilai->induk_murid = $request['murid'];
        $nilai->id_kelas = $request['kelas'];
        $nilai->id_pelajaran = $request['pelajaran'];
        $nilai->nilai = $request['nilai'];
        $nilai->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai= Nilai::find($id);
        $nilai->delete();
    }
}
