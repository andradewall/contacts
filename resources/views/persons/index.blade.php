@extends('template.app')

@section('content')
    <div class="persons-panel">
        @foreach ($persons as $p)
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">{{$p->name}}</div>
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