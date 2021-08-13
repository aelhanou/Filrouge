<template>
  <div
   
    style="position: relative; margin: 10px; background-size: cover;"
  >
    <b-carousel
      id="carousel-fade"
      style="text-shadow: 0px 3px 2px #000"
      fade
      indicators
    >
      <b-carousel-slide
      
        style="height: 780px"
        caption="First slide"
        :img-src="img"
      ></b-carousel-slide>
      <b-carousel-slide
      
        style="height: 780px"
        caption="Second Slide"
        :img-src="img1"
      ></b-carousel-slide>
      <b-carousel-slide
      
        caption="Third Slide"
        style="height: 780px"
        img-src="https://picsum.photos/1024/480/?image=22"
      ></b-carousel-slide>
    </b-carousel>
  </div>
</template>

<script>
import img from "../assets/imageCover1.jpg";
import img1 from "../assets/sasku.png";
export default {
  name: "Slides",
  data() {
    return {
      img,
      img1,
    };
  },
};
</script>

<style scoped>
.img-fluid {
  /* height: 500px; */
  background-size: cover !important;
}



</style>