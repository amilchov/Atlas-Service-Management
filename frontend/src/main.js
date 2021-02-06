import Vue from "vue";
import Vuex from "vuex";
import VueRouter from "vue-router";
import VueFormulate from "@braid/vue-formulate";
import axios from "axios";
import VueAxios from "vue-axios";

// styles
import "@fortawesome/fontawesome-free/css/all.min.css";
import "@/assets/styles/tailwind.css";
import "@/assets/styles/formulate.css";
import api from "./api/api";

// mouting point for the whole app
import App from "@/App.vue";

//vuex main store
import store from "./store";

// layouts
import Admin from "@/layouts/Admin.vue";
import Auth from "@/layouts/Auth.vue";

// views for Admin layout
import Dashboard from "@/views/admin/Dashboard.vue";
import Settings from "@/views/admin/Settings.vue";
import Tables from "@/views/admin/Tables.vue";
import Maps from "@/views/admin/Maps.vue";
import UsersTable from "@/views/admin/UsersTable.vue";

// views for Auth layout
import Login from "@/views/auth/Login.vue";
import Register from "@/views/auth/Register.vue";

// views without layouts
import Landing from "@/views/Landing.vue";
import Profile from "@/views/Profile.vue";
import Index from "@/views/Index.vue";
// import { component } from "vue/types/umd";

// routes
const routes = [
  {
    path: "/admin",
    redirect: "/admin/dashboard",
    component: Admin,
    children: [
      {
        path: "/admin/dashboard",
        component: Dashboard,
      },
      {
        path: "/admin/settings",
        component: Settings,
      },
      {
        path: "/admin/tables",
        component: Tables,
      },
      {
        path: "/admin/maps",
        component: Maps,
      },
      {
        path: "/admin/tables/users",
        component: UsersTable,
      }
    ],
    beforeEnter: ifAuthenticated
  },
  {
    path: "/auth",
    redirect: "/auth/login",
    component: Auth,
    children: [
      {
        path: "/auth/login",
        component: Login,
      },
      {
        path: "/auth/register",
        component: Register,
      },
    ],
  },
  {
    path: "/",
    component: Landing,
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
    props: true

  },
  {
    path: "/Landing",
    component: Index,
  },
  { path: "*", redirect: "/" },
];

const ifAuthenticated = (to, from, next) => {
  const loggedIn = localStorage.getItem('user');
  if (!loggedIn) {
    next('/auth/login');
  } else {
    next();
  }
}

// app config
Vue.config.productionTip = false;
Vue.prototype.$http = api;
api.defaults.timeout = 10000;

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VueFormulate);
Vue.use(VueAxios, axios);

const router = new VueRouter({
  mode: "history",
  routes,
});

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
