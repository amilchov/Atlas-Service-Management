<template>
  <div>
    <modal
      name="user"
      :adaptive="true"
      :minHeight="700"
      :maxHeight="auto"
      :scrollable="true"
    >
      <modal-user-role :data="this.data" />
      <div class="text-center mt-4">
        <h6 class="text-gray-600 text-xl  font-bold">
          User
        </h6>
      </div>
      <div style="margin:20px">
        <FormulateForm @submit="submit">
          <div class="flex flex-wrap">
            <div class="w-full xl:w-4/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="text"
                name="first_name"
                :value="this.data.first_name"
                tooltip="EIN is an employee identification number"
                label="First Name"
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
                name="middle_name"
                :value="this.data.middle_name"
                tooltip="EIN is an employee identification number"
                label="Middle Name"
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
                name="last_name"
                :value="this.data.last_name"
                tooltip="EIN is an employee identification number"
                label="Last Name"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-4/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="email"
                name="email"
                label="Email"
                :value="this.data.email"
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
                name="city"
                label="City"
                :value="this.data.city"
                outer-class="mb-4"
                :placeholder="Description"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-4/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="text"
                name="country"
                label="Country"
                :value="this.data.country"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div class="w-full xl:w-12/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="text"
                name="description"
                label="Description"
                :value="this.data.description"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
            <div
              v-if="this.currentUser.token != this.data.token"
              class="w-full xl:w-6/12 xl:mb-0 px-2"
            >
              <FormulateInput
                input-class="px-4 py-2 w-full rounded bg-blue-500 text-white hover:bg-blue-700"
                type="submit"
                name="Update"
              />
            </div>
            <div
              v-if="this.currentUser.token == this.data.token"
              class="w-full xl:w-12/12 xl:mb-0 px-2"
            >
              <FormulateInput
                input-class="px-4 py-2 w-full rounded bg-blue-500 text-white hover:bg-blue-700"
                type="submit"
                name="Update"
              />
            </div>
            <div
              v-if="this.currentUser.token != this.data.token"
              class="w-full xl:w-6/12 xl:mb-0 px-2"
            >
              <button
                @click="deleteUser"
                class="px-4 py-2 w-full rounded bg-blue-500 text-white hover:bg-blue-700"
              >
                Delete
              </button>
            </div>
          </div>
        </FormulateForm>
        <div class="flex-auto mt-6">
          <!-- Chart -->
          <hr />

          <div class="relative mt-6">
            <vue-good-table
              :columns="columns"
              :lineNumbers="true"
              :rows="this.data.roles"
              :search-options="{
                enabled: true,
              }"
            >
              <div slot="table-actions">
                <button
                  @click="showModalAddRole"
                  class="bg-blue-600 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1"
                >
                  <!-- <i class="fas fa-plus"></i> -->
                  Add Role
                </button>

                <!-- <button class="" type="button" style="transition: all .15s ease">
                <download-csv :data="data_table" />
              </button></div -->
              </div>

              <!-- <div slot="table-actions-bottom">
              <button
                @click="showModal"
                class="uppercase bg-blue-500 hover:bg-blue-700 text-white w-full font-bold py-2 px-4 rounded"
              >
                Create new Incident
              </button>
            </div> -->

              <!-- <span v-else> {{ props.formattedRow[props.column.field] }} </span> -->
            </vue-good-table>
          </div>
        </div>
      </div>
    </modal>
  </div>
</template>
<script>
import ModalUserRole from "@/components/Modals/ModalUserRole.vue";
import UsersTableService from "@/services/user_table.service";

export default {
  name: "ModalUser",
  data() {
    return {
      dataRoles: null,
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
      // rows: this.dataRoles,
      rows: this.dataRoles,
    };
  },

  components: {
    ModalUserRole,
  },

  computed: {
    currentUser() {
      return this.$store.state.auth.user;
    },
  },

  mounted() {
    console.log(this.currentUser.roles[0].name);
    if (!this.currentUser) {
      this.$router.push("/login");
    }
  },

  methods: {
    showModalAddRole() {
      this.$modal.show("user_role");
    },

    submit(data) {
      if (confirm("Are you sure you want to change the data?")) {
        if (data.email == this.data.email) delete data["email"];
        UsersTableService.updateUser(this.data.id, data).then(() => {
          location.reload();
        });
      }
    },

    deleteUser() {
      if (confirm("Are you sure you want to delete the data?")) {
        UsersTableService.deleteUser(this.data.id).then(() => {
          location.reload();
        });
      }
    },
  },

  props: {
    data: null,
  },
};
</script>
