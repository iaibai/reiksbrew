@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Team</div>

                <div class="panel-body">
                    <form method="post" action="/teams">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        Race: <select name="race_id">
                            @foreach ($races as $race)
                                <option value="{{ $race->getId() }}">{{ $race->getName() }}</option>
                            @endforeach
                        </select>
                        Name: <input type="text" name="name" value="" placeholder="Team Name"><br>

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
