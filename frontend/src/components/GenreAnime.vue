<template>
  <div class="gen">
    <div v-for="dt in data" :key="dt.id" style="width:230px;margin:5px">
      <div class="img-anime">
        <img
          :src="require('../assets/'+dt.image)"
          alt="animeGenre"
          style="height: 200px !important"
        />
      </div>

      <div class="description">
        <div class="ActionDiv">
          <h4 class="actionH4">{{ dt.genreOfAnime }}</h4>
        </div>
        <p class="pDes" style="overflow-y: scroll; height: 131px;text-align: center;padding: 5px;">
          {{dt.description}}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "GenreAnime",
  props: {
    data: Array,
  },
};
</script>

<style scoped>
.gen {
  display: flex;
}
.pDes::-webkit-scrollbar {
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
  color: black;
  font-size: 16px;
  transition: 1s;
  padding: 5px;
}
.gen:hover {
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
</style>