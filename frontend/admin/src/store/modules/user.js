import { listUsers, bookRoom } from "@/api/user.api";

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
}