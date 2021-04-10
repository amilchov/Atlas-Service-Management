<template>
  <div
    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16"
  >
    <div class="px-6">
      <div class="flex flex-wrap justify-center">
        <div class="w-full px-4 flex justify-center">
          <div class="relative">
            <img
              alt="..."
              :src="currentUser.avatar"
              class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
            />
          </div>
        </div>
        <div class="w-full px-4 text-center mt-20">
          <div class="flex justify-center py-4 lg:pt-4 pt-8">
            <div class="mr-4 p-3 text-center">
              <span
                class="text-xl font-bold block uppercase tracking-wide text-gray-700"
              >
                {{ currentUser.roles.length }}
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
          </div>
        </div>
      </div>
      <div class="text-center mt-12">
        <h3
          class="text-xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
        >
          {{ currentUser.first_name }} {{ currentUser.last_name }}
        </h3>
        <div
          class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
        >
          <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"></i>
          City:
          {{ currentUser.city == null ? "No current city" : currentUser.city }}
        </div>
        <div
          class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
        >
          <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"></i>
          Country:
          {{
            currentUser.country == null
              ? "No current country"
              : currentUser.country
          }}
        </div>
        <div
          class="mb-2 text-gray-700 mt-10"
          v-for="role in currentUser.roles"
          :key="role.name"
        >
          <i class="fas fa-user-tag mr-2 text-lg text-gray-500"></i>
          Roles: {{ role.name }}
        </div>
      </div>
      <div class="mt-10 py-10 border-t border-gray-300 text-center">
        <div class="flex flex-wrap justify-center">
          <div class="w-full lg:w-9/12 px-4">
            <p class="mb-4 text-lg leading-relaxed text-gray-800">
              {{
                currentUser.description == null
                  ? "The user has no description!"
                  : "Description: " + currentUser.description
              }}
            </p>
            <!-- <a href="javascript:void(0);" class="font-normal text-green-500">
              Show more
            </a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    currentUser() {
      return this.$store.state.auth.user;
    },
  },

  mounted() {
    console.log(this.currentUser);
    if (!this.currentUser) {
      this.$router.push("/login");
    }
  },
};
</script>
