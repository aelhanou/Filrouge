<template>
  <div class="gen" style="margin-top:71px;">
    <div class="navBar">
      <span
        ><router-link
          to="/Dashboard"
          style="color: white !important; text-decoration: none"
          >Dashboard</router-link
        ></span
      >
      <span
        ><router-link
          to="/InsertAnime"
          style="color: white !important; text-decoration: none"
          >Insert Animes</router-link
        >
      </span>
      <span
        ><router-link
          to="/Profile"
          style="color: white !important; text-decoration: none"
          >Profile</router-link
        >
      </span>
      <span
        ><router-link
          to="/DisplayAnimes"
          style="color: white !important; text-decoration: none"
          >Display Animes</router-link
        ></span
      >
      <span
        ><router-link
          to="/ContactUsMessages"
          style="color: white !important; text-decoration: none"
          >Contact Us Messages</router-link
        ></span
      >
    </div>
    <div class="content">dashboard</div>
  </div>
</template>

<script>
export default {
  name: "Dashboard",
};
</script>


<style scoped>
.gen {
  width: 100%;
  height:calc(100vh - 71px);
  display: flex;
  flex-direction: row;
}
.navBar {
  width: 300px;
  display: flex;
  flex-direction: column;
  gap: 25px;
  height: auto;
  background-color: gray;
  color: white;
  padding-top: 20px;
}
</style>