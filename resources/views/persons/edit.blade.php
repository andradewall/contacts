@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Edit Contact</h3>
    </div>

    <div class="col-md-6 well">
        <form class="col-md-12" action="{{url('/persons/edit')}}" method="POST">
            {{csrf_field()}}
        <input type="hidden" name="id" value="{{$person->id}}">
            <div class="form-group col-md-12  {{$errors->has('name') ? 'has-error' : '' }}">
                <label for="name" class="control-label">Name</label>
            <input type="text" name="name" value="{{$person->name}}" class="form-control">
            @if($errors->has('name'))
                <span class="help-block">{{$errors->first('name')}}</span>
            @endif
            </div>
            <div class="col-md-12">
                <button class="col-md-2 btn btn-success">Save</button>
            </div>
        </form>
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
@endsection