@extends('layouts.visitor')

@section('title', 'Welcome Page')

@section('content-header')
    <h1>
        Content Header
        <small>simple description</small>
    </h1>
@endsection

@section('breadcrumbs', Breadcrumbs::render('main'))

@section('content')

    <div class="callout callout-info">
        <h4>Tip!</h4>

        <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
    </div>

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Blank Box</h3>
        </div>
        <div class="box-body">
            Welcome To LaravelStarter
            <roles-list></roles-list>
            <example></example>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
