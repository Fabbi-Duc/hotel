import { listCustomers, bookRoom } from "@/api/customer.api";

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
}
