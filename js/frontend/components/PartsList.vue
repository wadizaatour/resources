<template>
  <div class="gray-background">
    <div class="row m-4">
      <div class="col-4 form-group has-search  m-4">
        <span class="fa fa-search form-control-feedback"></span>
        <b-form-input
          v-model="search"
          type="text"
          placeholder="Search by Name"
          style="background-color: white"
        ></b-form-input>
      </div>
      <div class="col-7 mt-4">
        <select name="mark" class="form-control request-input white-bg">
          <option selected="selected" value="">
            -
          </option>
          <option value="peugeot">
            Peugeot
          </option>
          <option value="fiat">
            Fiat
          </option>
        </select>
      </div>
    </div>
    <input type="text" class="form-control" v-model="search" />
    <div>
      <table class="table">
        <thead>
          <tr>
            <th>name</th>
            <th>eyes</th>
          </tr>
        </thead>
        <tr v-for="player in getPlayers" :key="player.name">
          <td>{{ player.name }}</td>
          <td>{{ player.sport }}</td>
        </tr>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
        filter: '',
        sort: '',
        options: [
            { label: 'Default', value: 'none' },
            { label: 'Most Viewed', value: 'views' },
        ],
        players: [
            { name: 'Charles Wilson', sport: 'Baseball', views: 312},
            { name: 'Tony Domo', sport: 'Football', views: 23121 },
            { name: 'Rump Baker', sport: 'Basketball', views: 231},
            { name: 'Brad Pitt', sport: 'Acting', views: 443},
            { name: 'Kermit the Frog', sport: 'Frogball', views: 403},
            { name: 'Taylor Swift', sport: 'Singing', views: 8843}
        ]
    }
  },
    computed: {
        getPlayers() {

            let players = this.players.filter((player) => {
                return player.name.toLowerCase().includes(this.filter.toLowerCase());
            });
            if (this.sort === 'views') {
                return players.sort(function(a, b) {
                    return b.views - a.views
                });
            } else {
                return players;
            }
        }
    }
}
</script>
