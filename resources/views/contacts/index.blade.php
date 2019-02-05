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
                <a href="{{ route("contacts.create") }}" class="btn btn-default">
                    <i class="glyphicon glyphicon-plus"></i>
                    Add Contact
                </a>
            </div>
            <form action="{{route("contacts.index")}}" class="navbar-from navbar-right" role="search">
                <div class="input-group">
                    <input type="text" name="term" value="{{ Request::get("term") }}" class="form-control" placeholder="search..." style="width: 20%;float: right;" />
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" >
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</nav>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <?php $selected_group = Request::get('group_id')?>
                <a href="{{route('contacts.index')}}" class="list-group-item active">All Contact <span class="badge">{{App\Contact::count()}}</span></a>
                <?php Request::get('group_id')?>
                @foreach(App\Group::all() as $group)
                    <a href="{{route('contacts.index' , ['group_id'=> $group->id] ) }}" class="list-group-item {{$selected_group == $group->id ? 'active' : ''}}">{{$group->name}}<span class="badge">{{$group->contacts->count()}}</span></a>
                @endforeach
            <!--<a href="" class="list-group-item">Friends <span class="badge">3</span></a>-->
                <!--<a href="" class="list-group-item">Other <span class="badge">3</span></a>-->
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
                    @foreach($contacts as $contact)
                        <tr>
                            <td class="middle">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <?php $photo = ! empty($contact->photo) ? $contact->photo : 'default.png'  ?>
                                            {!! Html::image('uploads/' . $photo , $contact->name , ['class'=> 'media-object' , 'width'=> 100 , 'hieght'=> 100 ]) !!}
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$contact->name}}</h4>
                                        <address>
                                            <strong>{{$contact->company}}</strong><br>
                                                {{$contact->email}}
                                        </address>
                                    </div>
                                </div>
                            </td>
                            <td width="100" class="middle">
                                <div>
                                    {!! Form::open(['method' => 'DELETE' , 'route' => ['contacts.destroy', $contact->id ]]) !!}
                                    <a href="{{ route("contacts.edit" , ['id' => $contact->id ] )  }}" class="btn btn-circle btn-default btn-xs" title="Edit">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <button onclick="return confirm('Are you sure');"  type="submit" class="btn btn-circle btn-danger btn-xs" title="Delete">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                    {!! Form::close() !!}
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
<script src="/js/jquery.min.js"></script>
<script src="/jquery-ui/jquery-ui.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jasny-bootstrap.min.js"></script>
<script>
    $(function() {
        $("input[name=term]").autoComplete({
            source: {{"contacts.autocomplete"}} ,
            minLength : 3 ,
            select: function( event , ui) {
                $(this).val(ui.item.value);
            }
        });
    });
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

@yield('form-script')
</body>

@endsection