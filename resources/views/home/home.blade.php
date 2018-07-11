<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Taman Kanak-kanak</title>
    <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/iCheck/square/blue.css') }}">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">   
    <script src="{{asset('jquery.min.js') }}"></script>
    <script src="css/script.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datepicker/datepicker3.css') }}">
</head>  
<script src="script.js"></script>                 
</head>
  <body>
    <div id='cssmenu'>
      <ul>           
      <li class='active'><a href='/'>Home</a></li>          
      <li><a href='com/'>Comment</a></li>          
      <li><a href='#'>Contact</a></li>
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a></li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
      <li style="margin-left: 60%"><a href='#'>{{ Auth::user()->name }}</a></li> 
      </ul>
    </div>     
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">  
            <table class="table table-striped">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Kelas</th>
                  <th>Pelajaran</th>
                  <th>Nilai</th>
               </tr>
            </thead>
            <tbody></tbody>
            </table>

          </div>
        </div>
      </div>
    </div>

    <div class="container" style="border: 2px solid red; border-radius: 50px 0px; margin-bottom: 50px">
      <div class="content">
      @foreach ($comment as $list)
        <h2>{{ $list->name_guru }}</h2>
        <p>{{ $list->comment }}</p>
      @endforeach
      </div>
    </div>
    </body>
    <footer style="margin-left: 40%">
      <p style="margin-left: 10%">User: {{ Auth::user()->name }}</p>
      <p>Contact information: <a href="mailto:someone@example.com">someone@example.com</a>.</p>
    </footer>
        <script src="{{ asset('adminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('adminLTE/dist/js/app.min.js') }}"></script>

        <script src="{{ asset('adminLTE/plugins/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/validator.min.js') }}"></script>
        <script type="text/javascript">
        var table, save_method;
        $(function(){
           table = $('.table').DataTable({
             "processing" : true,
             "ajax" : {
               "url" : "{{ route('ortu.data') }}",
               "type" : "GET"
             }
           }); 
           
           $('#modal-form form').validator().on('submit', function(e){
              if(!e.isDefaultPrevented()){
                 var id = $('#id').val();
                 if(save_method == "add") url = "";
                 else url = "ortu/"+id;
                 
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

      
        </script>
</html>
