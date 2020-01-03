@extends('template.app')

@section('content')
    <div class="persons-panel">
        @foreach ($persons as $p)
            <div class="col-md-4 panel panel-default">
               <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        @endforeach
    </div>
@endsection