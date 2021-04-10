<template>
  <div>
    <hr class="my-4 md:min-w-full" />

    <h6
      class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
    >
      Atlas Charts
    </h6>
    <!-- Navigation -->
    <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
      <li class="items-center" v-for="chart in chartsName.length" :key="chart">
        <router-link to="" v-slot="{ href, route, navigate }">
          <router-link
            :to="{ path: '/admin/chart/' + chartsName[chart - 1].id }"
            @click="navigate"
            class="text-xs uppercase py-3 font-bold block"
            :class="[
              isActive
                ? 'text-green-500 hover:text-green-600'
                : 'text-gray-800 hover:text-gray-600',
            ]"
          >
            <i
              class="fas fa-chart-bar mr-2 text-sm"
              :class="[isActive ? 'opacity-75' : 'text-gray-400']"
            ></i>
            {{ chartsName[chart - 1].name }}
            <!-- {{showAlertId()}} -->
          </router-link>
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import ChartService from "@/services/charts.service.js";

export default {
  data() {
    return {
      chartsName: [],
    };
  },

  mounted() {
    ChartService.getCharts().then((response) => {
      for (var i = 0; i < response.length; i++) {
        this.chartsName.push(response[i]);
      }
    });

    console.log(this.chartsName);
  },

  methods: {},

  props: {},
};
</script>
