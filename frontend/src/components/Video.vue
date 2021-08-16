<template>
  <div class="yo"> 
    <img :src="dragonBallWallpaper" width="100%" style="min-height: 719px;" alt="">
      <!-- <video  :src="video"   ref="myvideo1"  width="100%" style="min-height: 719px;" autoplay type="mp4" ></video> -->
  </div>
</template>

<script>
import dragonBallWallpaper from "../assets/dragonBallWallpaper.jpg";

export default {
 
  name: "Video",
  data() {
    return {
      dragonBallWallpaper,
      
    };
  },
  components: {},
  
};
</script>

<style scoped>
.yo {

  clip-path: inset(150px 0px 150px 0px);
  }


</style>