import Vue from "vue";
import Vuex from "vuex";
import VueRouter from "vue-router";
import VueFormulate from "@braid/vue-formulate";
import axios from "axios";
import VueAxios from "vue-axios";
import VueImg from 'v-img';
import JsonCSV from 'vue-json-csv'
import VModal from 'vue-js-modal'
import VueGoodTablePlugin from 'vue-good-table';
import VueLoading from 'vuejs-loading-plugin'

// styles
import "@fortawesome/fontawesome-free/css/all.min.css";
import "@/assets/styles/tailwind.css";
import "@/assets/styles/formulate.css";
import "vue-inner-image-zoom/lib/vue-inner-image-zoom.css";
import "vue-good-table/dist/vue-good-table.css";
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
import Chart from "@/views/admin/Chart.vue";
import DynamicChart from "@/views/admin/DynamicChart.vue";
import Incidents from "@/views/admin/Incidents.vue"
import MyIncident from "@/views/admin/MyIncident.vue"
import Roles from "@/views/admin/Roles.vue"

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
        name: "Dashboard"
      },
      {
        path: "/admin/settings",
        component: Settings,
        name: "Settings"
      },
      {
        path: "/admin/tables",
        component: Tables,
        name: "Tables"
      },
      {
        path: "/admin/maps",
        component: Maps,
        name: "Maps"
      },
      {
        path: "/admin/incidents",
        component: Incidents,
        name: "Incidents"
      },
      {
        path: "/admin/incident",
        component: MyIncident,
        name: "Incidents"
      },
      {
        path: "/admin/roles",
        component: Roles,
        name: "Roles"
      },
      {
        path: "/admin/tables/users",
        component: UsersTable,
        name: "Users Table"
      },
      {
        path: "/admin/chart",
        name: "Charts",
        component: Chart,
        props: true,
      },
      {
        path: "/admin/chart/:id",
        name: "Charts",
        component: Chart,
        props: true,
      },
      {
        path: "/admin/chart/:id/:chart",
        name: "Dynamic Chart",
        component: DynamicChart,
        props: true,
      },
    ],
    beforeEnter: ifAuthenticated,
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
    path: "/profile/",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/Landing",
    component: Index,
  },
  { path: "*", redirect: "/" },
];

const ifAuthenticated = (to, from, next) => {
  const loggedIn = localStorage.getItem("user");
  console.log(loggedIn);
  if (!loggedIn) {
    next("/auth/login");
  } else {
    next();
  }
};

// app config
// Vue.config.productionTip = false;
// api.defaults.timeout = 10000;
axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VueFormulate);
Vue.use(VueAxios, axios);
Vue.use(VueImg);
Vue.use(VueLoading)


Vue.use(require('vue-moment'));
Vue.component('downloadCsv', JsonCSV)
Vue.use(VModal, { dialog: true })
Vue.use(VueGoodTablePlugin)

const router = new VueRouter({
  mode: "history",
  routes,
});

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
