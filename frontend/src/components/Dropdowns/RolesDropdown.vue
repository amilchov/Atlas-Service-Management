<template>
  <div class="flex flex-wrap">
    <div class="w-full sm:w-6/12 md:w-4/12 px-4">
      <div class="relative inline-flex align-middle w-full">
        <button
          class="text-white font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 bg-gray-800 active:bg-gray-900 ease-linear transition-all duration-150"
          type="button"
          ref="btnDropdownRef"
          v-on:click="toggleDropdown()"
        >
          Roles
        </button>
        <div
          ref="popoverDropdownRef"
          class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1 min-w-48"
          v-bind:class="{
            hidden: !dropdownPopoverShow,
            block: dropdownPopoverShow,
          }"
        >
          <a
            href="#pablo"
            v-for="role in roles"
            :key="role"
            class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
          >
            {{ role.name }}
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { createPopper } from "@popperjs/core";

export default {
  data() {
    return {
      dropdownPopoverShow: false,
    };
  },
  methods: {
    toggleDropdown: function () {
      console.log("muie");
      if (this.dropdownPopoverShow) {
        this.dropdownPopoverShow = false;
      } else {
        this.dropdownPopoverShow = true;
        createPopper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
          placement: "bottom-start",
        });
      }
    },
  },
  props: {
    roles: null,
  },
};
</script>