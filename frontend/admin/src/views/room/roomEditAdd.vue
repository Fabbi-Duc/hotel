<template>
  <div>
    <ValidationObserver ref="form" v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(update)" class="form">
        <div class="room-update row">
          <div class="col-4">
            <div class="image">
              <img
                v-if="pictureUrl"
                class="img-rounded"
                :src="pictureUrl"
                alt=""
              />
            </div>
            <label
              class="d-flex align-items-center add-image justify-content-center position-relative label--top f-w3"
            >
              <b-form-file
                :state="Boolean(avatar)"
                class="d-none"
                ref="form-file"
                v-model="avatar"
                v-on:change="chooseImage"
                accept="image/*"
              />
              <div class="text-center posision-absolute w-100 text-center">
                Add Image
              </div>
            </label>
          </div>
          <div class="col-8">
            <div class="form-group">
              <label for="">Name</label>
              <br />
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
            <div class="row">
              <div class="form-group col">
                <label for="">Floor</label>
                <br />
                <ValidationProvider
                  name="Floor"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form-select
                    class="type__select form-control col"
                    v-model="floor"
                    :options="floorOptions"
                  />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="">Type</label>
                <br />
                <ValidationProvider
                  name="Type"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form-select
                    class="type__select form-control col"
                    v-model="type"
                    :options="types"
                  />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
              <div class="form-group col">
                <label for="">Status</label>
                <br />
                <ValidationProvider
                  name="Status"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form-select
                    class="type__select form-control col"
                    v-model="status"
                    :options="statusOptions"
                  />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
            <label for="" v-if="type == 1">Cost Room Normal</label>
            <div class="row" v-if="type == 1">
              <div class="form-group col">
                <input
                  type="text"
                  class="form-control"
                  disabled
                  placeholder="Cost_first_hour: 1000000 VND"
                />
              </div>
              <div class="form-group col">
                <input
                  type="text"
                  class="form-control"
                  disabled
                  placeholder="Cost_last_hour: 700000 VND"
                />
              </div>
            </div>
            <label for="" v-if="type == 2">Cost Room Vip</label>
            <div class="row" v-if="type == 2">
              <div class="form-group col">
                <input
                  type="text"
                  class="form-control"
                  disabled
                  placeholder="Cost_first_hour: 1500000 VND"
                />
              </div>
              <div class="form-group col">
                <input
                  type="text"
                  class="form-control"
                  disabled
                  placeholder="Cost_last_hour: 1000000 VND"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="form-group mt-3">
          <label for="">Decription</label>
          <br />
          <ValidationProvider
            name="Decription"
            rules="required"
            v-slot="{ errors }"
          >
            <textarea
              type="text"
              class="form-control"
              rows="9"
              cols="50"
              v-model="decription"
            />
            <div class="text-left">
              <span class="warning">{{ errors[0] }}</span>
            </div>
          </ValidationProvider>
        </div>
        <div class="d-flex justify-content-center form-group">
          <button class="btn btn-primary mr-3">
            {{ id ? "Update" : "Create" }}
          </button>
          <button class="btn btn-info">Update Room Types</button>
        </div>
      </form>
    </ValidationObserver>
  </div>
</template>

<script>
import firebase from "@/plugins/firebase";
import { ValidationObserver, ValidationProvider } from "vee-validate";
export default {
  components: {
    ValidationObserver,
    ValidationProvider,
  },
  data() {
    return {
      room: null,
      type: "",
      name: "",
      nameRoom: null,
      avatar: null,
      pictureUrl: null,
      decription: "",
      status: "",
      floor: "",
      types: [
        { value: 1, text: "Vip One" },
        { value: 2, text: "Normal One" },
        { value: 3, text: "Vip Two" },
        { value: 4, text: "Normal Two" },
      ],
      floorOptions: [
        { value: 1, text: "1" },
        { value: 2, text: "2" },
      ],
      statusOptions: [
        { value: 1, text: "Empty" },
        { value: 2, text: "Hired" },
        { value: 3, text: "Reserve" },
      ],
    };
  },

  props: ["id"],

  mounted() {
    this.getInfoRoom();
    this.getRoom();
  },

  methods: {
    chooseImage(event) {
      this.imageData = event.target.files[0];
      var storage = firebase.storage();
      var storageRef = storage.ref();
      const imgRef = storageRef.child(`imagesRoom/${this.imageData.name}`);
      imgRef.put(this.imageData).then(() => {
        imgRef.getDownloadURL().then((url) => {
          this.pictureUrl = url;
        });
      });
    },
    async getRoom() {
      await this.$store.dispatch("room/getNameRoom").then((response) => {
        this.nameRoom = response.data;
        console.log(this.nameRoom);
      });
    },

    async update() {
      if (this.id) {
        const params = {
          name: this.name,
          room_type_id: this.type,
          status: this.status,
          image_url: this.pictureUrl,
          decription: this.decription,
          code_room: "",
          id: this.id,
          floor: this.floor
        };
        if (this.pictureUrl) {
          console.log(params);
          await this.$store.dispatch("room/updateRoom", params);
        } else {
          alert("Vui long them anh vao");
        }
      } else {
        if (this.pictureUrl) {
          for (let i = 0; i < this.nameRoom.length; i++) {
            if (this.name === this.nameRoom[i].name) {
              alert("Ten da ton tai vui long nhap ten moi");
              return;
            }
          }
          const params = {
            name: this.name,
            room_type_id: this.type,
            status: this.status,
            image_url: this.pictureUrl,
            decription: this.decription,
            code_room: "",
            floor: this.floor
          };
          await this.$store.dispatch("room/createRoom", params);
        } else {
          alert("Vui long them anh vao");
        }
      }
    },
    async getInfoRoom() {
      if (this.id) {
        await this.$store
          .dispatch("room/getInfoRoom", this.id)
          .then((response) => {
            this.room = response.room;
            this.pictureUrl = this.room.image_url;
            this.name = this.room.name;
            this.type = this.room.room_type_id;
            this.status = this.room.status;
            this.decription = this.room.decription;
            this.floor = this.room.floor
          });
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.image {
  width: 100%;
  height: 390px;
  box-shadow: #00000029 0px 3px 15px;
  img {
    width: 100%;
    height: 100%;
  }
}
label {
  font-size: 18px;
  font-weight: bold;
}

.add-image {
  padding: 5px;
  width: 100px;
  height: 20px;
  margin: auto;
  box-shadow: #00000029 0px 3px 15px;
  border-radius: 5px;
  margin-top: 10px;
  background-color: white;
  font-size: 16px;
  font-weight: inherit;
}

.warning {
  color: red;
  font-size: 12px;
}
</style>
