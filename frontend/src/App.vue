<template>
  <div id="app">
    <Navbar />
    <!-- <router-link to="/about">About</router-link> -->
    <router-view />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";

export default {
  name: "App",
  components: {
    Navbar,
  },
  data() {
    return {
      
    };
  },
  methods: {
    
    
  },
  
};
</script>
<style lang="scss">
@import url("https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i");

* {
  font-family: "Ninja Naruto" !important;
  p,h3,h5,h6{
    
  font-family: Avenir, Helvetica, Arial, sans-serif !important ;

  }
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  font-family: fangsong;
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
