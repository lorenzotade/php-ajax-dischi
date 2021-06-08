const app = new Vue({
  el: '#app',

  data: {
    arrDischi: [],
  },

  mounted() {
    axios.get('http://localhost:8888/php-ajax-dischi/api.php')
      .then(res => {
        this.arrDischi = res.data;
      })
      .catch(err => {
        console.log(err);
      })
  }

})