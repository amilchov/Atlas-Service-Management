<template>
  <div>
    <v-dialog />

    <div class="flex flex-wrap">
      <div class="w-full xl:w-4/12 py-4 mb-4 xl:mb-0 ">
        <card-stats
          statSubtitle="MINIMUM"
          :statTitle="this.minimum"
          statArrow="up"
          statPercent="3.48"
          statPercentColor="text-green-500"
          statDescripiron="Shows the minimum value"
          statIconName="fas fa-arrow-down"
          statIconColor="bg-red-500"
        />
      </div>
      <div class="w-full xl:w-4/12 py-4 mb-4 xl:mb-0 px-4">
        <card-stats
          statSubtitle="AVARAGE"
          :statTitle="this.avarage"
          statArrow="up"
          statPercent="3.48"
          statPercentColor="text-green-500"
          statDescripiron="Shows the average value"
          statIconName="fas fa-minus"
          statIconColor="bg-blue-500"
        />
      </div>
      <div class="w-full xl:w-4/12 py-4 mb-4 xl:mb-0 ">
        <card-stats
          statSubtitle="MAXIMUM"
          :statTitle="this.maximum"
          statArrow="up"
          statPercent="3.48"
          statPercentColor="text-green-500"
          statDescripiron="Shows the maximum value"
          statIconName="fas fa-arrow-up"
          statIconColor="bg-green-500"
        />
      </div>
    </div>
    <div
      class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
    >
      <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
        <div class="flex flex-wrap items-center">
          <div class="relative w-full max-w-full flex-grow flex-1">
            <h6 class="uppercase text-gray-500 mb-1 text-xs font-semibold">
              Overview
            </h6>
            <h2 class="text-black text-xl font-semibold">
              {{ this.name }} - Chart Data
            </h2>
          </div>
        </div>
      </div>
      <div class="p-4 flex-auto">
        <!-- Chart -->
        <div class="relative h-350-px">
          <canvas id="line-chart"></canvas>
        </div>
      </div>
      <!-- <button
        @click="addChartDashboard"
        class="uppercase px-4 py-2 w-full rounded font-bold	 bg-blue-500 text-white text-l hover:bg-blue-700"
      >
        Add to dashboard
      </button> -->
    </div>
    <div
      class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
    >
      <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
        <div class="flex flex-wrap items-center">
          <div class="relative w-full max-w-full flex-grow flex-1">
            <h6 class="uppercase text-gray-500 mb-1 text-xs font-semibold">
              Overview
            </h6>
            <h2 class="text-black text-xl font-semibold">
              {{ this.name }} - Data Table
            </h2>
          </div>
        </div>
      </div>
      <div class="p-4 flex-auto">
        <!-- Chart -->
        <div class="relative">
          <vue-good-table
            :columns="columns"
            :rows="data_table"
            :search-options="{
              enabled: true,
            }"
            :pagination-options="{
              enabled: true,
            }"
          >
            <div slot="table-actions">
              <download-csv
                class="bg-blue-600 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1"
                :data="data_table"
                type="button"
                name="data_table.csv"
              >
                <i class="fas fa-download"></i>
                Download CSV
              </download-csv>

              <!-- <button class="" type="button" style="transition: all .15s ease">
                <download-csv :data="data_table" />
              </button></div -->
            </div>
            ></vue-good-table
          >
        </div>
      </div>
      <!-- <button
      @click="addTableDashboard"
        class="uppercase px-4 py-2 w-full rounded font-bold bg-blue-500 text-white text-l hover:bg-blue-700"
      >
        Add to dashboard
      </button> -->
    </div>
  </div>
</template>

<script>
import Chart from "chart.js";
import CardStats from "@/components/Cards/CardStats.vue";

export default {
  data() {
    return {
      xAxis: [],
      yAxis: [],
      json_chart: JSON.parse(localStorage.getItem("json_chart")),
      position: localStorage.getItem("position"),
      data_chart: [],
      data_table: [],
      name: String,
      minimum: String,
      maximum: String,
      avarage: String,

      columns: [
        {
          label: "Date",
          field: "date",
        },
        {
          label: "Value",
          field: "value",
          type: "number",
        },
      ],
      rows: this.data_table,
    };
  },

  components: {
    CardStats,
  },

  computed: {},

  mounted() {
    var length = this.json_chart[0].buckets[this.position].time.buckets.length;

    this.name = this.json_chart[0].buckets[this.position].key;

    for (var i = 0; i < length; i++) {
      this.data_chart.push(
        this.json_chart[0].buckets[this.position].time.buckets[i]
      );
      this.xAxis.push(
        new Date(
          this.json_chart[0].buckets[this.position].time.buckets[i].key
        ).toLocaleString("en-GB")
      );
      this.yAxis.push(
        Math.round(parseInt(this.json_chart[0].buckets[this.position].time.buckets[i][localStorage.getItem("value_type")].value))
      );
    }

    this.setChartData(this.xAxis, this.yAxis);
    this.setTableData(this.xAxis, this.yAxis);

    this.minimum = Math.min.apply(Math, this.yAxis);
    this.maximum = Math.max.apply(Math, this.yAxis);
    this.avarage = this.yAxis
      .reduce((a, v, i) => (a * i + v) / (i + 1))
      .toFixed();
    // console.log(this.data_chart)
  },

  methods: {
    addChartDashboard() {
      localStorage.setItem("dashChartX", JSON.stringify(this.xAxis));
      localStorage.setItem("dashChartName", this.name);

      // console.log(this.xAxis);
      console.log(JSON.parse(localStorage.getItem("dashChartX")));
      localStorage.setItem("dashChartY", JSON.stringify(this.yAxis));
      console.log(this.yAxis);
      this.$modal.show("dialog", {
        title: "✅ Success ✅",
        text: "Successfully add the chart to the dashboard",
        buttons: [
          {
            title: "Cancel",
            handler: () => {
              this.$modal.hide("dialog");
            },
          },
        ],
      });
    },

    addTableDashboard() {
      localStorage.setItem("dashTableX", this.xAxis);
      localStorage.setItem("dashTableY", this.yAxis);
      this.$modal.show("dialog", {
        title: "✅ Success ✅",
        text: "Successfully add the table to the dashboard",
        buttons: [
          {
            title: "Cancel",
            handler: () => {
              this.$modal.hide("dialog");
            },
          },
        ],
      });
    },

    setTableData(dataDate, dataValue) {
      for (var i = 0; i < dataDate.length; i++) {
        this.data_table.push({ date: dataDate[i], value: dataValue[i] });
      }
    },

    setChartData(labels, data) {
      this.$nextTick(function() {
        var config = {
          type: "bar",
          data: {
            labels: labels,
            datasets: [
              {
                label: this.name,
                fill: false,
                backgroundColor:
                  "#" + (((1 << 24) * Math.random()) | 0).toString(16),
                borderColor: "black",
                data: data,
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
        var ctx = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(ctx, config);
      });
    },
  },
};
</script>
