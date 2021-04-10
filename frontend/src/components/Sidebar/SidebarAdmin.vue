<template>
  <div>
    <hr class="my-4 md:min-w-full" />

    <h6
      class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
    >
      Admin Panel
    </h6>
    <!-- Navigation -->

    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
      <li class="items-center">
        <router-link
          to="/admin/tables/users"
          v-slot="{ href, route, navigate}"
        >
          <a
            :href="href"
            @click="navigate"
            class="text-xs uppercase py-3 font-bold block"
            :class="[
              isActive
                ? 'text-green-500 hover:text-green-600'
                : 'text-gray-800 hover:text-gray-600',
            ]"
          >
            <i
              class="fas fa-table mr-2 text-sm"
              :class="[isActive ? 'opacity-75' : 'text-gray-400']"
            ></i>
            Users 
          </a>
        </router-link>
      </li>

      <li class="items-center">
        <router-link
          to="/admin/roles"
          v-slot="{ href, route, navigate}"
        >
          <a
            :href="href"
            @click="navigate"
            class="text-xs uppercase py-3 font-bold block"
            :class="[
              isActive
                ? 'text-green-500 hover:text-green-600'
                : 'text-gray-800 hover:text-gray-600',
            ]"
          >
            <i
              class="fas fa-project-diagram mr-2 text-sm"
              :class="[isActive ? 'opacity-75' : 'text-gray-400']"
            ></i>
          Roles
          </a>
        </router-link>
      </li>

      <li class="items-center">
        <router-link
          to="/admin/incidents"
          v-slot="{ href, route, navigate}"
        >
          <a
            :href="href"
            @click="navigate"
            class="text-xs uppercase py-3 font-bold block"
            :class="[
              isActive
                ? 'text-green-500 hover:text-green-600'
                : 'text-gray-800 hover:text-gray-600',
            ]"
          >
            <i
              class="fas fa-exclamation mr-2 text-sm"
              :class="[isActive ? 'opacity-75' : 'text-gray-400']"
            ></i>
            Incidents 
          </a>
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {};
</script>
