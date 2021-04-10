<template>
  <div
    class="relative flex flex-col min-w-0 break-words bg-white w-full pb-3 shadow-lg rounded"
  >
    <div class="px-4 py-5 flex-auto">
      <div class="">
        <img v-img :src="image_link" class="h-1/2" />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    image_link: null,
  },
};
</script>
