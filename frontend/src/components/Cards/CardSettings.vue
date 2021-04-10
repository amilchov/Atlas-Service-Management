<template>
  <div
    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0"
  >
    <div class="rounded-t bg-white mb-0 px-6 py-6">
      <div class="text-center flex justify-between">
        <h6 class="text-gray-800 text-xl font-bold">My account</h6>
        <button
          class="bg-blue-500 text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
          type="button"
        >
          Update
        </button>
      </div>
    </div>
    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
      <FormulateForm @submit="handleRegister">
        <h6 class="text-gray-500 text-sm mt-3 mb-6 font-bold uppercase">
          User Information
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
              <FormulateInput
                type="text"
                name="first name"
                readonly
                v-model="currentUser.first_name"
                label="First name"
                validation="^required|min:5|max:50|matches:/^[a-zA-Z\s]+$/"
                :validation-messages="{
                  matches:
                    'First name must contain only English letters and must not contain numbers!',
                }"
                input-class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
              <FormulateInput
                type="text"
                name="middle name"
                v-model="currentUser.middle_name"
                label="Middle name"
                readonly
                validation="^required|min:5|max:50|matches:/^[a-zA-Z\s]+$/"
                outer-class="mb-4"
                :validation-messages="{
                  matches:
                    'Middle name must contain only English letters and must not contain numbers!',
                }"
                input-class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
              <FormulateInput
                type="text"
                name="last name"
                readonly
                v-model="currentUser.last_name"
                label="Last name"
                validation="^required|min:5|max:50|matches:/^[a-zA-Z\s]+$/"
                outer-class="mb-4"
                :validation-messages="{
                  matches:
                    'Last name must contain only English letters and must not contain numbers!.',
                }"
                input-class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
          </div>
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <FormulateInput
                type="email"
                name="email"
                readonly
                v-model="currentUser.email"
                label="Email address"
                validation="email"
                outer-class="mb-4"
                input-class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
          </div>
        </div>

        <hr class="mt-6 border-b-1 border-gray-400" />

        <h6 class="text-gray-500 text-sm mt-3 mb-6 font-bold uppercase">
          Contact Information
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <FormulateInput
                type="text"
                name="city"
                v-model="currentUser.city"
                label="City"
                readonly
                validation="max:50|matches:/^[a-zA-Z\s]+$/"
                outer-class="mb-4"
                input-class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <FormulateInput
                type="text"
                name="country"
                readonly
                v-model="currentUser.country"
                label="Country"
                validation="max:50|matches:/^[a-zA-Z\s]+$/"
                outer-class="mb-4"
                input-class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
          </div>
        </div>

        <hr class="mt-6 border-b-1 border-gray-400" />

        <h6 class="text-gray-500 text-sm mt-3 mb-6 font-bold uppercase">
          About Me
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <FormulateInput
                type="textarea"
                name="About me"
                value="HI"
                v-if="currentUser.description == null"
                v-model="description"
                label="About me"
                readonly
                validation="min:|matches:/^[a-zA-Z\s]+$/"
                outer-class="mb-4"
                input-class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />

              <FormulateInput
                type="text"
                name="About me"
                v-else
                readonly
                v-model="currentUser.description"
                label="About me"
                validation="min:|matches:/^[a-zA-Z\s]+$/"
                outer-class="mb-4"
                input-class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
            </div>
          </div>
        </div>
      </FormulateForm>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      description: ''
    }
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
};
</script>