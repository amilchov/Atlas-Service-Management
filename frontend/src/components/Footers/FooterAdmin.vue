<template>
<footer class="block py-4 p-10">
    <hr class="mb-4 border-b-1 border-gray-300" />
    <div class="container mx-auto px-4">
      <div
        class="flex flex-wrap items-center md:justify-between justify-center"
      >
        <div class="w-full h-full md:w-10/12 px-4 mx-auto text-center">
          <div class="text-sm text-gray-600 font-semibold py-1">
            NOIT {{ date }} -  Category "Distributed Web Applications" | Aleks Milchov and David Ivanov | 
            <a
              href="https://pgi-pernik.bg-schools.com/"
              target="_blank"
              class="text-gray-600 hover:text-gray-900"
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
};
</script>
