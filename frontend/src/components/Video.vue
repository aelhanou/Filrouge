<template>
  <div class="yo">
    <video  controls   width="100%" style="min-height: 719px;" autoplay type="mp4" ></video>
  </div>
</template>

<script>
import video from "../assets/vid.mp4";
export default {
 
  name: "Video",
  data() {
    return {
      video,
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