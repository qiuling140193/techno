<?php

namespace App\Http\Controllers;

use App\Murid;
use App\Kelas;
use Illuminate\Http\Request;
use Datatables;
use Image;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();      
       return view('murid.index', compact('kelas'));
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
                    <a onclick="editForm('.$list->id_murid.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    <a onclick="deleteData('.$list->id_murid.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
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
        $murid = new Murid();
        $murid->induk_murid  = $request['induk_murid'];
        $murid->name   = $request['name'];
        $murid->alamat = $request['alamat'];
        $murid->tempat_lahir = $request['tempat_lahir'];
        $murid->tanggal_lahir = $request['tanggal_lahir'];
        $murid->name_ayah = $request['name_ayah'];
        $murid->name_ibu = $request['name_ibu'];
        $murid->id_kelas = $request['kelas'];
        if ($request->hasFile('foto')) {
         $file = $request->file('foto');
         $nama_gambar = $murid->name . "." . $file->getClientOriginalExtension();
          Image::make($file)->resize(100, 100)->save(public_path('images/' . $nama_gambar));

         // $file->move($lokasi, $nama_gambar);
         $murid->foto       = $nama_gambar;  
      }
        $murid->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function show(Murid $murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Murid  $murid
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
        $murid->alamat = $request['alamat'];
        $murid->tempat_lahir = $request['tempat_lahir'];
        $murid->tanggal_lahir = $request['tanggal_lahir'];
        $murid->name_ayah = $request['name_ayah'];
        $murid->name_ibu = $request['name_ibu'];
        $murid->id_kelas = $request['kelas'];
        if ($request->hasFile('foto')) {
         $file = $request->file('foto');
         $nama_gambar = $murid->name . "." . $file->getClientOriginalExtension();
          Image::make($file)->resize(100, 100)->save(public_path('images/' . $nama_gambar));

         // $file->move(public_path('images/' . $nama_gambar));
         $murid->foto       = $nama_gambar;  
      }
        $murid->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $murid = Murid::find($id);
        $murid->delete();
    }
}
