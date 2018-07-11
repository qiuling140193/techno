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
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $murid }}</h3>
              <p>Total Murid</p>
            </div>
          <div class="icon">
              <i class="fa fa-graduation-cap"></i>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $guru }}</h3>
              <p>Total Guru</p>
            </div>
          <div class="icon">
              <i class="fa fa-user"></i>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $user }}</h3>
              <p>Total User</p>
            </div>
          <div class="icon">
              <i class="fa fa-users"></i>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $pelajaran }}</h3>
              <p>Total Pelajaran</p>
            </div>
          <div class="icon">
              <i class="fa fa-book"></i>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $kelas }}</h3>
              <p>Total Kelas</p>
            </div>
          <div class="icon">
              <i class="fa fa-bell"></i>
          </div>
        </div>
    </div>
</div>
@endsection