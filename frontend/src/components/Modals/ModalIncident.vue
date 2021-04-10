<template>
  <div>
    <modal
      name="demo-login"
      :adaptive="true"
      :minHeight="650"
      :maxHeight="auto"
      :scrollable="true"
    >
      <div class="text-center mt-4">
        <h6 class="text-gray-600 text-xl  font-bold">
          Incident - {{ this.data.number }}
        </h6>
      </div>
      <div style="margin:20px">
        <FormulateForm @submit="updateIncident">
          <div class="flex flex-wrap">
            <div class="w-full xl:w-6/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="select"
                name="caller_id"
                :placeholder="this.data.caller"
                label="Caller"
                :options="caller_select"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-6/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="select"
                name="executor_id"
                label="Executor"
                :placeholder="this.data.executor"
                :options="caller_select"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>

            <div class="w-full xl:w-6/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="select"
                name="category_id"
                label="Category Name"
                :options="category_select"
                :placeholder="this.data.category_name"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-6/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="select"
                name="state"
                label="State"
                :placeholder="this.data.state"
                :options="{
                  New: 'New',
                  'In Progress': 'In Progress',
                  'On Hold': 'On Hold',
                  Resolved: 'Resolved',
                  Closed: 'Closed',
                  Canceled: 'Canceled',
                  'Awaiting User Info': 'Awaiting User Info',
                }"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-4/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="select"
                name="impact"
                :placeholder="this.data.impact"
                label="Impact"
                @change="onChangeImpact($event)"
                :options="{
                  '1 - High': '1 - High',
                  '2 - Medium': '2 - Medium',
                  '3 - Low': '3 - Low',
                }"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-4/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="select"
                name="urgency"
                :placeholder="this.data.urgency"
                label="Urgency"
                @change="onChangeUrgency($event)"
                :options="{
                  '1 - High': '1 - High',
                  '2 - Medium': '2 - Medium',
                  '3 - Low': '3 - Low',
                }"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-4/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="text"
                name="priority"
                label="Priority"
                readonly="true"
                :value="this.data.priority"
                outer-class="mb-4"
                input-class="border border-gray-400 bg-gray-300 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-12/12 mb-12 xl:mb-0 px-2">
              <FormulateInput
                type="text"
                name="short_description"
                label="Short Description"
                :value="this.data.short_description"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-12/12 mb-12 xl:mb-0 px-2">
              <FormulateInput
                type="text"
                :value="this.data.description"
                name="description"
                label="Description"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-12/12 xl:mb-0 px-2">
              <FormulateInput
                input-class="px-4 py-2 w-full rounded bg-blue-500 text-white hover:bg-blue-700"
                type="submit"
                name="Update"
              />
            </div>
          </div>
        </FormulateForm>
      </div>
    </modal>
  </div>
</template>
<script>
import IncidentsService from "@/services/incidents.service";
import ChartsService from "@/services/charts.service";

export default {
  name: "ModalIncident",
  data() {
    return {
      dataUser: null,
      dataCharts: null,
      caller_select: [],
      category_select: [],
      impact: "1 - High",
      urgency: "1 - High",
      priority: "1 - Critical",
    };
  },

  props: {
    data: null,
  },

  mounted() {
    ChartsService.getCharts().then((response) => {
      this.dataCharts = response;
      for (var i = 0; i < this.dataCharts.length; i++) {
        this.category_select.push({
          value: this.dataCharts[i].id,
          label: this.dataCharts[i].name,
        });
      }

      console.log(response);
    });

    this.$store.dispatch("userTable/getAllUsers").then(() => {
      this.dataUser = this.$store.state.userTable.usersData;
      for (var i = 0; i < this.dataUser.length; i++) {
        this.caller_select.push({
          value: this.dataUser[i].id,
          label: this.dataUser[i].first_name + " " + this.dataUser[i].last_name,
        });
      }
    });
  },

  methods: {
    updateIncident(data) {
      IncidentsService.updateIncident(this.data.token_executor, this.data.id, data).then(() => {
        location.reload();
        console.log(data);
      });
    },

    onChangeImpact: function(event) {
      this.impact = event.target.value;
      // this.data.impact = event.target.value;
      if (this.impact == "1 - High" && this.urgency == "1 - High")
        this.priority = "1 - Critical";
      else if (this.impact == "1 - High" && this.urgency == "2 - Medium")
        this.priority = "2 - High";
      else if (this.impact == "1 - High" && this.urgency == "3 - Low")
        this.priority = "3 - Moderate";
      else if (this.impact == "2 - Medium" && this.urgency == "1 - High")
        this.priority = "2 - High";
      else if (this.impact == "2 - Medium" && this.urgency == "2 - Medium")
        this.priority = "3 - Moderate";
      else if (this.impact == "2 - Medium" && this.urgency == "3 - Low")
        this.priority = "4 - Low";
      else if (this.impact == "3 - Low" && this.urgency == "1 - High")
        this.priority = "3 - Moderate";
      else if (this.impact == "3 - Low" && this.urgency == "2 - Medium")
        this.priority = "4 - Low";
      else if (this.impact == "3 - Low" && this.urgency == "3 - Low")
        this.priority = "5 - Planning";
    },

    onChangeUrgency: function(event) {
      this.urgency = event.target.value;
      if (this.impact == "1 - High" && this.urgency == "1 - High")
        this.priority = "1 - Critical";
      else if (this.impact == "1 - High" && this.urgency == "2 - Medium")
        this.priority = "2 - High";
      else if (this.impact == "1 - High" && this.urgency == "3 - Low")
        this.priority = "3 - Moderate";
      else if (this.impact == "2 - Medium" && this.urgency == "1 - High")
        this.priority = "2 - High";
      else if (this.impact == "2 - Medium" && this.urgency == "2 - Medium")
        this.priority = "3 - Moderate";
      else if (this.impact == "2 - Medium" && this.urgency == "3 - Low")
        this.priority = "4 - Low";
      else if (this.impact == "3 - Low" && this.urgency == "1 - High")
        this.priority = "3 - Moderate";
      else if (this.impact == "3 - Low" && this.urgency == "2 - Medium")
        this.priority = "4 - Low";
      else if (this.impact == "3 - Low" && this.urgency == "3 - Low")
        this.priority = "5 - Planning";
    },
  },
};
</script>
