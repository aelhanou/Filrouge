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
    async updateConnected()
    {
       await fetch("http://localhost/fr/RegisterC/update",{
        method: "PUT",
        headers: {
          "Content-Type" : "application/json"
        },
        body: JSON.stringify({
          id : localStorage.getItem("id"),
          connected : 0
        })
      }) 
    }
  },
  created()
  {
    this.updateConnected()
      this.logout()

  }
};
</script>

<style>
</style>