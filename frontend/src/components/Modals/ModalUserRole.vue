<template>
  <div>
    <modal
      name="user_role"
      :adaptive="true"
      :maxHeight="auto"
      :scrollable="true"
    >
      <div class="text-center mt-4">
        <h6 class="text-gray-600 text-xl  font-bold">
          Role
        </h6>
      </div>
      <div style="margin:20px">
        <FormulateForm @submit="addRoles">
          <div class="flex flex-wrap">
            <div class="w-full xl:w-12/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="select"
                name="roles"
                :options="this.name"
                label="Role name"
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
                name="Add Role"
              />
            </div>
          </div>
        </FormulateForm>
      </div>
    </modal>
  </div>
</template>
<script>
export default {
  name: "ModalRole",
  data() {
    return {
      name: [],
      description: "",
      dataRoles: null,
    };
  },

  methods: {
      addRoles(data) {
        console.log(data)
      }
  },

  mounted() {
    this.$store.dispatch("rolesTable/getAllRoles").then(() => {
      this.dataRoles = this.$store.state.rolesTable.rolesData;
      for (var i = 0; i < this.dataRoles.length; i++) {
        this.name.push({
          value: this.dataRoles[i].id,
          label: this.dataRoles[i].name,
        });
      }
    });
  },

  props: {
    data: null,
  },
};
</script>
