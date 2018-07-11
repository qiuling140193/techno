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
        

        <!-- HTML Codes by Quackit.com -->
        <style type="text/css">
        textarea.html-text-box {background-color:#ffffff;background-image:url(http://);background-repeat:no-repeat;background-attachment:fixed;border-width:1;border-style:solid;border-color:#cccccc;font-family:Arial;font-size:14pt;color:#000000; margin-top: 100px; margin-left: 250px;}
        input.html-text-box {background-color:#ffffff;font-family:Arial;font-size:14pt;color:#000000;}
        </style>
        <form method="post" action="http://"><textarea name="comments" cols="80" rows="10" class="html-text-box">Comments here...</textarea><br><input type="submit" value="Submit" class="html-text-box" style="margin-left: 250px";><input type="reset" value="Reset" class="html-text-box"></form>
         

        
    </body>
</html>
