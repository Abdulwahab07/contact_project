@extends('layouts.main')

@section('content')
    @if(!Auth::guest())
    <div class="panel panel-default">
            <div class="panel-heading">
              <strong>Edit Contact</strong>
            </div>
            {!! Form::model($contact, ['files' => true, 'route' => ['contacts.update', $contact->id], 'method' => 'PATCH']) !!}

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
