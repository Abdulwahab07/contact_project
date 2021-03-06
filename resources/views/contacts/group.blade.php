@extends('contacts.header')

@section('body_index')
    <body>
    <!-- navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand text-uppercase" href="#">
                    My contact
                </a>
            </div>
            <!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <div class="nav navbar-right navbar-btn">
                    <a href="form.html" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i>
                        Add Contact
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- content -->
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
                @if(session('message'))
                    <div class="alert alert-success">
                        {{  session('message') }}
                    </div>
                @endif
                <div class="panel panel-default">
                    <table class="table">
                        @foreach($groups as $group)
                            <tr>
                                <td class="middle">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="http://placehold.it/100x100" alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$group->id}}</h4>
                                            <address>
                                                <strong>{{$group->name}}</strong><br>
                                                {{$group->created_at}}
                                            </address>
                                        </div>
                                    </div>
                                </td>
                                <td width="100" class="middle">
                                    <div>
                                        <a href="#" class="btn btn-circle btn-default btn-xs" title="Edit">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-circle btn-danger btn-xs" title="Edit">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

                <div class="text-center">
                    <nav>

                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    </body>

@endsection