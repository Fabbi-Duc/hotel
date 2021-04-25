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
      <b-row class="header__nav justify-content-between align-items-center">
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
    <b-carousel
      id="carousel-1"
      class="position-relative"
      v-model="slide"
      :interval="4000"
      controls
      indicators
      background="#ababab"
      img-width="1024"
      img-height="480"
      style="text-shadow: 1px 1px 2px #333; margin: 0 -270px"
      @sliding-start="onSlideStart"
      @sliding-end="onSlideEnd"
    >
      <!-- Text slides with image -->
      <b-carousel-slide
        caption="First slide"
        text="Nulla vitae elit libero, a pharetra augue mollis interdum."
        img-src="https://picsum.photos/1024/480/?image=52"
      ></b-carousel-slide>

      <!-- Slides with custom text -->
      <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54">
        <h1>Welcome to Hotel</h1>
      </b-carousel-slide>

      <!-- Slides with image only -->
      <b-carousel-slide
        img-src="https://picsum.photos/1024/480/?image=58"
      ></b-carousel-slide>

      <!-- Slides with img slot -->
      <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
      <b-carousel-slide>
        <template #img>
          <img
            class="d-block img-fluid w-100"
            width="1024"
            height="480"
            src="https://picsum.photos/1024/480/?image=55"
            alt="image slot"
          />
        </template>
      </b-carousel-slide>

      <!-- Slide with blank fluid image to maintain slide aspect ratio -->
      <b-carousel-slide caption="Blank Image" img-blank img-alt="Blank image">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
          eros felis, tincidunt a tincidunt eget, convallis vel est. Ut
          pellentesque ut lacus vel interdum.
        </p>
      </b-carousel-slide>
      <div class="book__options position-absolute">
      <b-row class="justify-content-between align-items-end">
        <b-col>
          CHECK-IN:
          <input type="date" class="book__options__input" />
        </b-col>
        <b-col>
          CHECK-OUT:
          <input type="date" class="book__options__input" />
        </b-col>
        <b-col>
          ROOMS:
          <b-form-select v-model="selectedRoom" :options="optionsRooms"></b-form-select>
        </b-col>
        <b-col>
          LOCATION:
          <b-form-select v-model="selectedLocation" :options="optionsLocations"></b-form-select>
        </b-col>
        <b-col>
          ADULTS:
          <b-form-select v-model="selectedAdult" :options="optionsAdults"></b-form-select>
        </b-col>
        <b-col>
          CHILDREN:
          <b-form-select v-model="selectedChildren" :options="optionsChildrens"></b-form-select>
        </b-col>
        <b-col>
          <button>BOOK NOW</button>
        </b-col>
      </b-row>
    </div>
    </b-carousel>

    <p class="mt-4">
      Slide #: {{ slide }}<br />
      Sliding: {{ sliding }}
    </p>
    
  </div>
</template>
<script>
export default {
  data() {
    return {
      slide: 0,
      sliding: null,
      selectedRoom: null,
      optionsRooms: [
        { value: null, text: "Please select an option" },
        { value: "a", text: "This is First option" },
        { value: "b", text: "Selected Option" },
        { value: { C: "3PO" }, text: "This is an option with object value" },
        { value: "d", text: "This one is disabled", disabled: true },
      ],
      selectedLocation: null,
      optionsLocations: [
        { value: null, text: "Please select an option" },
        { value: "a", text: "This is First option" },
        { value: "b", text: "Selected Option" },
        { value: { C: "3PO" }, text: "This is an option with object value" },
        { value: "d", text: "This one is disabled", disabled: true },
      ],
      selectedAdult: null,
      optionsAdults: [
        { value: null, text: "Please select an option" },
        { value: "a", text: "This is First option" },
        { value: "b", text: "Selected Option" },
        { value: { C: "3PO" }, text: "This is an option with object value" },
        { value: "d", text: "This one is disabled", disabled: true },
      ],
      selectedChildren: null,
      optionsChildrens: [
        { value: null, text: "Please select an option" },
        { value: "a", text: "This is First option" },
        { value: "b", text: "Selected Option" },
        { value: { C: "3PO" }, text: "This is an option with object value" },
        { value: "d", text: "This one is disabled", disabled: true },
      ],
    };
  },
  methods: {
    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    },
  },
};
</script>
<style lang="scss">
#customer-body {
  margin: 0 auto;
  padding: 0 270px;
  .header {
    margin: 0 -270px;
    background-color: rgba(30, 30, 30, 0.9999999);
    &__contact {
      padding: 0 270px;
      height: 34px;
      width: 100%;
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
      padding: 0 270px;
      background-color: rgba(51, 49, 50, 0.9999999);
      height: 70px;
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
  .book__options {
    display: flex;
    align-items: center;
    background-color: #1e1e1e;
    padding: 0 270px;
    color: #c7c7c7;
    height: 153px;
    bottom: 120px;
    &__input {
      display: inline-block;
      width: 100%;
      height: calc(1.5em + 0.75rem + 2px);
      padding: 0.375rem 1.75rem 0.375rem 0.4rem;
      font-size: 0.875rem;
      font-weight: 400;
      line-height: 1.5;
      vertical-align: middle;
      border: 1px solid;
      border-radius: 0.25rem;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      color: #768192;
      border-color: #d8dbe0;
      outline: none;
      box-shadow: none;
      cursor: pointer;
    }
    button {
      padding: 6px 10px;
      width: 100%;
      text-align: center;
      color: #fff;
      border-color: #c59d5f;
      background-color: #c59d5f;
      border: 1px solid;
      border-radius: 0.25rem;
      font-size: 0.875rem;
      letter-spacing: .12em;
      font-weight: 700;
      outline: 0;
      position: relative;
      text-transform: uppercase;
      box-sizing: border-box;
    }
  }
}
</style>