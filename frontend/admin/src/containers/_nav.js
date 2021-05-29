export default [
  {
    _name: "CSidebarNav",
    _children: [
      {
        _name: "CSidebarNavItem",
        name: "Dashboard",
        to: "/dashboard",
        icon: "cil-speedometer",
        badge: {
          color: "primary",
          text: "NEW"
        }
      },
      // {
      //   _name: "CSidebarNavDropdown",
      //   name: "Hộp thư",
      //   route: "/messages",
      //   icon: "cil-puzzle",
      //   items: [
      //     {
      //       name: "Tin nhắn",
      //       to: "/messages"
      //     },
      //     {
      //       name: "Phòng chat",
      //       to: "/base/breadcrumbs"
      //     }
      //   ]
      // },
      {
        _name: "CSidebarNavDropdown",
        name: "User",
        icon: "cil-puzzle",
        items: [
          {
            name: "Users List",
            to: "/users"
          },
          {
            name: "Users Create",
            to: "user/create"
          }
        ]
      },
      {
        _name: "CSidebarNavDropdown",
        name: "Room",
        route: "/rooms",
        icon: "cil-puzzle",
        items: [
          {
            name: "Rooms List",
            to: "/rooms/list"
          },
          {
            name: "Room Create",
            to: "/rooms/create"
          }
        ]
      },
      {
        _name: "CSidebarNavDropdown",
        name: "Customer",
        route: "/customers",
        icon: "cil-puzzle",
        items: [
          {
            name: "Customers List",
            to: "/customers/list"
          },
          // {
          //   name: "Customer Create",
          //   to: "/customers/create"
          // }
        ]
      }
    ]
  }
];
