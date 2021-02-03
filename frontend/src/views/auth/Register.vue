<template>
  <div class="container mx-auto px-4 h-full">
    <div class="flex content-center items-center justify-center h-full">
      <div class="w-full lg:w-6/12 px-4">
        <div
          class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
        >
          <div class="rounded-t mb-0 px-6 py-6">
            <div class="text-center mb-3">
              <h3 class="text-gray-600 text-xl font-bold">
                Sign up
              </h3>
            </div>
          </div>
          <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <FormulateForm @submit="handleRegister">
              <FormulateInput
                type="text"
                name="first name"
                v-model="user.first_name"
                label="Enter your First name"
                validation="^required|min:5|max:50|matches:/^[a-zA-Z\s]+$/"
                outer-class="mb-4"
                :validation-messages="{
                  matches:
                    'First name must contain only English letters and must not contain numbers!',
                }"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
              <FormulateInput
                type="text"
                name="middle name"
                v-model="user.middle_name"
                label="Enter your Middle name"
                validation="^required|min:5|max:50|matches:/^[a-zA-Z\s]+$/"
                outer-class="mb-4"
                :validation-messages="{
                  matches:
                    'Middle name must contain only English letters and must not contain numbers!',
                }"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
              <FormulateInput
                type="text"
                name="last name"
                v-model="user.last_name"
                label="Enter your Last name"
                validation="^required|min:5|max:50|matches:/^[a-zA-Z\s]+$/"
                outer-class="mb-4"
                :validation-messages="{
                  matches:
                    'Last name must contain only English letters and must not contain numbers!.',
                }"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
              <FormulateInput
                type="email"
                name="email"
                v-model="user.email"
                label="Enter your Email address"
                validation="email"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
              <FormulateInput
                type="password"
                name="password"
                v-model="user.password"
                label="Password"
                validation="^required|min:5,length|matches:/[0-9]/"
                :validation-messages="{
                  matches: 'Password must contain at least 1 number.',
                }"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
              <FormulateInput
                type="password"
                name="password_confirm"
                v-model="user.password_confirm"
                label="Confirm password"
                validation="^required|confirm"
                validation-name="Password confirmation"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />
              <FormulateInput
                type="image"
                name="avatar"
                v-on:change="onChangeFileUpload($event)"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                label="Select an image to upload"
                help="Select a png or jpg to upload."
                validation="mime:image/jpeg,image/png"
              />
              <FormulateInput
                style="margin-top:30px;"
                input-class="px-4 py-2 w-full rounded bg-blue-500 text-white hover:bg-blue-700"
                type="submit"
              />
            </FormulateForm>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import User from "../../models/user";

export default {
  name: "Register",
  data() {
    return {
      user: new User("", "", "", "", "", null),
      submitted: false,
      successful: false,
      message: "",
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    },
  },
  mounted() {
    if (this.loggedIn) {
      this.$router.push("/admin");
    }
  },
  methods: {
    onChangeFileUpload(event) {
      this.user.avatar = event.target.files[0];
      console.log(this.user.avatar);
      console.log(this.user);
    },

    createFormData() {
      
    },

    handleRegister() {
      this.message = "";
      this.submitted = true;

      const formData = new FormData();
      formData.append("first_name", this.user.first_name);
      formData.append("middle_name", this.user.middle_name);
      formData.append("last_name", this.user.last_name);
      formData.append("email", this.user.email);
      formData.append("password", this.user.password);

      if (this.user.avatar != null) {
        formData.append("avatar", this.user.avatar);
      }

      this.$store.dispatch("auth/register", formData).then(
        (data) => {
          this.message = data.message;
          this.successful = true;
          alert(data.data);
          this.$router.push("/auth/login");
        },
        (error) => {
          this.message =
            (error.response && error.response.data) ||
            error.message ||
            error.toString();
          this.successful = false;
          alert(this.message);
        }
      );
    },
  },
};

// import { mapActions } from "vuex";

// export default {
//   data() {
//     return {
//       form: {
//         first_name: "",
//         middle_name: "",
//         last_name: "",
//         email: "",
//         password: "",
//       },
//       avatar: null,
//     };
//   },

//   methods: {
//     onChangeFileUpload(event) {
//       this.avatar = event.target.files[0];
//     },

//     ...mapActions({
//       signUp: "auth/signUp",
//     }),

//     async submit() {
//       const formData = new FormData();
//       formData.append("first_name", this.form.first_name);
//       formData.append("middle_name", this.form.middle_name);
//       formData.append("last_name", this.form.last_name);
//       formData.append("email", this.form.email);
//       formData.append("password", this.form.password);

//       if (this.avatar != null) {
//         formData.append("avatar", this.avatar);
//       }

//       this.signUp(formData);

//     },
//   },
// };
</script>
