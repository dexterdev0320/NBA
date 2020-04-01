<template>
  <div class="container">
      <div class="row">
          <div class="col-lg-6">
              <h1>Players</h1>
                <div class="my-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" :class="{'is-invalid': player_error.name}" class="form-control" v-model="player.name">
                        <label v-if="player_error.name" class="text-danger">{{player_error.name[0]}}</label>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" min="0" :class="{'is-invalid': player_error.age}" class="form-control" v-model="player.age">
                        <label v-if="player_error.age" class="text-danger">{{player_error.age[0]}}</label>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="number" min="0" :class="{'is-invalid': player_error.contact_number}" class="form-control" v-model="player.contact_number">
                        <label v-if="player_error.contact_number" class="text-danger">{{player_error.contact_number[0]}}</label>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Teams</label>
                        <select class="form-control" :class="{'is-invalid': player_error.team_id}" v-model="player.team_id">
                            <option v-for="team in teams" :key="team.id" :value="team.id">{{team.name}}</option>
                        </select>
                        <label v-if="player_error.team_id" class="text-danger">The team filled is required</label>
                    </div>
                    <button type="submit" class="btn btn-primary" @click="addPlayer">Submit</button>
                </div>
              <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Player's Name</th>
                        <th scope="col">Player's Age</th>
                        <th scope="col">Player's Contact Number</th>
                        <th scope="col">Player's Team</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="plyr in players" :key="plyr.id">
                        <td>{{plyr.name}}</td>
                        <td>{{plyr.age}}</td>
                        <td>{{plyr.contact_number}}</td>
                        <td>{{plyr.team.name}}</td>
                    </tr>
                </tbody>
                </table>
          </div>
          <div class="col-lg-6">
              <h1>TEAMS</h1>

                <div class="my-3">
                    <div class="form-group">
                    <label for="teamName">Team's Name</label>
                    <input type="text" :class="{'is-invalid': team_error.name}" class="form-control" v-model="team.name">
                    <label v-if="team_error.name" class="text-danger" for="message">{{team_error.name[0]}}</label>
                    </div>
                    <div class="form-group">
                        <label for="coachName">Coach's Name</label>
                        <input type="text" :class="{'is-invalid': team_error.coach_name}" class="form-control" v-model="team.coach_name">
                        <label v-if="team_error.coach_name" class="text-danger">{{team_error.coach_name[0]}}</label>
                    </div>
                    <button type="submit" class="btn btn-primary" @click="addTeam">Submit</button>
                </div>

              <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Team's Name</th>
                        <th scope="col">Team's Coach name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="team in teams" :key="team.id">
                        <td>{{team.name}}</td>
                        <td>{{team.coach_name}}</td>
                    </tr>
                </tbody>
                </table>
          </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    mounted() {
        this.fetchTeams();
        this.fetchPlayers();
    },
    data(){
        return {
            teams: {},
            team: {
                name: '',
                coach_name: '',
            },
            team_error: {},
            players: {},
            player: {
                name: '',
                age: '',
                contact_number: '',
                team_id: '',
            },
            player_error: {},
        }
    },
    methods: {
        fetchTeams(){
            axios.get('api/teams')
            .then(res => this.teams = res.data)
            .catch(err => console.log(err));
        },
        fetchPlayers(){
            axios.get('api/players')
            .then(res => this.players = res.data)
            .then(res => {console.log(this.players)})
            .catch(err => console.log(err));
        },
        addTeam(){
            axios.post('api/teams/store', {
                    name: this.team.name,
                    coach_name: this.team.coach_name
            })
            .then(res => {
                toastr.success(res.data.message);
                this.fetchTeams();
                this.team = {};
            })
            .catch(err => {
                if(err.response.status == 422){
                    this.team_error = err.response.data.errors;
                }
            });
        },
        addPlayer(){
            axios.post('api/players/store', {
                name: this.player.name,
                age: this.player.age,
                contact_number: this.player.contact_number,
                team_id: this.player.team_id
            })
            .then(res => {
                toastr.success(res.data.message);
                this.fetchPlayers();
                this.player = {...this.player, name: '', age: '', contact_number: '', team_id: ''};
                this.player_error = {};
            })
            .catch(err => {
                if(err.response.status == 422){
                    this.player_error = err.response.data.errors;
                }
            })
        }
    }
}
</script>

<style>

</style>