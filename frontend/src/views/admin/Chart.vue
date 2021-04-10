<template>
  <div>
    <div class="flex flex-wrap">
    
      <div class="w-full xl:w-6/12 mb-4 xl:mb-0 px-2">
        <card-chart-image v-bind:image_link="chart.image_link" />
      </div>
      <div class="w-full xl:w-6/12 px-2">
        <card-chart-description
          :name="chart.name"
          :description="chart.description"
        />
      </div>
    </div>
    <div class="flex flex-wrap mt-4">
      <div class="w-full xl:w-12/12 mb-12 xl:mb-0 px-4">
        <!-- <card-line-chart /> -->
        <card-charts :data_link="this.id" :tag="chart.tag" />
      </div>
      <!-- <div class="w-full xl:w-4/12 px-4">
        <card-bar-chart />
      </div> -->
    </div>
  </div>
</template>
<script>
import Chart from "chart.js";
// import InnerImageZoom from "vue-inner-image-zoom";

import ChartService from "@/services/charts.service.js";
// import CardLineChart from "@/components/Cards/CardLineChart.vue";
import CardBarChart from "@/components/Cards/CardBarChart.vue";
import CardChartImage from "@/components/Cards/CardChartImage.vue";
// import CardSocialTraffic from "@/components/Cards/CardSocialTraffic.vue";
import CardChartDescription from "@/components/Cards/Charts/CardChartDescription.vue";
import CardCharts from "@/components/Cards/Charts/CardCharts.vue";

export default {
  props: {
    chart: null,
    id: null
  },
  components: {
    // "inner-image-zoom": InnerImageZoom,
    // CardLineChart,
    // CardBarChart,
    CardChartImage,
    // CardSocialTraffic,
    CardChartDescription,
    CardCharts,
  },

  watch: {
    "$route.params.id": {
      handler: function(id) {
        ChartService.getChart(id).then((response) => {
          this.chart = response;
          this.id = id
          localStorage.setItem('value_type', response.value_type);
          console.log(response.value_type);

        });
      },
      deep: true,
      immediate: true,
    },
  },


};
</script>
