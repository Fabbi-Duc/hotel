<template>
  <div class="row">
    <div class="col-6">
      <div class="image w-95 h-100">
        <img
          src="https://images.unsplash.com/photo-1513694203232-719a280e022f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cm9vbXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80"
          alt=""
          class="w-100 h-100"
        />
      </div>
    </div>
    <div class="d-flex justify-content-center col-6">
      <ValidationObserver ref="form" v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(bookRoom)" class="form">
          <div class="m-auto">
            <div class="option">
              <label for="">Name</label>
              <ValidationProvider
                name="Name"
                rules="required"
                v-slot="{ errors }"
              >
                <input type="text" class="form-control" v-model="name" />
                <div class="text-left">
                  <span class="warning">{{ errors[0] }}</span>
                </div>
              </ValidationProvider>
            </div>
            <div class="option">
              <label for="">Email</label>
              <ValidationProvider
                name="Email"
                rules="required"
                v-slot="{ errors }"
              >
                <input type="text" class="form-control" v-model="mail" />
                <div class="text-left">
                  <span class="warning">{{ errors[0] }}</span>
                </div>
              </ValidationProvider>
            </div>
            <div class="option">
              <label for="">Birthday</label>
              <ValidationProvider
                name="Birthday"
                rules="required"
                v-slot="{ errors }"
              >
                <input type="date" class="form-control" v-model="birthday" />
                <div class="text-left">
                  <span class="warning">{{ errors[0] }}</span>
                </div>
              </ValidationProvider>
            </div>
            <div class="option">
              <label for="">CMND/PassPort</label>
              <ValidationProvider
                name="Age"
                rules="required"
                v-slot="{ errors }"
              >
                <input type="number" class="form-control" v-model="cmnd" />
                <div class="text-left">
                  <span class="warning">{{ errors[0] }}</span>
                </div>
              </ValidationProvider>
            </div>
            <div class="option">
              <label for="">Check In</label>
              <ValidationProvider
                name="Check In"
                rules="required"
                v-slot="{ errors }"
              >
                <input
                  type="datetime-local"
                  class="form-control"
                  v-model="time_check_in"
                />
                <div class="text-left">
                  <span class="warning">{{ errors[0] }}</span>
                </div>
              </ValidationProvider>
            </div>
            <div class="option">
              <label for="">Check Out</label>
              <ValidationProvider
                name="Check Out"
                rules="required"
                v-slot="{ errors }"
              >
                <input
                  type="datetime-local"
                  class="form-control"
                  v-model="time_check_out"
                />
                <div class="text-left">
                  <span class="warning">{{ errors[0] }}</span>
                </div>
              </ValidationProvider>
            </div>
          </div>
          <div class="m-auto d-flex justify-content-center">
            <button type="submit" class="btn btn-info">Create</button>
          </div>
        </form>
      </ValidationObserver>
    </div>
  </div>
</template>

<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";
export default {
  components: {
    ValidationObserver,
    ValidationProvider,
  },

  props: ["id"],
  data() {
    return {
      name: null,
      mail: null,
      birthday: null,
      cmnd: null,
      time_check_in: null,
      time_check_out: null,
    };
  },

  mounted() {
    console.log(this.id);
  },
  methods: {
    bookRoom() {
      let imgSrc =
        "https://chart.googleapis.com/chart?cht=qr&chl=" +
        this.mail +
        "&chs=160x160&chld=L|0";
      const params = {
        imgSrc: imgSrc,
        email: this.mail,
      };
      this.$store.dispatch("user/bookRoom", params);
    },
  },
};
</script>

<style lang="scss" scoped>
.warning {
  color: red;
  font-size: 14px;
}
label {
  font-size: 18px;
  font-weight: bold;
}
input {
  width: 700px;
}

.option {
  margin-bottom: 20px;
}

button {
  margin: auto;
  width: 200px;
  font-size: 20px;
}
</style>
