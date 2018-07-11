@extends('layouts.app')

@section('title')
  Data Murid
@endsection

@section('breadcrumb')
   @parent
   <li>Data Murid</li>
@endsection

@section('content')     
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Data Murid</a>
      </div>
      <div class="box-body">  

<table class="table table-striped">
<thead>
   <tr>
      <th>No</th>
      <th>No Induk</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Nama Ayah</th>
      <th>Nama Ibu</th>
      <th>Kelas</th>
      <th>Foto</th>
      <th width="100">Aksi</th>
   </tr>
</thead>
<tbody></tbody>
</table>

      </div>
    </div>
  </div>
</div>

@include('murid.form')
@endsection

@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.table').DataTable({
     "processing" : true,
     "ajax" : {
       "url" : "{{ route('murid.data') }}",
       "type" : "GET"
     }
   }); 
   
   $('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('murid.store') }}";
         else url = "murid/"+id;

         var formData = new FormData(this);
         $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
         $.ajax({
           url : url,
           type : "POST",
           data : formData,
           contentType: false,
           processData: false,
           success : function(data){
             $('#modal-form').modal('hide');
             table.ajax.reload();
           },
           error : function(){
             alert("Tidak dapat menyimpan data!");
           }   
         });
         return false;
     }
   });
});

function addForm(){
   save_method = "add";
   $('input[name=_method]').val('POST');
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();            
   $('.modal-title').text('Tambah Murid');
}

function editForm(id){
   save_method = "edit";
   $('input[name=_method]').val('PATCH');
   $('#modal-form form')[0].reset();
   $.ajax({
     url : "murid/"+id+"/edit",
     type : "GET",
     dataType : "JSON",
     success : function(data){
       $('#modal-form').modal('show');
       $('.modal-title').text('Edit Murid');
       
       $('#id').val(data.id_murid);
       $('#induk_murid').val(data.induk_murid);
       $('#name').val(data.name);
       $('#alamat').val(data.alamat);
       $('#tempat_lahir').val(data.tempat_lahir);
       $('#tanggal_lahir').val(data.tanggal_lahir);
       $('#name_ayah').val(data.name_ayah);
       $('#name_ibu').val(data.name_ibu);
       $('#kelas').val(data.id_kelas);
       $('.tampil-foto').html('<img src="images/'+data.foto+'" width="100">');
       
     },
     error : function(){
       alert("Tidak dapat menampilkan data!");
     }
   });
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "murid/"+id,
       type : "POST",
       data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
       success : function(data){
         table.ajax.reload();
       },
       error : function(){
         alert("Tidak dapat menghapus data!");
       }
     });
   }
}
</script>
@endsection