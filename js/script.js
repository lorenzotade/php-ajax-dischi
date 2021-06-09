const app = new Vue({
  el: '#app',

  data: {
    arrRecords: [],
    arrGenres: [],
    arrYears: [],
    apiURL: 'http://localhost:8888/php-ajax-dischi/api.php',
    selectGenre: 'all',
  },

  methods: {
    getAPI() {
      axios.get(this.apiURL, {
        params: {
          genre: this.selectGenre
        }
      })
      .then(res => {
        this.arrRecords = res.data.records;
        this.arrGenres = res.data.genres;
      })
      .catch(err => {
        console.log(err);
      })
    }
  },

  created() {
    this.getAPI();
  }

})