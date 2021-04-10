<template>
  <div
      class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
  >
    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full max-w-full flex-grow flex-1">
          <h6 class="uppercase text-gray-500 mb-1 text-xs font-semibold">
            Preview
          </h6>
          <h2 class="text-gray-800 text-xl font-semibold">
          </h2>
        </div>
      </div>
    </div>
    <div>
      <div class="p-4 flex-auto">
        <div class="relative h-350-px">
          <canvas id="bar-chart"></canvas>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Chart from "chart.js";

export default {
  mounted: function () {
    console.log(localStorage.getItem("dashChartX"));
    this.$nextTick(function () {
      var config = {
        type: "bar",
        data: {
          labels: JSON.parse(localStorage.getItem("dashChartX")),
          datasets: [
            {
              label: this.name,
              fill: false,
              backgroundColor:
                  "#" + (((1 << 24) * Math.random()) | 0).toString(16),
              borderColor: "black",
              data: JSON.parse(localStorage.getItem("dashChartY")),
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
                display: false,
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
      var ctx = document.getElementById("bar-chart").getContext("2d");
      window.myLine = new Chart(ctx, config);
    });
  },
};
</script>
