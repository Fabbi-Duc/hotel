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
        <b-row class="header__nav__wrap justify-content-between align-items-center">
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
    <b-carousel
      id="carousel-1"
      class="position-relative carousel"
      v-model="slide"
      :interval="4000"
      controls
      indicators
      background="#ababab"
      img-width="1024"
      img-height="480"
      style="text-shadow: 1px 1px 2px #333;"
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
            <b-form-select
              v-model="selectedRoom"
              :options="optionsRooms"
            ></b-form-select>
          </b-col>
          <b-col>
            LOCATION:
            <b-form-select
              v-model="selectedLocation"
              :options="optionsLocations"
            ></b-form-select>
          </b-col>
          <b-col>
            ADULTS:
            <b-form-select
              v-model="selectedAdult"
              :options="optionsAdults"
            ></b-form-select>
          </b-col>
          <b-col>
            CHILDREN:
            <b-form-select
              v-model="selectedChildren"
              :options="optionsChildrens"
            ></b-form-select>
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
    <div class="list__room">
      <h2 class="list__room__label text-center">ROOMS & SUITS</h2>
      <div class="list__room__line text-center"></div>
      <div class="list__room__wrap">
        <b-row class="text-center">
          <b-col cols="12" md="4" class="list__room__wrap__item">
            <div class="list__room__wrap__item__img">
              <span class="list__room__wrap__item__price position-absolute">
                <span class="list__room__wrap__item__price--label">Starting from</span>
                <span class="list__room__wrap__item__price--value">450$</span>
              </span>
              <a href="">
                <img src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/12/mainhome-room-1-img-1.jpg" width="100%" alt="">
              </a>
            </div>
            <div class="list__room__wrap__item__content">
              <h5 class="list__room__wrap__item__content-title">Single rooms normal</h5>
              <div class="list__room__wrap__item__content-line"></div>
              <p class="list__room__wrap__item__content-description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.
              </p>
              <div class="list__room__wrap__item__content-details">List Rooms</div>
            </div>
          </b-col>
          <b-col cols="12" md="4" class="list__room__wrap__item">
            <div class="list__room__wrap__item__img">
              <span class="list__room__wrap__item__price position-absolute">
                <span class="list__room__wrap__item__price--label">Starting from</span>
                <span class="list__room__wrap__item__price--value">450$</span>
              </span>
              <a href="">
                <img src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/12/mainhome-room-1-img-1.jpg" width="100%" alt="">
              </a>
            </div>
            <div class="list__room__wrap__item__content">
              <h5 class="list__room__wrap__item__content-title">Double room normals</h5>
              <div class="list__room__wrap__item__content-line"></div>
              <p class="list__room__wrap__item__content-description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.
              </p>
              <div class="list__room__wrap__item__content-details">List Rooms</div>
            </div>
          </b-col>
          <b-col cols="12" md="4" class="list__room__wrap__item">
            <div class="list__room__wrap__item__img">
              <span class="list__room__wrap__item__price position-absolute">
                <span class="list__room__wrap__item__price--label">Starting from</span>
                <span class="list__room__wrap__item__price--value">450$</span>
              </span>
              <a href="">
                <img src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/12/mainhome-room-1-img-1.jpg" width="100%" alt="">
              </a>
            </div>
            <div class="list__room__wrap__item__content">
              <h5 class="list__room__wrap__item__content-title">VIP single rooms</h5>
              <div class="list__room__wrap__item__content-line"></div>
              <p class="list__room__wrap__item__content-description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.
              </p>
              <div class="list__room__wrap__item__content-details">List Rooms</div>
            </div>
          </b-col>
          <b-col cols="12" md="4" class="list__room__wrap__item">
            <div class="list__room__wrap__item__img">
              <span class="list__room__wrap__item__price position-absolute">
                <span class="list__room__wrap__item__price--label">Starting from</span>
                <span class="list__room__wrap__item__price--value">450$</span>
              </span>
              <a href="">
                <img src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/12/mainhome-room-1-img-1.jpg" width="100%" alt="">
              </a>
            </div>
            <div class="list__room__wrap__item__content">
              <h5 class="list__room__wrap__item__content-title">VIP double rooms</h5>
              <div class="list__room__wrap__item__content-line"></div>
              <p class="list__room__wrap__item__content-description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.
              </p>
              <div class="list__room__wrap__item__content-details">List Rooms</div>
            </div>
          </b-col>
        </b-row>
      </div>
    </div>

    <!--FOOTER-->
    <div class="footer">
      <div class="footer__wrap">
        <b-row>
          <b-col md="4" class="text-center">
            <h5 class="footer__wrap__contact">CONTACT</h5>
            <p class="footer__wrap__address">9 Crosby Street, New York City, NY</p>
            <p class="footer__wrap__mail">fivestar@qodeinteractive.com</p>
            <p class="footer__wrap__phone">( 646 ) 218-6400</p>
            <div class="footer__wrap__bank d-flex justify-content-center align-item-center">
              <img src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-1.png" alt="">
              <img src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-2.png" alt="">
              <img src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-3.png" alt="">
              <img src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-4.png" alt="">
              <img src="https://fivestar.qodeinteractive.com/wp-content/uploads/2017/05/fotter-card-img-haver-5.png" alt="">
            </div>
          </b-col>
          <b-col md="4" class="text-center">
            <h5 class="footer__wrap__name">VINTAGE</h5>
            <p class="footer__wrap__description">
              Lorem ipsum dolor sit amet, consecteturadipiscing elit, sed do eiusmod tempor 
              incididunt ut labore et dolore magna aliqua. 
              Ut enim ad ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetura iolor sit amet.
            </p>
          </b-col>
          <b-col md="4" class="text-center">
            <h5 class="footer__wrap__share">NEWSLETTER</h5>
            <div class="footer__wrap__send-mail">
              <input type="text" placeholder="E-Mail">
              <span class="go">GO</span>
            </div>
          </b-col>
        </b-row>
        <div class="footer__copyright text-center mt-5">© 2021 QODE INTERACTIVE, ALL RIGHTS RESERVED</div>
      </div>
    </div>
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
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
#customer-body {
  // padding-bottom: 200px;
  margin: 0 auto;
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
  .carousel {
    width: 100%;
    margin: 0 auto;
  }
  .book__options {
    display: flex;
    align-items: center;
    background-color: #1e1e1e;
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
      letter-spacing: 0.12em;
      font-weight: 700;
      outline: 0;
      position: relative;
      text-transform: uppercase;
      box-sizing: border-box;
    }
  }
  .list__room {
    &__label {
      font-size: 42px;
      font-weight: 400;
      letter-spacing: .1em;
      text-transform: uppercase;
      color: #1e1e1e;
      padding-bottom: 20px;
    }
    &__line {
      width: 170px;
      height: 1px;
      background-color: #c59d5f;
      margin: 0 auto;
    }
    &__wrap {
      width: 1200px;
      // height: 270px;
      margin: 30px auto 0;
      &__item {
        cursor: pointer;
        margin-bottom: 50px;
        &__price {
          opacity: 0;
          top: 50%;
          left: 50%;
          font-weight: 500;
          font-size: 30px;
          color: #FFFFFF;
          z-index: 10;
          -webkit-transform: translateY(-60%) translateX(-50%);
          -moz-transform: translateY(-60%) translateX(-50%);
          transform: translateY(-60%) translateX(-50%);
          -webkit-transition: transform .23s,opacity .23s;
          -moz-transition: transform .23s,opacity .23s;
          transition: transform .23s,opacity .23s;
          text-shadow: 1px 1px 1px rgb(243, 243, 243);
          &--label {
            display: block;
          }
        }
        &__img {
          position: relative;
          a {
            &::after {
              position: absolute;
              display: block;
              content: " ";
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(51,49,50,.55);
              opacity: 0;
              -webkit-transition: opacity .23s;
              -moz-transition: opacity .23s;
              transition: opacity .23s;
            }
          }
        }
        &__content {
          &-title {
            margin-top: 15px;
            text-transform: uppercase;
            color: #1e1e1e;
            font-weight: 500;
          }
          &-line {
            width: 80px;
            height: 2px;
            background-color: #c59d5f;
            margin: 0 auto 15px;
          }
        }
      }
      &__item:hover {
        .list__room__wrap__item__price {
          opacity: 1;
          -webkit-transform: translateY(-50%) translateX(-50%);
          -moz-transform: translateY(-50%) translateX(-50%);
          transform: translateY(-50%) translateX(-50%);
        }
        a::after {
          position: absolute;
          display: block;
          content: " ";
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(51,49,50,.55);
          opacity: 1;
          -webkit-transition: opacity .23s;
          -moz-transition: opacity .23s;
          transition: opacity .23s;
        }
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
      color: #FFF;
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
          color: #FFF;
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
}
</style>