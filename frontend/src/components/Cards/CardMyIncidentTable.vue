<template>
  <div>
    <modal-incident :data="this.data_row" :stateArray="this.stateArray" />
    <modal-incident-create />
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
              Incidents - Data Table
            </h2>
          </div>
        </div>
      </div>
      <div class="p-4 flex-auto">
        <!-- Chart -->
        <div class="relative">
          <vue-good-table
            :columns="columns"
            :lineNumbers="true"
            :rows="data_incident_table"
            @on-row-click="onRowClick"
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
                :data="data_incident_table"
                type="button"
                name="data_incident_table.csv"
              >
                <i class="fas fa-download"></i>
                Download CSV
              </download-csv>

              <!-- <button class="" type="button" style="transition: all .15s ease">
                <download-csv :data="data_table" />
              </button></div -->
            </div>
            <!-- <span v-else> {{ props.formattedRow[props.column.field] }} </span> -->
          </vue-good-table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
// import TableDropdown from "@/components/Dropdowns/TableDropdown.vue";
// import RolesDropdown from "../Dropdowns/RolesDropdown.vue";
// import CardProfile from "@/components/Cards/CardProfile.vue";
import ModalIncident from "@/components/Modals/ModalIncident.vue";
import ModalIncidentCreate from "@/components/Modals/ModalIncidentCreate.vue";

export default {
  data() {
    return {
      dataIncidents: null,
      dataUser: null,
      data_incident_table: [],
      data_row: null,
      stateArray: [
        { value: "New", label: "New" },
        { value: "In Progress", label: "In Progress" },
        { value: "On Hold", label: "On Hold" },
        { value: "Resolved", label: "Resolved" },
        { value: "Closed", label: "Closed" },
        { value: "Canceled", label: "Canceled" },
        { value: "Awaiting User Info", label: "Awaiting User Info" },
      ],
      columns: [
        {
          label: "Number",
          field: "number",
          filterable: true,
        },
        {
          label: "Category Name",
          field: "category_name",
          filterable: true,
        },
        {
          label: "Short Description",
          field: "short_description",
          filterable: true,
        },
        {
          label: "Description",
          field: "description",
          filterable: true,
        },
        {
          label: "Caller",
          field: "caller",
          filterable: true,
        },
        {
          label: "Executor",
          field: "executor",
          filterable: true,
        },
        {
          label: "State",
          field: "state",
          filterable: true,
        },
        {
          label: "Impact",
          field: "impact",
          filterable: true,
        },
        {
          label: "Urgency",
          field: "urgency",
          filterable: true,
        },
        {
          label: "Priority",
          field: "priority",
          filterable: true,
        },
      ],
      
    };
  },
  components: {
    // TableDropdown,
    // RolesDropdown,
    ModalIncident,
    ModalIncidentCreate,
  },

  methods: {
    onRowClick(params) {
      // params.row - row object
      // params.pageIndex - index of this row on the current page.
      // params.selected - if selection is enabled this argument
      // indicates selected or not
      // params.event - click event
      // this.$modal.show(ModalIncident);
      this.data_row = params.row;
      console.log(this.data_row);
      this.$modal.show("demo-login");
    },
  },

  computed: {
    currentUser() {
      return this.$store.state.auth.user;
    },
  },

  mounted() {
      console.log(this.currentUser.token);
    this.$store.dispatch("incidentTable/getMyIncidents", this.currentUser.token).then(() => {
      this.dataIncidents = this.$store.state.incidentTable.myIncidents;
      console.log("data my inc: " + this.dataIncidents);
      for (var i = 0; i < this.dataIncidents.length; i++) {
        this.data_incident_table.push({
          number: "INC" + this.dataIncidents[i].number,
          category_name: this.dataIncidents[i].category_id[0].name,
          short_description: this.dataIncidents[i].short_description,
          description: this.dataIncidents[i].description,
          caller:
            this.dataIncidents[i].caller[0].first_name +
            " " +
            this.dataIncidents[i].caller[0].last_name,
          executor:
            this.dataIncidents[i].executor[0].first_name +
            " " +
            this.dataIncidents[i].executor[0].last_name,
          state: this.dataIncidents[i].state,
          impact: this.dataIncidents[i].impact,
          urgency: this.dataIncidents[i].urgency,
          priority: this.dataIncidents[i].priority,
          id: this.dataIncidents[i].id,
          token_caller: this.dataIncidents[i].caller[0].token
        });
        // console.log(this.roles);
      }
      console.log(this.dataIncidents);
    });
    
  },

  props: {
    color: {
      default: "light",
      validator: function(value) {
        // The value must match one of these strings
        return ["light", "dark"].indexOf(value) !== -1;
      },
    },
  },
};
</script>
