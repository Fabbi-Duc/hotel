<template>
  <div>
    <input type="text" v-model="mail">
    <button type="submit" @click="bookRoom">Submit</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      mail: null,
    };
  },
  methods: {
    bookRoom() {
      let imgSrc = "https://chart.googleapis.com/chart?cht=qr&chl=" + this.mail + "&chs=160x160&chld=L|0";
      const params = {
        imgSrc: imgSrc,
        email: this.mail
      }
      this.$store.dispatch('user/bookRoom', params);
    }
  }
};
</script>
