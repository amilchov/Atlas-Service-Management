<template>
  <div>
    <sidebar />
    <div class="relative md:ml-64">
      <admin-navbar />
      <header-stats />
      <div class="px-4 md:px-10 mx-auto h-full w-full -m-24">
        <router-view />
        <!-- <footer-admin /> -->
      </div>
    </div>
  </div>
</template>
<script>
import AdminNavbar from "@/components/Navbars/AdminNavbar.vue";
import Sidebar from "@/components/Sidebar/Sidebar.vue";
import HeaderStats from "@/components/Headers/HeaderStats.vue";
// import FooterAdmin from "@/components/Footers/FooterAdmin.vue";
// import FooterSmall from "@/components/Footers/FooterSmall.vue"
export default {
  name: "admin-layout",
  components: {
    AdminNavbar,
    Sidebar,
    HeaderStats,
    // FooterAdmin
    // FooterSmall
  },
};
</script>
