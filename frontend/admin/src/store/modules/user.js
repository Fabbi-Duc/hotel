import { listUsers, bookRoom, deleteUser, createUser, updateUser, getInfoUser, pay } from "@/api/user.api";

export const state = {
  listUsers: null,
  bookRoom: null,
};

export const getters = {
  listUsers: state => state.listUsers,
  bookRoom: state => state.bookRoom,
};

export const mutations = {
  setListUsers(state, listUsers) {
    state.listUsers = listUsers;
  },
  setBookRoom(state, bookRoom) {
    state.bookRoom = bookRoom;
  },
};

export const actions = {
  getListUsers({ commit }, payload) {
    return new Promise((resolve, reject) => {
      listUsers(payload)
        .then(response => {
          commit('setListUsers', response.data);
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
          commit('setBookRoom', response.data);
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getInfoUser({ commit }, id) {
    return new Promise((resolve, reject) => {
      getInfoUser(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  deleteUser ({ commit }, id) {
    return new Promise((resolve, reject) => {
      deleteUser(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  pay ({ commit }, id) {
    return new Promise((resolve, reject) => {
      pay(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  createUser ({ commit }, params) {
    return new Promise((resolve, reject) => {
      createUser(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateUser ({ commit }, params) {
    return new Promise((resolve, reject) => {
      updateUser(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },
}