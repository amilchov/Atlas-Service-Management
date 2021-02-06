<template>
  <div>
    <navbar />
    <main class="profile-page">
      <section class="relative block h-500-px">
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style="
            background-image: url('https://i0.wp.com/www.hisour.com/wp-content/uploads/2019/04/ATLAS-experiment-CERN-Geneva-Switzerland.jpg?fit=960%2C640&ssl=1&resize=1280%2C720');
          "
        >
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-75 bg-black"
          ></span>
        </div>
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
          style="transform: translateZ(0)"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-gray-300 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
      </section>
      <section class="relative py-16 bg-gray-300">
        <div class="container mx-auto px-4">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
          >
            <div class="px-6">
              <div class="flex flex-wrap justify-center">
                <div
                  class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
                >
                  <div class="relative">
                    <img
                      alt="..."
                      :src="currentUser.avatar"
                      class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
                    />
                  </div>
                </div>
                <div
                  class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                >
                  <div class="py-6 px-3 mt-32 sm:mt-0">
                    <button
                      class="bg-blue-500 active:bg-green-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                      type="button"
                    >
                      <router-link to="/"> Settings </router-link>
                    </button>
                  </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 lg:order-1">
                  <div class="flex justify-center py-4 lg:pt-4 pt-8">
                    <div class="mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                      >
                        <!-- {{ roles.length }} -->
                      </span>
                      <span class="text-sm text-gray-500">Roles</span>
                    </div>
                    <div class="mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                      >
                        10
                      </span>
                      <span class="text-sm text-gray-500">Incidents</span>
                    </div>
                    <div class="lg:mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                      >
                        89
                      </span>
                      <span class="text-sm text-gray-500">Groups</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3
                  class="text-4xl font-semibold leading-normal mb-6 text-gray-800"
                >
                  <!-- {{ first_name }} {{ last_name }} -->
                </h3>
                <div class="mb-2 text-gray-700 mt-12">
                  <i class="fas fa-user-tag mr-2 text-lg text-gray-500"></i>
                  {{showRoles}}
                </div>
                <div class="mb-2 text-gray-700">
                  <i
                    class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"
                  ></i>
                  {{ location == null ? "no location" : currentUser.location }}
                </div>
              </div>
              <!-- <border-t border-gray-300 text-center" -->
              <div class="border-t border-gray-300 text-center mt-5 py-5">
                <div class="flex flex-wrap justify-center">
                  <div class="w-full lg:w-9/12 px-4">
                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                      {{
                        currentUser.description == null
                          ? "no description"
                          : currentUser.description
                      }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>
<script>
import Navbar from "@/components/Navbars/AuthNavbar.vue";

export default {
  data() {
    return {
      data: this.first_name,
    };
  },

  components: {
    Navbar,
  },

  computed: {
    currentUser() {
      return this.$store.state.auth.user;
    },

    routerData() {
      return this.$route.params.id;
    },
  },

  mounted() {
    console.log(this.id);
    console.log(this.currentUser);
    if (!this.currentUser) {
      this.$router.push("/login");
    }
  },

  methods: {
    showRoles () {
      this.roles.array.forEach(role => {
        console.log(role)
      });
    }
  },

  props: {
    id: null,
    avatar: null,
    first_name: null,
    last_name: null,
    city: null,
    country: null,
    roles: null,
  },
};
</script>
