@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Teams</div>

                <div class="panel-body">
                    @foreach ($teams as $team)
                        <p>{{ $team->name }} - {{ $team->race_id }} - {{ $team->coach_id }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
