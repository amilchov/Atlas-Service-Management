<template>
  <nav
    class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg"
  >
    <div
      class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
      <div
        class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
      >
        <router-link
          class="text-white text-xl font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase"
          to="/"
        >
          ATLAS SERVICE MANAGMENT
        </router-link>
        <button
          class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
          type="button"
          v-on:click="setNavbarOpen"
        >
          <i class="text-white fas fa-bars"></i>
        </button>
      </div>
      <div
        class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none"
        :class="[navbarOpen ? 'block rounded shadow-lg' : 'hidden']"
        id="example-navbar-warning"
        v-if="!this.loggedIn"
      >
        <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
          <li class="flex items-center">
            <router-link to="/auth/register">
              <button
                class="bg-blue-500 bg-opacity-0 text-white active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                type="button"
              >
                <i class="fas fa-arrow-alt-circle-down"></i> Sign Up
              </button>
            </router-link>
          </li>

          <li class="flex items-center">
            <router-link to="/auth/login">
              <button
                class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                type="button"
              >
                <i class="fas fa-arrow-alt-circle-down"></i> Sign In
              </button>
            </router-link>
          </li>
        </ul>
      </div>
      <div v-else>
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
          <div class="bg-white m-2 rounded-full h-24 w-24 flex shadow-xl">
          </div>
          <user-dropdown />
        </ul>
      </div>
    </div>
  </nav>
</template>
<script>
import UserDropdown from "@/components/Dropdowns/UserDropdown.vue";

export default {
  components: {
    UserDropdown,
  },

  data() {
    return {
      navbarOpen: false,
    };
  },

  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    },
  },

  methods: {
    setNavbarOpen: function () {
      this.navbarOpen = !this.navbarOpen;
    },
  },
};
</script>
