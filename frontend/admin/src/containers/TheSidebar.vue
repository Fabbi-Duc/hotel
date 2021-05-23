<template>
  <CSidebar
    fixed
    :minimize="minimize"
    :show="show"
    @update:show="(value) => $store.commit('set', ['sidebarShow', value])"
  >
    <CSidebarBrand class="d-md-down-none" to="/">
      <CIcon
        class="c-sidebar-brand-full"
        name="logo"
        size="custom-size"
        :height="35"
        viewBox="0 0 556 134"
      />
      <CIcon
        class="c-sidebar-brand-minimized"
        name="logo"
        size="custom-size"
        :height="35"
        viewBox="0 0 110 134"
      />
    </CSidebarBrand>

    <CRenderFunction v-if="admin" flat :content-to-render="$options.nav" />
    <CRenderFunction
      v-if="receptionists"
      flat
      :content-to-render="$options.nav_receptionists"
    />
    <CSidebarMinimizer
      class="d-md-down-none"
      @click.native="$store.commit('set', ['sidebarMinimize', !minimize])"
    />
  </CSidebar>
</template>

<script>
import nav from "./_nav";
import nav_receptionists from "./_nav-receptionists";
// import { sendNotificationFirebase } from "@/api/notification.api";
import firebase from "@/plugins/firebase";

export default {
  name: "TheSidebar",
  nav,
  nav_receptionists,
  async created() {
    await this.getUser();
    await this.getTokenFirebase();
  },
  computed: {
    show() {
      return this.$store.state.sidebarShow;
    },
    minimize() {
      return this.$store.state.sidebarMinimize;
    },
  },
  data() {
    return {
      receptionists: false,
      admin: true,
      user: null
    };
  },
  methods: {
    getTokenFirebase() {
      const self = this;
      const messaging = firebase.messaging();
      messaging
        .requestPermission()
        .then(function () {
          return messaging.getToken();
        })
        .then(function (token) {
          self.tokenBrowse = token;
          self.$store.dispatch("notification/saveDeviceToken", {
            user_id: self.user.id,
            device_token: token,
            position: self.user.position,
          });
        })
        .catch(function (err) {
          console.log("Unable to get permission to notify.", err);
        });
    },
    getUser() {
      this.$store.dispatch('auth/getAccount').then(res => {
        this.user = res.data
      })
    }
  },
};
</script>
