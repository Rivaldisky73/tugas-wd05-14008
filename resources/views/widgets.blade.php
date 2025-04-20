// resources/views/widgets.blade.php
@extends('layouts.admin')
@section('title', 'Widgets')
@section('content_title', 'Widgets')
@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item active">Widgets</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Widgets Page</h3>
        </div>
        <div class="card-body">
          This is the Widgets page content.
        </div>
      </div>
    </div>
  </div>
@endsection
