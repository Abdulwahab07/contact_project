@extends('layouts.main')

@section('content')
    @if(!Auth::guest())
    <div class="panel panel-default">
            <div class="panel-heading">
              <strong>Add Contact</strong>
            </div>
            {!! Form::open(['route' => 'contacts.store', 'files' => true]) !!}
            
            @include("contacts.form")

            {!! Form::close() !!}
          </div>
    @endif

    @if(Auth::guest())
        <div class="panel-heading">
            <strong>You Don't Have Permission</strong>
        </div>
    @endif
@endsection
