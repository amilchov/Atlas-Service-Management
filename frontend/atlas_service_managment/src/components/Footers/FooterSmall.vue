<template>
  <footer
    class="pb-6"
    :class="[absolute ? 'absolute w-full bottom-0 bg-gray-900' : 'relative']"
  >
    <div class="container mx-auto px-4">
      <hr class="mb-6 border-b-1 border-gray-700" />
      <div
        class="flex flex-wrap items-center md:justify-between justify-center"
      >
        <div class="w-full md:w-10/12 px-4 mx-auto text-center">
          <div class="text-sm text-white font-semibold py-1">
            NOIT {{ date }} -  Category "Distributed Web Applications" | Aleks Milchov and David Ivanov | 
            <a
              href="https://pgi-pernik.bg-schools.com/"
              target="_blank"
              class="text-white hover:text-gray-300"
            >
              PGI Pernik
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      date: new Date().getFullYear(),
    };
  },
  props: {
    absolute: {
      type: Boolean,
      default: false,
    },
  },
};
</script>
