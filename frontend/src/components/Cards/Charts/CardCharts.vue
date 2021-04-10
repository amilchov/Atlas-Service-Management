<template>
  <div>
    <div>
      <div class="flex flex-wrap">
        <div class="w-full xl:w-4/12 p-2" v-for="n in name.length" :key="n">
          <card-chart-name :name="name[--n]" :position="n" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Chart from "chart.js";
import ChartService from "@/services/charts.service.js";
import CardChartName from "./CardChartName.vue";

export default {
  data() {
    return {
      isLoading: true,
      name: [],
      key: [],
      position: 0,
    };
  },

  components: {
    CardChartName,
  },

  props: {
    data_link: null,
    tag: null,
    response: null,
  },

  watch: {
    data_link: {
      handler: function(newVal, oldVal) {
        this.$loading(true);

        this.isLoading = false;
        ChartService.getChartDataApi(newVal).then((response) => {
          this.nameChart(response);
          this.$loading(false);
        });
        if (newVal) {
          this.name = [];
          this.key = [];
        }
      },
      deep: true,
      immediate: true,
    },
  },

  methods: {
    tagResponse(tag, response) {
      if (tag == "resourcesreporting") {
        return response.resourcesreporting;
      } else if (tag == "adcactivity") {
        return response.adcactivity;
      } else if (tag == "processingtype") {
        return response.processingtype;
      } else if (tag == "actualcorecount") {
        return response.actualcorecount;
      } else if (tag == "dst_cloud") {
        return response.dst_cloud;
      } else if (tag == "dst_official_site") {
        return response.dst_official_site;
      } else if (tag == "jobstatus") {
        return response.jobstatus;
      }
    },

    nameChart(response) {
      var bucket = this.tagResponse(this.tag, response).buckets.length;

      this.name = [];
      this.response = response;

      for (var i = 0; i < bucket; i++) {
        this.name.push(
          this.tagResponse(this.tag, response).buckets[i].key.toString()
        );
      }
      console.log("data list name: " + this.name);
      this.key.push(this.tagResponse(this.tag, this.response));
      localStorage.setItem("json_chart", JSON.stringify(this.key));
      this.createChart(this.name);
      console.log(this.key);
      this.isLoading = false;
    },

    createChart(labels) {
      this.$nextTick(function() {
        var config = {
          type: "line",
          data: {
            labels: labels,
            datasets: [
              {
                label: new Date().getFullYear(),
                backgroundColor: "#4c51bf",
                borderColor: "#4c51bf",
                data: [65, 78, 66, 44, 56, 67, 75],
                fill: false,
              },
              {
                label: new Date().getFullYear() - 1,
                fill: false,
                backgroundColor: "#000",
                borderColor: "blue",
                data: [40, 68, 86, 74, 56, 60, 87],
              },
            ],
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            title: {
              display: false,
              text: "Sales Charts",
              fontColor: "black",
            },
            legend: {
              labels: {
                fontColor: "black",
              },
              align: "end",
              position: "bottom",
            },
            tooltips: {
              mode: "index",
              intersect: false,
            },
            hover: {
              mode: "nearest",
              intersect: true,
            },
            scales: {
              xAxes: [
                {
                  ticks: {
                    fontColor: "rgba(0,0,0,.7)",
                  },
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Month",
                    fontColor: "white",
                  },
                  gridLines: {
                    display: false,
                    borderDash: [2],
                    borderDashOffset: [2],
                    color: "rgba(33, 37, 41, 0.3)",
                    zeroLineColor: "rgba(0, 0, 0, 0)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2],
                  },
                },
              ],
              yAxes: [
                {
                  ticks: {
                    fontColor: "rgba(0,0,0,.7)",
                  },
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Value",
                    fontColor: "white",
                  },
                  gridLines: {
                    borderDash: [3],
                    borderDashOffset: [3],
                    drawBorder: false,
                    color: "rgba(0, 0, 0, 0.15)",
                    zeroLineColor: "rgba(33, 37, 41, 0)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2],
                  },
                },
              ],
            },
          },
        };
        var ctx = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(ctx, config);
      });
    },
  },
};
</script>
