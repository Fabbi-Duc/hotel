<template>
  <div id="customer-body">
    <div class="header">
      <b-row
        class="header__contact d-flex justify-content-between align-items-center"
      >
        <b-col cols="12" md="8" class="d-flex">
          <div>
            <b-icon icon="geo-alt-fill" class="header__contact__icon"></b-icon>
            <span>9 Crosby Street, New York City</span>
          </div>
          |
          <div>
            <b-icon icon="envelope" class="header__contact__icon"></b-icon>
            <span>Nguyendinhtanvp07@gmail.com</span>
          </div>
          <div>
            <b-icon icon="telephone" class="header__contact__icon"></b-icon>
            <span>0123456789</span>
          </div>
        </b-col>
        <b-col cols="12" md="4" class="text-right">
          <b-icon icon="twitter" class="header__contact__icon--right"></b-icon>
          <b-icon icon="facebook" class="header__contact__icon--right"></b-icon>
          <b-icon
            icon="instagram"
            class="header__contact__icon--right"
          ></b-icon>
          <b-icon icon="twitter" class="header__contact__icon--right"></b-icon>
        </b-col>
      </b-row>
      <div class="header__nav">
        <b-row
          class="header__nav__wrap justify-content-between align-items-center"
        >
          <b-col md="4" class="header__nav__brand">
            <img
              src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/12/3Logo-5star-regular.png"
              alt=""
            />
          </b-col>
          <b-col md="6" class="header__nav__top text-right">
            <a class="active" href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
            <a href=""><b-icon icon="search"></b-icon></a>
          </b-col>
        </b-row>
      </div>
    </div>
    <div class="content" style="margin-top: 110px">
      <b-row class="d-flex">
        <b-col md="9">
          <img
            class="current-image"
            src="https://placekitten.com/801/800"
            alt=""
          />
          <div>
            <img
              class="list-image"
              v-for="(image, i) in images"
              :src="image"
              :key="i"
              @click="index = i"
            />
          </div>
          <vue-gallery-slideshow
            :images="images"
            :index="index"
            @close="index = null"
            style="margin-top: 108px"
          ></vue-gallery-slideshow>
        </b-col>
        <b-col md="3" class="book-room">
          <h2>choose a room</h2>
          <!-- <label for="" class="text-left">NAME</label>
          <b-form-input
            v-model="name"
            type="email"
            placeholder="Enter name"
            required
          ></b-form-input>
          <label for="" class="text-left">AGE</label>
          <b-form-select
            v-model="ageSelected"
            :options="age"
            required
          ></b-form-select>
          <label for="" class="text-left">EMAIL</label>
          <b-form-input
            type="email"
            v-model="email"
            placeholder="Enter email"
            required
          ></b-form-input>
          <label for="" class="text-left">CMND</label>
          <b-form-input
            type="email"
            v-model="passport"
            placeholder="Enter cmnd"
            required
          ></b-form-input> -->
          <label for="" class="text-left">CHECK-IN:</label>
          <input
            type="datetime-local"
            v-model="checkIn"
            class="book__options__input form-control"
          />
          <label for="" class="text-left">CHECK-OUT:</label>
          <input
            type="datetime-local"
            v-model="checkOut"
            class="book__options__input form-control"
          />
          <label for="" class="text-left">INITIAL PRICE:</label>
          <div class="text-left price">400$</div>
          <label for="" class="text-left">YOUR PRICE:</label>
          <div class="text-left price">350$</div>
          <div class="btn__book-room" @click="bookRoom()">BOOK ROOM</div>
        </b-col>
      </b-row>
    </div>
    <div class="detail-room" v-if="customer_room" style="padding: 30px">
      <label for="" style="font-weight: bold; font-size: 20px"> List of customers who are renting rooms</label>
      <b-table striped hover :items="customer_room" :fields="fields">
        <template #cell(numerical)="row">
          {{ ++row.index }}
        </template>
        <template #cell(name)="row">
          <span>
            {{ row.item.name }}
          </span>
        </template>
      </b-table>
    </div>
    <!--FOOTER-->
    <!-- <div class="footer">
      <div class="footer__wrap">
        <b-row>
          <b-col md="4" class="text-center">
            <h5 class="footer__wrap__contact">CONTACT</h5>
            <p class="footer__wrap__address">
              9 Crosby Street, New York City, NY
            </p>
            <p class="footer__wrap__mail">fivestar@qodeinteractive.com</p>
            <p class="footer__wrap__phone">( 646 ) 218-6400</p>
            <div
              class="footer__wrap__bank d-flex justify-content-center align-item-center"
            >
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-1.png"
                alt=""
              />
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-2.png"
                alt=""
              />
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-3.png"
                alt=""
              />
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-4.png"
                alt=""
              />
              <img
                src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-5.png"
                alt=""
              />
            </div>
          </b-col>
          <b-col md="4" class="text-center">
            <h5 class="footer__wrap__name">VINTAGE</h5>
            <p class="footer__wrap__description">
              Lorem ipsum dolor sit amet, consecteturadipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad ipsum dolor sit amet. Lorem ipsum dolor sit amet,
              consectetura iolor sit amet.
            </p>
          </b-col>
          <b-col md="4" class="text-center">
            <h5 class="footer__wrap__share">NEWSLETTER</h5>
            <div class="footer__wrap__send-mail">
              <input type="text" placeholder="E-Mail" />
              <span class="go">GO</span>
            </div>
          </b-col>
        </b-row>
        <div class="footer__copyright text-center mt-5">
          © 2021 QODE INTERACTIVE, ALL RIGHTS RESERVED
        </div>
      </div>
    </div> -->
  </div>
</template>
<script>
import VueGallerySlideshow from "vue-gallery-slideshow";
import store from "@/store";
export default {
  components: {
    VueGallerySlideshow,
  },

  async created() {
    await store.dispatch("auth/getAccountCustomer").then(res => {
      this.user = res.data;
    });
  },
  data() {
    return {
      fields: [
        { key: "numerical", label: "Numerical" },
        { key: "name", label: "Name" },
        { key: "start_time", label: "Start Time" },
        { key: "end_time", label: "End Time" },
      ],
      images: [
        "https://placekitten.com/801/800",
        "https://placekitten.com/802/800",
        "https://placekitten.com/803/800",
        "https://placekitten.com/804/800",
      ],
      index: null,
      name: null,
      age: [16, 17, 18, 19, 20, 21],
      ageSelected: null,
      email: null,
      passport: null,
      checkIn: null,
      checkOut: null,
      customer_room: null,
      user: null
    };
  },

  mounted() {
    if (this.$route.query.room_status == 2) {
      this.getInfoCustomerRoom(this.$route.query.room_id);
    }
  },
  methods: {
    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    },
    async getInfoCustomerRoom(id) {
      await this.$store.dispatch("room/getInfoRoomCustomer", id).then((res) => {
        this.customer_room = res.data;
      });
    },
    async bookRoom() {
      console.log(this.user);
      const params = {
        user_id: this.user.id,
        id: this.$route.query.room_id,
        start_time: this.checkIn,
        end_time: this.checkOut,
      };
      if (this.checkOut <= this.checkIn) {
        alert("Ngay ket thuc phai lon hon ngay bat dau");
        return;
      }

      await this.$store
        .dispatch("customer/bookRoomOnline", params)
        .then((respone) => {
          if (!respone.success) {
            alert(respone.message);
            return;
          } else {
            alert("Ban da dat phong thanh cong");
          }
        });
    },
  },
};
</script>
<style lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.header {
  position: fixed;
  top: 0;
  z-index: 100;
  left: 0;
  right: 0;
  background-color: rgba(30, 30, 30, 0.9999999);
  &__contact {
    height: 34px;
    margin: 0 auto;
    width: 1200px;
    color: #777;
    font-size: 11px;
    line-height: 1;
    &__icon {
      margin-right: 10px;
      color: #777;
      &--right {
        margin-left: 20px;
        color: #777;
      }
    }
  }
  &__nav {
    &__wrap {
      width: 1200px;
      height: 100%;
      margin: 0 auto;
    }
    background-color: rgba(51, 49, 50, 0.9999999);
    height: 70px;
    margin: 0 auto;
    width: 100%;
    &__brand {
      width: 150px;
      height: 26px;
      img {
        width: auto;
        height: 100%;
      }
    }
  }
  .header__nav__top {
    overflow: hidden;
    background-color: #333;
    a {
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 12px;
      height: 100%;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
    }
    a:hover {
      color: rgb(138, 136, 136);
      transition: 0.3s ease-in;
    }
    a.active {
      color: rgb(138, 136, 136);
    }
  }
}
.content {
  width: 1200px;
  margin: 0 auto 50px;
  .current-image {
    width: 100%;
    height: 700px;
  }
  .list-image {
    width: 100px;
    height: 100px;
    background-size: cover;
    cursor: pointer;
    margin: 5px;
    border-radius: 3px;
    border: 1px solid lightgray;
    object-fit: contain;
  }
  .book-room {
    padding-bottom: 20px;
    text-align: center;
    width: 100%;
    height: 100%;
    min-height: 700px;
    background-color: #333132;
    h2 {
      color: #fff;
      margin: 0 0 30px 0;
      padding: 30px 0;
      border-bottom: 1px solid #fff;
    }
    label {
      color: #c7c7c7;
      font-weight: 500;
      display: block;
      margin-top: 25px;
      margin-bottom: 2px;
    }
    .price {
      display: block;
      color: #999;
    }
    .book__options__input {
      width: 100%;
    }
    .btn__book-room {
      margin-top: 40px;
      padding: 20px 0;
      color: #fff;
      background-color: #c59d5f;
      transition: 0.3s;
    }
    .btn__book-room:hover {
      cursor: pointer;
      background-color: #fff;
      color: black;
      font-weight: bold;
    }
  }
}
.footer {
  height: 400px;
  width: 100%;
  padding: 70px 0 39px;
  background-color: #333132;
  h5 {
    margin-bottom: 40px;
  }
  &__wrap {
    width: 1200px;
    margin: 0 auto;
    color: #fff;
    p {
      margin-bottom: 10px;
    }
    &__bank {
      img {
        margin: 0 5px 5px 0;
        cursor: pointer;
      }
    }
    &__send-mail {
      max-width: 320px;
      margin: 0 auto;
      height: 40px;
      border: 1px solid #716f70;
      input {
        float: left;
        width: 80%;
        height: 100%;
        border: none;
        outline: none;
        padding: 0 12px;
        background-color: transparent;
        color: #fff;
      }
      .go {
        float: right;
        display: inline-block;
        border-left: 1px solid #716f70;
        width: 60px;
        height: 40px;
        line-height: 40px;
        cursor: pointer;
      }
      .go:hover {
        color: #000000;
        background-color: #fff;
      }
    }
  }
}
</style>