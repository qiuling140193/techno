<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
   <form class="form-horizontal" data-toggle="validator" method="post" enctype="multipart/form-data">
   {{ csrf_field() }} {{ method_field('POST') }}
   
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title"></h3>
   </div>
            
<div class="modal-body">
   
   <input type="hidden" id="id" name="id">
   <div class="form-group">
      <label for="name" class="col-md-3 control-label">Nama Murid</label>
      <div class="col-md-8">
         <input id="name" type="text" class="form-control" name="name" autofocus required>
         <span class="help-block with-errors"></span>
      </div>
   </div>
  
   <div class="form-group">
    <label for="kelas" class="col-md-3 control-label">Kelas</label>
    <div class="col-md-6">
      <select id="kelas" type="text" class="form-control" name="kelas" required>
        <option value=""> -- Pilih Kelas-- </option>
        @foreach($kelas as $list)
        <option value="{{ $list->id_kelas }}">{{ $list->name_kelas }}</option>
        @endforeach
      </select>
      <span class="help-block with-errors"></span>
    </div>
  </div>

</div>
   
   <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
      <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
   </div>
      
   </form>

         </div>
      </div>
   </div>
