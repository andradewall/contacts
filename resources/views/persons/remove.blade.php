@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Remove Contact</h3>

    </div>

    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                {{$person->name}}
            </div>
            <div class="panel-body">
                @foreach ($person->phones as $phone)
                    <p><strong>Phone: </strong>({{$phone->ddd}}) {{$phone->number}}</p>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6">
        Do you really wanna remove this contact?<br/><br/>
        <a href="{{url('persons')}}" class="btn btn-default">
            <i class="glyphicon glyphicon-chevron-left"></i> Cancel
        </a>
        <a href="{{url("persons/$person->id/delete")}}" class="btn btn-danger">
            <i class="glyphicon glyphicon-remove"></i> Remove
        </a>
    </div>
@endsection