
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('content');

Vue.component('team-editor', {

    created: function() {
        this.loadSelectedRace();
    },

    data: function() {
        return {
            maxPlayers: 16,
            selectedRaceId: 'humans',
            name: '',
            players: [],
            races: [],
            selectedRace: null
        };
    },

    methods: {
        loadSelectedRace: function() {

            if (this.races[this.selectedRaceId]) {
                this.selectedRace = this.races[this.selectedRaceId];
            } else {
                $.getJSON('/api/races/' + this.selectedRaceId, function(data) {
                    this.races[this.selectedRaceId] = data;
                    this.selectedRace = data;
                    this.updatePlayerPositionsForNewRace();
                }.bind(this));
            }

        },

        updatePlayerPositionsForNewRace: function() {
            for (i in this.players) {
                this.players[i].positionId = this.selectedRace.defaultPositionId;
            }
        },

        addPlayer: function() {
            this.players.push({positionId: this.selectedRace.defaultPositionId});
        },

        submitTeam: function() {
            var postData = {
                raceId: this.selectedRaceId,
                name: this.name
            };

            this.$http.post('/api/teams', postData).then((response) => {
                alert('wee');
            }, (response) => {
                alert('argh');
            });
        }
    }
});

const app = new Vue({
    el: '#app'
});
