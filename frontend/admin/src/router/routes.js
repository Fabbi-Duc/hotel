function page(path) {
  return () => import(`@/pages/${path}`).then(m => m.default || m);
}

function view(path) {
  return () => import(`@/views/${path}`).then(m => m.default || m);
}

function container(path) {
  return () => import(`@/containers/${path}`).then(m => m.default || m);
}
const routes = [
  {
    path: "/sign-in",
    name: "SignIn",
    meta: {
      layout: "GuestLayout",
      requiredAuth: false
    },
    component: page("Login")
  },
  {
    path: "/auth/google",
    name: "Login Social",
    meta: {
      layout: "SocialLayout",
      requiredAuth: false
    },
    component: page("LoginSocial")
  },
  {
    path: "/sign-up",
    name: "SignUp",
    meta: {
      layout: "GuestLayout",
      requiredAuth: false
    },
    component: page("Login")
  },
  {
    path: "/",
    redirect: "/dashboard",
    name: "Home",
    meta: {
      layout: "MainLayout",
      requiredAuth: true
    },
    component: container("TheContainer"),
    children: [
      {
        path: "dashboard",
        name: "Dashboard",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("Dashboard")
      },
      {
        path: "users",
        name: "Users",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("userList/UsersList")
      },
      {
        path: "rooms/list",
        name: "RoomList",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("room/roomList")
      },
      {
        path: "rooms/:id/update",
        name: "RoomUpdate",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("room/roomEditAdd")
      },
      {
        path: "rooms/create",
        name: "RoomCreate",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("room/roomEditAdd")
      },
      {
        path: "customers/list",
        name: "CustomersList",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("customers/customerList")
      },
      {
        path: "rooms",
        name: "Room",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("userList/room")
      },
      {
        path: "room/book/:id",
        name: "BookRoom",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("userList/BookRoom")
      },
      {
        path: "messages",
        name: "Messages",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("messages/Messages")
      },
      {
        path: "messages/:id",
        name: "Message",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("messages/Message")
      }
    ]
  },
  {
    path: "/customer",
    name: "Customer",
    meta: {
      layout: "CustomerLayout",
      requiredAuth: false
    },
    component: container("TheContainer"),
  },
];

export default routes;
