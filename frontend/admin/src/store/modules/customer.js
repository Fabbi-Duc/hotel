import { listCustomers, bookRoom, getInfoCustomer, updateBookRoom, registerCustomer, getFood, order, listOrder, listFoodOrder, updateOrderFood } from "@/api/customer.api";

export const state = {
  listCustomer: null,
};

export const getters = {
  listCustomer: state => state.listCustomer,
};

export const mutations = {
  setListCustomer(state, listCustomer) {
    state.listCustomer = listCustomer;
  },
};

export const actions = {

  registerCustomer({ commit }, payload) {
    return new Promise((resolve, reject) => {
      registerCustomer(payload)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getListCustomer({ commit }, payload) {
    return new Promise((resolve, reject) => {
      listCustomers(payload)
        .then(response => {
          commit('setListCustomer', response.data);
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  bookRoom({ commit }, payload) {
    return new Promise((resolve, reject) => {
      bookRoom(payload)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getInfoCustomer({ commit }, id) {
    return new Promise((resolve, reject) => {
      getInfoCustomer(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateBookRoom({ commit }, id) {
    return new Promise((resolve, reject) => {
      updateBookRoom(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getFood({ commit }, params) {
    return new Promise((resolve, reject) => {
      getFood(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  order({ commit }, params) {
    return new Promise((resolve, reject) => {
      order(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  listOrder({ commit }, params) {
    return new Promise((resolve, reject) => {
      listOrder(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  listFoodOrder({ commit }, room_service_food_id) {
    return new Promise((resolve, reject) => {
      listFoodOrder(room_service_food_id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateOrderFood({ commit }, room_service_food_id) {
    return new Promise((resolve, reject) => {
      updateOrderFood(room_service_food_id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  }
}
