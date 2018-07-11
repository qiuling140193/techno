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
         <input type="hidden" value="{{ Auth::user()->id_user }}" class="form-control" id="murid" placeholder="User Id" name='murid'>
      </div>

      <div class="form-group">
       <label for="nig" class="col-md-3 control-label">Murid</label>
       <div class="col-md-6">
         <select id="nig" type="text" class="form-control" name="nig" required>
           <option value=""> -- Pilih guru-- </option>
           @foreach($guru as $list)
           <option value="{{ $list->nig }}">{{ $list->name_guru }}</option>
           @endforeach
         </select>
         <span class="help-block with-errors"></span>
       </div>
     </div>

      <div class="form-group">
         <label for="comment" class="col-md-3 control-label">Comment</label>
         <div class="col-md-6">
            <input id="comment" type="text" class="form-control" name="comment" autofocus required>
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
