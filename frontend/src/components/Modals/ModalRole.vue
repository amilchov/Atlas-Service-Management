<template>
  <div>
    <modal name="roles" :adaptive="true" :maxHeight="auto" :scrollable="true">
      <div class="text-center mt-4">
        <h6 class="text-gray-600 text-xl  font-bold">
          Role
        </h6>
      </div>
      <div style="margin:20px">
        <FormulateForm @submit="submit">
          <div class="flex flex-wrap">
            <div class="w-full xl:w-12/12 mb-4 xl:mb-0 px-2">
              <FormulateInput
                type="text"
                name="name"
                :value="this.data.name"
                tooltip="EIN is an employee identification number"
                label="Name"
                readonly="true"
                outer-class="mb-4"
                input-class="border border-gray-400 bg-gray-300 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
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
                readonly="true"
                input-class="border border-gray-400 bg-gray-300 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
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
    return {};
  },

  props: {
    data: null,
  },
};
</script>
