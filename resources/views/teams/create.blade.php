@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Create Team</div>

                <div class="panel-body">
                    <component is="team-editor" inline-template>
                        <form v-on:submit="submitTeam">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Race</label>
                                <select name="race_id" v-model="selectedRaceId" v-on:click="loadSelectedRace">
                                    @foreach ($races as $race)
                                        <option value="{{ $race->getId() }}">{{ $race->getName() }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" v-if="selectedRace">
                                <label>Name</label>
                                <input type="text" name="name" v-model="name" placeholder="Team Name"><br>
                            </div>

                            <div v-for="player in players" v-if="selectedRace">
                                <input type="text">

                                <select v-model="player.positionId">
                                    <option v-for="position in selectedRace.positions" v-bind:value="position.id">@{{ position.name  }}</option>
                                </select>
                            </div>

                            <div>
                                <input type="button" class="btn" value="Add Player" v-on:click="addPlayer">
                            </div>

                            <input type="submit" value="Submit" class="btn btn-info">
                        </form>
                    </component>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
