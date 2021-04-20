import { saveToken, sendNotification } from "@/api/notification.api";

export const state = {};

export const getters = {};

export const mutations = {};

export const actions = {
  // eslint-disable-next-line no-unused-vars
  saveDeviceToken({ commit }, payload) {
    return new Promise((resolve, reject) => {
      saveToken(payload)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  // eslint-disable-next-line no-unused-vars
  sendNotificationSystem({ commit }, payload) {
    return new Promise((resolve, reject) => {
      sendNotification(payload)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  }
};
