@extends('contacts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item active">All Contact <span class="badge">10</span></a>
                    <a href="" class="list-group-item">Family <span class="badge">4</span></a>
                    <a href="" class="list-group-item">Friends <span class="badge">3</span></a>
                    <a href="" class="list-group-item">Other <span class="badge">3</span></a>
                </div>
            </div><!-- /.col-md-3 -->

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Edit Contact</strong>
                    </div>

                    {!! Form::open(  ['route' => 'contacts.store' , 'files' => true]) !!}
                    @include("contacts.form")

                    {!! Form::close() !!}
                </div>
                @endsection


