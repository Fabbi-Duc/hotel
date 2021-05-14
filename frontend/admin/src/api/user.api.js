import request from "@/utils/request";

export const listUsers = params => {
  return request({
    url: "/users/list",
    method: "get",
    params
  });
};

export const bookRoom = params => {
  return request({
    url: "/qr-code",
    method: "get",
    params
  });
};

export const deleteUser = id => {
  return request({
    url: "/user/" + id,
    method: "delete",
  });
};

export const createUser = params => {
  return request({
    url: "/user/create",
    method: "post",
    params
  });
};

export const updateUser = params => {
  return request({
    url: "/user/update",
    method: "post",
    params
  });
};

export const getInfoUser = id => {
  return request({
    url: "/user/detail/" + id,
    method: "get",
  });
};
