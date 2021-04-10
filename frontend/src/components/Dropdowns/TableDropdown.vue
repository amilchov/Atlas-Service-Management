<template>
  <div>
    <a
      class="text-gray-600 py-1 px-3"
      href="#pablo"
      ref="btnDropdownRef"
      v-on:click="toggleDropdown($event)"
    >
      <i class="fas fa-ellipsis-v"></i>
    </a>
    <div
      ref="popoverDropdownRef"
      class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
      v-bind:class="{
        hidden: !dropdownPopoverShow,
        block: dropdownPopoverShow,
      }"
    >
      <a
        href="javascript:void(0);"
        class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
      >
        <!-- <modal></modal> -->
        <button @click="show()">Home</button>
        <modal name="my-first-modal">
          This is my first modal
        </modal>
      </a>
      <a
        href="javascript:void(0);"
        class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
      >
        User Settings
      </a>
      <router-link
        v-bind:to="'/profile/' + this.id"
        class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
      >
        User Profile
      </router-link>
    </div>
  </div>
</template>
<script>
import { createPopper } from "@popperjs/core";
// import Modal from "@/components/Modals/Modal.vue"

export default {
  data() {
    return {
      dropdownPopoverShow: false,
    };
  },

  components: {
    // Modal
  },

  mounted() {
    // this.$store.dispatch("userTable/setId", this.id);
    // console.log(this.$store.state.userTable.id);
  },

  methods: {
    toggleDropdown: function(event) {
      event.preventDefault();
      if (this.dropdownPopoverShow) {
        this.dropdownPopoverShow = false;
      } else {
        this.dropdownPopoverShow = true;
        createPopper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
          placement: "bottom-start",
        });
      }
    },
    show() {
      this.$modal.show("my-first-modal");
    },
    hide() {
      this.$modal.hide("my-first-modal");
    },
  },
  mount() {
    this.show();
  },

  props: {
    id: null,
  },
};
</script>
