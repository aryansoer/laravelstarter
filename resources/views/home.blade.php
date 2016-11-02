@extends('layouts.adminlte')

@section('title', 'Administrator dashboard')

@section('content-header')
    <h1>
        Content Header
        <small>simple description</small>
    </h1>
@endsection

@section('breadcrumbs', Breadcrumbs::render('home'))

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            You are logged in!
        </div>
    </div>
@endsection
