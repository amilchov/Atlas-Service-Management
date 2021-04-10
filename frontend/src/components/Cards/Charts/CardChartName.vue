<template>
  <div>
    <router-link :to="{ path: '/admin/chart/'+ this.$route.params.id+ '/' + this.name.replace('/', ' ')}">
      <div
      @click="postionLocal()"
        class=" text-center items-center justify-center relative flex flex-col min-w-0 break-words bg-white w-full h-full  shadow-lg rounded-lg"
      >
        <div class="px-4 py-5 items-center flex flex-col">
          <h6 class="text-xl font-semibold">{{ name }}</h6>
        </div>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  props: {
    name: null,
    position: null,
  },

  methods: {
    postionLocal() {
      if(this.position != null)
        localStorage.setItem('position', this.position);
    }
  }
};
</script>
