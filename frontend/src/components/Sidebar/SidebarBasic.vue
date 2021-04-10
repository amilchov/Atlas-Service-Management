<template>
  <div>
    <hr class="my-4 md:min-w-full" />

    <h6
      class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
    >
      Basic Pages
    </h6>

    <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
      <li class="items-center">
        <router-link
          class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
          to="/"
        >
          <i class="fas fa-home text-gray-400 mr-2 text-sm"></i>
          Home
        </router-link>
      </li>

      <li class="items-center">
        <router-link
          class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
          to="/admin"
        >
          <i class="fas fa-columns text-gray-400 mr-2 text-sm"></i>
          Dashboard
        </router-link>
      </li>
      
      <li class="items-center">
        <router-link
          class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
          to="/admin/settings"
        >
          <i class="fas fa-users text-gray-400 mr-2 text-sm"></i>
          Teams
        </router-link>
      </li>

      <li class="items-center">
        <router-link
          class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
          to="/admin/incident"
        >
          <i class="fas fa-boxes text-gray-400 mr-2 text-sm"></i>
          My Incidents
        </router-link>
      </li>
    <!--
      <li class="items-center">
        <router-link
          class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
          to="/profile"
        >
          <i class="fas fa-user text-gray-400 mr-2 text-sm"></i>
          Profile
        </router-link>
      </li> -->

      <!-- <li class="items-center">
        <router-link
          class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
          to="/auth/settings"
        >
          <i class="fas fa-cogs text-gray-400 mr-2 text-sm"></i>
          Settings
        </router-link>
      </li> -->
    </ul>
  </div>
</template>

<script>
export default {};
</script>
