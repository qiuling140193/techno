<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Taman Kanak-kanak</title>
    <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/iCheck/square/blue.css') }}">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">   
    <script src="{{asset('jquery.min.js') }}"></script>
    <script src="css/script.js"></script>
 
   
<script src="script.js"></script>
   
    <!-- <link rel="stylesheet" href="{{ asset('css/animate.css')}}"> -->
    <style type="text/css">
        body {
            background-image:url(image/home.jpg);
            background-attachment: fixed;
        }
       .center {
            margin: auto;
            width: 60%;
            padding: 10px;
        }
        h1{
            margin: auto;
            width: 60%;
            padding: 10px;   
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 750px;
            margin-left: 300px;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        tr:nth-child(odd){
            background-color: #ffffff
        }


        .container {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
            margin-top: 50px;
            margin-left: 320px;
        }

        
        .content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 0px 50px;
        }

        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {
          /* Place the timelime to the left */
        /*  .timeline::after {
            left: 31px;
          }*/
          
          /* Full-width containers */
          .container {
            width: 100%;
            padding-left: 70px;
            padding-right: 25px;
          }
          
         
    </style>
</head>
    <body>
        <div id='cssmenu'>
            <ul>           
            <li class='active'><a href='#'>Home</a></li>          
            <li><a href='#'>Information For Teacher</a></li>         
            <li><a href='#'>Izin / Sakit</a></li>           
            <li><a href='#'>Contact</a></li>
            <li><a href='#'>Logout</a></li>
            </ul>
        </div>


            <div class="center">
                <h1> Nama Murid</h1>
            </div>
                <h2 style="margin-left:300px ">Nilai</h2>
                <table>
                  <tr>
                    <th>Pelajaran</th>
                    <th >Term I</th>
                    <th>Term II</th>
                  </tr>
                  <tr>
                    <td>Membaca</td>
                    <td>80</td>
                    <td>85</td>
                  </tr>
                  <tr>
                    <td>Menulis</td>
                    <td>65</td>
                    <td>70</td>
                  </tr>
                  <tr>
                    <td>Menggambar</td>
                    <td>90</td>
                    <td>90</td>
                  </tr>
                  </tr>
                </table>
            </div>
              <div class="container" style="border: 2px solid red; border-radius: 50px 0px; margin-bottom: 50px">
                <div class="content">
                  <h2>2017</h2>
                  <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
                </div>
                <div class="content">
                  <h2>2017</h2>
                  <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
                </div>
              </div>
    </body>
    <footer>
      <p>Posted by: Hege Refsnes</p>
      <p>Contact information: <a href="mailto:someone@example.com">someone@example.com</a>.</p>
    </footer>
</html>
