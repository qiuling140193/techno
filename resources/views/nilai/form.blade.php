<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
   <form class="form-horizontal" data-toggle="validator" method="post">
   {{ csrf_field() }} {{ method_field('POST') }}
   
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title"></h3>
   </div>
            
<div class="modal-body">
   
   <input type="hidden" id="id" name="id">
   <div class="form-group">
         <input type="hidden" value="{{ Auth::user()->id_user }}" class="form-control" id="guru" placeholder="User Id" name='guru'>
      </div>
   <div class="form-group">
    <label for="kelas" class="col-md-3 control-label">Kelas</label>
    <div class="col-md-6">
      <select id="kelas" type="text" class="form-control" name="kelas" required>
        <option value=""> -- Pilih Kelas-- </option>
        @foreach($groups as $key => $group)
        <option key="{{$key}}" value="{{ $group->kelas->id_kelas }}">{{ $group->kelas->name_kelas }}</option>
        @endforeach
      </select>
      <span class="help-block with-errors"></span>
    </div>
  </div>

   <div class="form-group">
    <label for="murid" class="col-md-3 control-label">Murid</label>
    <div class="col-md-6">
      <select id="murid" type="text" class="form-control" name="murid" required>
        <option value="-1"> -- Pilih Murid-- </option>
      </select>
      <span class="help-block with-errors"></span>
    </div>
  </div>

  <div class="form-group">
    <label for="pelajaran" class="col-md-3 control-label">Pelajaran</label>
    <div class="col-md-6">
      <select id="pelajaran" type="text" class="form-control" name="pelajaran" required>
        <option value="-1"> -- Pilih Pelajaran-- </option>
      </select>
      <span class="help-block with-errors"></span>
    </div>
  </div>

   <div class="form-group">
      <label for="nilai" class="col-md-3 control-label">Nilai</label>
      <div class="col-md-6">
         <input id="nilai" type="number" class="form-control" name="nilai" autofocus required>
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
