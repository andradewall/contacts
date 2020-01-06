@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>New Contact</h3>
    </div>

    <div class="col-md-6 well">
    <form class="col-md-12" action="{{url('/persons/store')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group col-md-12">
            <label for="name" class="control-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Type here...">
        </div>
        <div class="form-group col-md-4">
            <label for="name" class="control-label">DDD</label>
            <input type="text" name="ddd" class="form-control" placeholder="Type here...">
        </div>
        <div class="form-group col-md-8">
            <label for="name" class="control-label">Phone number</label>
            <input type="text" name="number" class="form-control" placeholder="Type here...">
        </div>
        <button class="col-md-2 btn btn-success">Save</button>
    </form>
    </div>
@endsection