<template>
  <div
    class="gen1"
    @click="yo"
    style="width: 77%; display: flex; overflow-x: scroll; margin: auto"
  >
    <div v-for="(dt,index) in data" :key="dt.id" style="margin: 5px">
      <div class="img-anime" style="width: 200px !important">
        <img
          :src="require('../assets/' + dt.image)"
          alt="animeGenre"
          style="
            width: 100%;
            height: 129px;
            border-radius: 8px;
            object-fit: cover;
          "
        />
      </div>

      <div class="description">
        <router-link
          class="showEp"
          :to="`/ShowAnime/${dt.id}`"
          style="color: white; text-decoration: none"
          >Episode {{ index + 1 }}</router-link
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "EpisodeDescription",
  props: {
    data: Array,
  },
  methods: {
    yo() {
      this.$emit("click");
    },
    goToEp(id) {
      console.log(id);
    },
  },
};
</script>

<style scoped>
.gen1::-webkit-scrollbar {
  /* width: 200px !important;
  min-width: 250px; */

  /* flex-direction: row !important;
  gap: 20px !important; */
  /* justify-content: center;
  margin-left: 25px;
  padding: 5px;
  margin: 0px 0px 0px 4px!important; */
  display: none;
}
img {
  width: 100%;
  border-radius: 8px;
}

img:hover {
  width: 100%;
  border-radius: 18px;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

.img-anime:hover ~ .description {
  width: 100%;
  border-radius: 10px;
  background-color: white;
  color: black;
  border-radius: 18px;
  border-top-left-radius: 0px;
  border-top-right-radius: 0px;
}

.description {
  color: rgb(255, 255, 255);
  font-size: 14px;
}
.ActionDiv {
  width: 100%;
  display: flex;
  text-align: start;
  margin-top: 8px;
}
.actionH4 {
  color: white;
  font-size: 16px;
  padding: 2px;
}

/* .actionH4:hover {
  background-color: white;
  color: black;
  font-size: 16px;
} */
.img-anime:hover ~ .description > .ActionDiv > .actionH4 {
  background-color: white;
  color: black !important;
  font-size: 16px;
  transition: 1s;
  padding: 5px;
}

.gen:hover {
  transform: scale(1.02);
  border-radius: 3px;
  transition: 0.5s;
}
.description:hover ~ .ActionDiv > .actionH4 {
  background-color: white;
  color: black;
  border-radius: 10px;
  border-top-left-radius: 0px;
  border-top-right-radius: 0px;
}

.img-anime:hover ~ .description > .showEp {
  background-color: white;
  color: black !important;
}
</style>