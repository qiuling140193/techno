@extends('layouts.app')

@section('title')
  Dashboard
@endsection

@section('breadcrumb')
   @parent
   <li>Dashboard</li>
@endsection

@section('content')     
<div class="row">
    <div class="box-body"> 
    	<h2><i class="fa fa-graduation-cap fa-3x"> Wellcome {{ Auth::user()->name }}</i></h2> 
    </div>
</div>

@endsection