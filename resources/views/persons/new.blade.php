@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>New Contact</h3>
    </div>

    <div class="col-md-6 well">
        <form class="col-md-12" action="{{url('/persons/save')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group col-md-12 {{$errors->has('name') ? 'has-error' : '' }}">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                @if($errors->has('name'))
                    <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group col-md-4 {{$errors->has('ddd') ? 'has-error' : '' }}">
                <label for="name" class="control-label">DDD</label>
                <input type="text" name="ddd" class="form-control">
                @if($errors->has('ddd'))
                    <span class="help-block">{{$errors->first('ddd')}}</span>
                @endif
            </div>
            <div class="form-group col-md-8 {{$errors->has('number') ? 'has-error' : '' }}">
                <label for="name" class="control-label">Phone number</label>
                <input type="text" name="number" class="form-control">
                @if($errors->has('number'))
                    <span class="help-block">{{$errors->first('number')}}</span>
                @endif
            </div>
            <div class="col-md-12">
                <button class="col-md-2 btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection