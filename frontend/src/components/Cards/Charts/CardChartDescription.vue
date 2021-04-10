<template>
<div
    class=" text-center items-center justify-center relative flex flex-col min-w-0 break-words bg-white w-full h-full  shadow-lg rounded-lg"
  >
    <div class="px-4 py-5 items-center flex flex-col">
      <div
        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400"
      >
        <i class="fas fa-chart-bar"></i>
      </div>
      <h6 class="text-xl font-semibold">{{name}}</h6>
      <p class="mt-2 mb-4 text-gray-600">
        {{description}}
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    name: null,
    description: null,
  },
};
</script>
