<template>
  <div class="container mx-auto px-4 h-full">
    <div class="flex content-center items-center justify-center h-full">
      <div class="w-full lg:w-4/12 px-4">
        <div
          class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
        >
          <div class="rounded-t mb-0 px-6 py-6">
            <div class="text-center mb-6">
              <h6 class="text-gray-600 text-xl  font-bold">
                Sign in
              </h6>
            </div>
            <FormulateForm @submit="handleLogin">
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
                validation="^required|min:5,"
                outer-class="mb-4"
                input-class="border border-gray-400 rounded px-3 py-2 leading-none focus:border-green-500 outline-none border-box w-full mb-1"
                label-class="block uppercase text-gray-700 text-xs font-bold mb-2"
                help-class="text-xs mb-1 text-gray-600"
                error-class="text-red-700 text-xs mb-1"
              />

              <!-- <div>
                <label class="inline-flex items-center cursor-pointer">
                  <input
                    id="customCheckLogin"
                    type="checkbox"
                    class="form-checkbox text-gray-800 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                  />
                  <span class="ml-2 text-sm font-semibold text-gray-700">
                    Remember me
                  </span>
                </label>
              </div> -->

               <FormulateInput
                style="margin-top:30px;"
                input-class="px-4 py-2 w-full rounded bg-blue-500 text-white hover:bg-blue-700"
                type="submit"
              />
            </FormulateForm>
          </div>
        </div>
        <div class="flex flex-wrap mt-6 relative">
          <!-- <div class="w-1/2">
            <a href="javascript:void(0)" class="text-gray-300">
              <small>Forgot password?</small>
            </a>
          </div> -->
          <div class="text-center">
            <router-link to="/auth/register" class="text-gray-300">
              <small>Create new account</small>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import User from "../../models/user";

export default {
  name: "Login",
  data() {
    return {
      user: new User("", ""),
      loading: false,
      message: "",
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    },
  },
  created() {
    if (this.loggedIn) {
      this.$router.push("/admin");
    }
  },
  methods: {
    handleLogin() {
      this.$store.dispatch("auth/login", this.user).then(
        () => {
          this.$router.push("/admin");
        },
        (error) => {
          this.message =
            (error.response && error.response.data) ||
            error.message ||
            error.toString();
          alert("ERROR in data!!!");
        }
      );
    },
  },
};
</script>
