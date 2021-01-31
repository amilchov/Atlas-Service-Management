import axios from "../api/api";
import router from "../main";

export default {
  namespaced: true,
  state: {
    user: null,
  },

  getters: {
    user(state) {
      return state.user;
    },
  },

  modules: {},

  mutations: {
    SET_USER(state, user) {
      state.user = user;
    },
  },

  actions: {
    async signUp(_, credetials) {
      axios
        .post("api/register", credetials)
        .then((response) => {
          console.log(response.data);
          // alert("Successful registration with your data!");
          if (confirm("Successful registration with your data! \nSend to login form?")) {
            router.push('/admin');
          }
        })
        .catch((error) => {
          alert(error.response.data.errors.email.toString());
          console.log(error.response.data.errors);
        });
    },

    async signIn({ dispatch }, credentials) {
      let response = await axios.post("api/login", credentials);

      dispatch("attempt", response.data);
    },

    async attempt({ commit }, user) {
      console.log(user.token);
      commit("SET_USER", user);
    },
  },
};
