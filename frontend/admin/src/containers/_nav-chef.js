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
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "ListOrder",
        to: "/list-food-order"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "ListFood",
        to: "/list-food"
      },
    ]
  }
];