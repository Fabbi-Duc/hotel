import request from "@/utils/request";

export const listCustomers = params => {
  return request({
    url: "/customer/list",
    method: "get",
    params
  });
};
