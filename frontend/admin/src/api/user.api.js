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
