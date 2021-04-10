<template>
  <div>
    <modal-role :data="this.data_row" />
    <!-- <modal-incident-create /> -->
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
              Roles - Data Table
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
            :rows="dataRoles"
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
                :data="dataRoles"
                type="button"
                name="data_roles_table.csv"
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
// import ModalIncident from "@/components/Modals/ModalIncident.vue";
import ModalRole from "@/components/Modals/ModalRole.vue";

export default {
  data() {
    return {
      dataRoles: null,
      data_row: null,
      columns: [
        {
          label: "Name",
          field: "name",
          filterable: true,
        },
        {
          label: "Description",
          field: "description",
          filterable: true,
        },
      ],
      rows: this.dataRoles,
    };
  },
  components: {
    // TableDropdown,
    // RolesDropdown,
    // ModalIncident,
    // ModalIncidentCreate,
    ModalRole,
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
      this.$modal.show("roles");
    },
  },

  mounted() {
    this.$store.dispatch("rolesTable/getAllRoles").then(() => {
      this.dataRoles = this.$store.state.rolesTable.rolesData;
      console.log(this.dataRoles);
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
