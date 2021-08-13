<template>
<div>

</div>
</template>

<script>
export default {
  name: "LogOut",
  methods: {
    logout() {
      localStorage.clear();
      this.$router.push("/")
      
    },
  },
  created()
  {
      this.logout()

  }
};
</script>

<style>
</style>