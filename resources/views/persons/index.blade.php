@extends('template.app')

@section('content')
    <style>
        .btn-action {
            margin-left: 5px;
            float: right;
        }
    </style>

    <div class="col-sm-12">
        @foreach(range('A', 'Z') as $letter)
            <div class="btn-group">
                <a href="{{url('persons/'.$letter)}}" class="btn btn-primary {{$letter == $flag ? 'disabled' : ''}}">{{$letter}}</a>
            </div>
        @endforeach
    </div>

    <div class="col-sm-12">
        <h1>{{$flag}}</h1>
    </div>

    <div class="persons-panel">
        @foreach ($persons as $p)
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        {{$p->name}}
                        <a href="{{url("/persons/$p->id/remove")}}" class="btn btn-xs btn-danger btn-action">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                        <a href="{{url("/persons/$p->id/edit")}}" class="btn btn-xs btn-primary btn-action">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                    </div>
                    <div class="panel-body">
                        @foreach ($p->phones as $phone)
                            <p><strong>Phone: </strong>({{$phone->ddd}}) {{$phone->number}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection