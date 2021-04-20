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
        route: "/users",
        icon: "cil-puzzle",
        items: [
          {
            name: "Users List",
            to: "/users"
          }
        ]
      }
    ]
  }
];
