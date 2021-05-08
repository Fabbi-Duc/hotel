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
    <div class="m-auto col-6">
      <ValidationObserver v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(bookRoom)" class="form" ref="form">
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
                rules="required|email"
                v-slot="{ errors }"
              >
                <input type="text" class="form-control" v-model="email" />
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
            <div class="option row">
              <b-col>
                <label for="">Gender</label>
                <ValidationProvider
                  name="Birthday"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form-select
                    class="position__select"
                    v-model="gender"
                    :options="genderOption"
                  />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </b-col>
              <b-col>
                <label for="">Phone</label>
                <ValidationProvider
                  name="Phone"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <input type="number" class="form-control" v-model="phone" />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </b-col>
            </div>
            <div class="option">
              <label for="">Identity Card</label>
              <ValidationProvider
                name="Identity Card"
                rules="required"
                v-slot="{ errors }"
              >
                <input
                  type="number"
                  class="form-control"
                  v-model="identity_card"
                />
                <div class="text-left">
                  <span class="warning">{{ errors[0] }}</span>
                </div>
              </ValidationProvider>
            </div>
            <div class="option">
              <label for="">Start Time</label>
              <ValidationProvider
                name="Start Time"
                rules="required"
                v-slot="{ errors }"
              >
                <input
                  type="datetime-local"
                  class="form-control"
                  v-model="start_time"
                />
                <div class="text-left">
                  <span class="warning">{{ errors[0] }}</span>
                </div>
              </ValidationProvider>
            </div>
            <div class="option">
              <label for="">End Time</label>
              <ValidationProvider
                name="End Time"
                rules="required"
                v-slot="{ errors }"
              >
                <input
                  type="datetime-local"
                  class="form-control"
                  v-model="end_time"
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
      email: null,
      birthday: null,
      phone: null,
      identity_card: null,
      start_time: null,
      end_time: null,
      gender: 1,
      genderOption: [
        { value: 0, text: "Male" },
        { value: 1, text: "Female" },
      ],
    };
  },

  mounted() {
    console.log(this.id);
  },
  methods: {
    async bookRoom() {
      const payload = {
        name: this.name,
        email: this.email,
        id: this.id,
        birthday: this.birthday,
        phone: this.phone,
        identity_card: this.identity_card,
        start_time: this.start_time,
        end_time: this.end_time,
        gender: this.gender,
        password: 123456,
      };
      if(this.end_time <= this.start_time) {
        alert("Ngay ket thuc phai lon hon ngay bat dau");
        this.$refs['form'].reset();
        return;
      };
      await this.$store
        .dispatch("customer/bookRoom", payload)
        .then((respone) => {
          if(!respone.success) {
            alert(respone.message);
            return
          }
          this.getQrCode();
        });
    },

    async getQrCode() {
      let imgSrc =
        "https://chart.googleapis.com/chart?cht=qr&chl=" +
        this.email +
        this.start_time +
        this.id +
        "&chs=160x160&chld=L|0";
      const params = {
        imgSrc: imgSrc,
        email: this.email,
      };
      await this.$store.dispatch("user/bookRoom", params);
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

.option {
  margin-bottom: 20px;
}

button {
  margin: auto;
  width: 200px;
  font-size: 20px;
}
</style>
