import api from "../auth/api";

export default {
  namespaced: true,
  state: {
    user: null,
  },
  
  modules: {},

  mutations: {
    SET_USER (state, user) {
      state.user = user
    }
  },

  actions: {
    async signIn({ dispatch }, credentials) {
      let response = await api.post("api/login", credentials);
    
      dispatch('attempt', response.data);
    },

    async attempt({ commit }, user) {
      console.log(user.token);
      commit('SET_USER', user);
    }
  },
};
