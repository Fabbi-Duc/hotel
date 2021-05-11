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
    <div class="content" style="margin-top: 150px">
      <b-row class="mt-5">
        <b-col md="9">
          <h2 style="text-transform: uppercase;" class="mb-4">List of dishes</h2>
          <b-row class="" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; padding: 10px 0">
            <b-col
              md="4"
              class="food__wrap mb-3"
              v-for="(item, index) in listFood"
              :key="index"
            >
              <div
                class="d-flex align-items-start"
                style="
                  height: 120px;
                  border-radius: 5px;
                  overflow: hidden;
                  background-color: rgba(226, 230, 235, 1);
                "
              >
                <img :src="item.image" alt="" width="120px" height="120px" />
                <div
                  class="d-flex flex-column justify-content-between align-items-start ml-3 h-100"
                >
                  <div>
                    <div class="food__name">{{ item.name }}</div>
                    <strike class="food__price--small">{{
                      item.price_old
                    }}</strike>
                    <div class="food__price--nomal">{{ Intl.NumberFormat().format(item.price_new) }}</div>
                  </div>
                  <div class="food__add" @click="addCart(index)">+</div>
                </div>
              </div>
            </b-col>
          </b-row>
        </b-col>
        <b-col md="3">
          <h2 class="text-center mb-4">CART</h2>
          <div v-if="listFoodSelected.length > 0">
            <div
              class="food__selected text-center"
            >
              <div
                class="mb-4"
                v-for="(item, index) in listFoodSelected"
                :key="index"
              >
                <img :src="item.image" alt="" width="120px" height="120px" />
                <div class="food__selected__name">
                  {{ item.name }}
                </div>
                <div class="food__selected__price">{{ item.price_new }}</div>
                <div
                  class="food__selected__option d-flex justify-content-center"
                >
                  <div class="minus" @click="minus(index)">-</div>
                  <span class="quantity">{{ item.quantity }}</span>
                  <div class="plus" @click="plus(index)">+</div>
                </div>
              </div>
              <div class="delete-all-cart" @click="deleteAllCart">DELETE ALL</div>
            </div>
            <div class="total-price text-center">
              <div class="total-price__label">TOTAL PRICE</div>
              <div class="total-price__value">{{ Intl.NumberFormat().format(totalPrice) ? totalPrice : 0 }}</div>
            </div>
            <div class="book__food text-center">ORDER</div>
          </div>
          <div
            v-else
            class="text-center"
            style="font-size: 20px; font-weight: 600"
          >
            Empty rows!
          </div>
        </b-col>
      </b-row>
    </div>
    <!--FOOTER-->
    <div class="footer">
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
    </div>
  </div>
</template>
<script>
export default {
  components: {},
  data() {
    return {
      listFood: [
        {
          name: "Trà Sữa Trân Châu Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg",
        },
        {
          name: "Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://images.foody.vn/res/g68/678691/s120x120/5a261c61-f993-45d8-bb2c-26063c1a-1fa1a5eb-210405170946.jpeg",
        },
        {
          name: "Trà Sữa.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://images.foody.vn/res/g68/678691/s120x120/5a261c61-f993-45d8-bb2c-26063c1a-1fa1a5eb-210405170946.jpeg",
        },
        {
          name: "Trà Sữa.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://images.foody.vn/res/g68/678691/s120x120/5a261c61-f993-45d8-bb2c-26063c1a-1fa1a5eb-210405170946.jpeg",
        },
        {
          name: "Trà Sữa.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://images.foody.vn/res/g68/678691/s120x120/5a261c61-f993-45d8-bb2c-26063c1a-1fa1a5eb-210405170946.jpeg",
        },
        {
          name: "Trà Sữa Trân Châu Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg",
        },
        {
          name: "Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://images.foody.vn/res/g68/678691/s120x120/5a261c61-f993-45d8-bb2c-26063c1a-1fa1a5eb-210405170946.jpeg",
        },
        {
          name: "Trà Sữa Trân Châu Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg",
        },
        {
          name: "Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://images.foody.vn/res/g68/678691/s120x120/5a261c61-f993-45d8-bb2c-26063c1a-1fa1a5eb-210405170946.jpeg",
        },
        {
          name: "Trà Sữa Trân Châu Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg",
        },
        {
          name: "Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://images.foody.vn/res/g68/678691/s120x120/5a261c61-f993-45d8-bb2c-26063c1a-1fa1a5eb-210405170946.jpeg",
        },
        {
          name: "Trà Sữa Trân Châu Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg",
        },
        {
          name: "Đường Đen.",
          price_old: "40000",
          price_new: "35000",
          image:
            "https://images.foody.vn/res/g68/678691/s120x120/5a261c61-f993-45d8-bb2c-26063c1a-1fa1a5eb-210405170946.jpeg",
        }
      ],
      listFoodSelected: [],
      totalPrice: 0
    };
  },
  watch: {
    listFoodSelected: function() {
      this.getTotalPrice();
    }
  },
  methods: {
    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    },
    addCart(index) {
      if (this.listFoodSelected.length < 1) {
        this.listFood[index].quantity = 1;
        this.listFoodSelected.push(this.listFood[index]);
        this.$forceUpdate();
      } else if (this.listFoodSelected.length >= 1) {
        if (this.listFood[index].quantity == 1) {
          alert("Món ăn đã có trong giỏ hàng");
        } else {
          this.listFood[index].quantity = 1;
          this.listFoodSelected.push(this.listFood[index]);
          this.$forceUpdate();
        }
      }
    },
    plus(index) {
      this.listFoodSelected[index].quantity++;
      this.$forceUpdate();
      this.getTotalPrice();
    },
    minus(index) {
      this.listFoodSelected[index].quantity--;
      this.$forceUpdate();
      if (this.listFoodSelected[index].quantity == 0) {
        this.listFoodSelected.splice(index, 1);
      }
      this.getTotalPrice();
    },
    getTotalPrice() {
      this.totalPrice = 0;
      this.listFoodSelected.forEach(element => {
        var totalOneProduct = element.price_new * element.quantity;
        this.totalPrice += totalOneProduct;
      })
    },
    deleteAllCart() {
      this.listFoodSelected = [];
    }
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
  margin: 0 auto 200px;
  .food__wrap {
    .food__name {
      font-size: 15px;
      font-weight: 600;
    }
    .food__price--small {
      font-size: 12px;
    }
    .food__add {
      margin-top: 5px;
      width: 30px;
      height: 30px;
      background-color: red;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 25%;
      cursor: pointer;
    }
  }
  .food__selected {
    scrollbar-width: thin;
    height: 550px;
    overflow-y: scroll;
    transition: 0.5s;
    border-radius: 3px;
    background-color: #FFF;
    padding: 10px 40px;
    color: #6d6f71;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    &__name {
      font-weight: 600;
      font-size: 18px;
      margin-top: 10px;
    }
    &__price {
      color: rgb(131, 127, 127);
    }
    &__option {
      .quantity {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        margin: 0 2px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      }
      .minus,
      .plus {
        width: 30px;
        height: 30px;
        background-color: red;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10%;
        cursor: pointer;
        user-select: none;
        color: #FFF;
      }
    }
  }
  .delete-all-cart {
    padding: 5px 10px; 
    border: 1px solid red; 
    font-weight: 600;
    cursor: pointer;
    margin-bottom: 10px;
    transition: 0.3s;
  }
  .delete-all-cart:hover {
    background-color: red;
    color: #FFF;
  }
  .total-price {
    &__label {
      margin-top: 15px;
      font-size: 20px;
      font-weight: 600;
    }
    &__value {
      font-size: 20px;
    }
  }
  .book__food {
    margin-top: 20px;
    padding: 20px 0;
    color: #fff;
    background-color: #c59d5f;
    transition: 0.3s;
  }
  .book__food:hover {
    cursor: pointer;
    background-color: #fff;
    color: black;
    font-weight: bold;
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