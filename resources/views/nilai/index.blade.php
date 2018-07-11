@extends('layouts.app')

@section('title')
  Daftar Pelajaran
@endsection

@section('breadcrumb')
   @parent
   <li>Pelajaran</li>
@endsection

@section('content')     
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
      </div>
      <div class="box-body">  

<table class="table table-striped">
<thead>
   <tr>
      <th>No</th>
      <th>Nama Murid</th>
      <th>Kelas</th>
      <th>Pelajaran</th>
      <th>Nilai</th>
      <th>Aksi</th>
   </tr>
</thead>
<tbody></tbody>
</table>

      </div>
    </div>
  </div>
</div>

@include('nilai.form')
@endsection

@section('script')
<script type="text/javascript">
$('#kelas').change(function() {
  $('#murid option[value!="-1"]').remove();
  $('#pelajaran option[value!="-1"]').remove();
  let index = $('option:selected', this).attr('key')
  let group = <?php echo json_encode($groups); ?>;
  let selectedGroup = group[index]
  for(let key in selectedGroup['murid']) {
    $('#murid').append('<option value="'+selectedGroup['murid'][key].induk_murid+'">'+selectedGroup['murid'][key].induk_murid+'</option>')
  }
  for(let key in selectedGroup['pelajaran']) {
    $('#pelajaran').append('<option value="'+selectedGroup['pelajaran'][key].id_pelajaran+'">'+selectedGroup['pelajaran'][key].pelajaran+'</option>')
  }
})

var table, save_method;
$(function(){
   table = $('.table').DataTable({
     "processing" : true,
     "ajax" : {
       "url" : "{{ route('nilai.data') }}",
       "type" : "GET"
     }
   }); 
   
   $('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('nilai.store') }}";
         else url = "nilai/"+id;
         
         $.ajax({
           url : url,
           type : "POST",
           data : $('#modal-form form').serialize(),
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
   $('.modal-title').text('Tambah Nilai');
}

function editForm(id){
   save_method = "edit";
   $('input[name=_method]').val('PATCH');
   $('#modal-form form')[0].reset();
   $.ajax({
     url : "nilai/"+id+"/edit",
     type : "GET",
     dataType : "JSON",
     success : function(data){
       $('#modal-form').modal('show');
       $('.modal-title').text('Edit Nilai');
       
       $('#id').val(data.id_nilai);
       $('#guru').val(data.id_guru);
       $('#murid').val(data.induk_murid);
       $('#kelas').val(data.id_kelas);
       $('#pelajaran').val(data.id_pelajaran);
       $('#nilai').val(data.nilai);
       
     },
     error : function(){
       alert("Tidak dapat menampilkan data!");
     }
   });
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "nilai/"+id,
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