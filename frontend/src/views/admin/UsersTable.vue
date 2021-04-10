<template>
  <div class="flex flex-wrap mt-4">
    <div class="w-full mb-12 px-4">
      <card-user-table />
    </div>
  </div>
</template>
<script>
import CardUserTable from "@/components/Cards/CardUserTable.vue";

export default {
  components: {
    CardUserTable,
  },
};
</script>
