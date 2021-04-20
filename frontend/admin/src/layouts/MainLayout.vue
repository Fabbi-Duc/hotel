<template>
  <div id="main">
    <router-view />
  </div>
</template>

<script>
export default {
  name: "MainLayout",
  data() {
    return {};
  },
  created() {
    this.$echo
      .channel("laravel_database_notifications")
      .listen("SendNotification", data => {
        console.log(data);
      });
  },
  mounted() {
    this.sendNotification();
  },
  methods: {
    sendNotification() {
      this.$store.dispatch("notification/sendNotificationSystem", {
        message: "aaa",
        user: "bbb"
      });
    }
  }
};
</script>
