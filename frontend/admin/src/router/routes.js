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
        path: "room/book",
        name: "BookRoom",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
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
      layout: "CustomersLayout",
      requiredAuth: false
    },
    component: view("Customer"),
  }
];

export default routes;
