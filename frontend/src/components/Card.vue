<template>
  <div class="gen">
    <div v-for="e in data" :key="e.id" style="width:230px;margin-left:5px">
      <div v-if="e.image" :style="bgImg(e.image)" >        
        <div class="description">
          <p class="des">
            {{ e.description }}
          </p>
          <h4 class="CRating">Community Rating</h4>
          <div class="starDiv">
            <img
              class="starIcon"
              src="../assets/star.png"
              alt=""
              style="height: 24px !important"
            />
            <img
              class="starIcon"
              src="../assets/star.png"
              alt=""
              style="height: 24px !important"
            />
            <img
              class="starIcon"
              src="../assets/star.png"
              alt=""
              style="height: 24px !important"
            />
            <img
              class="starIcon"
              src="../assets/star.png"
              alt=""
              style="height: 24px !important"
            />
          </div>
        </div>
      </div>
      <div class="text">
        <router-link :to="{ name: 'AnimeDescription', params: { id: e.id } }">
          <button class="btn" @click="showAnime(e.id)">
            <h4 class="h4Title">{{ e.title }}</h4>
            <h5>
              {{ e.TheBeginningOfShow }} - {{ e.numberOfEpisodes }} Episodes
            </h5>
          </button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script >

export default {
  
  name: "Card",
  data() {
    return {
      image : "",
      img: ""
    };
  },
  methods: {
    showAnime(id) {
      this.$emit("showAnime", id);
    },
    bgImg(image) {
      return {
        "width": "100%",
        "min-width": "229px",
        "height": "340px",
        "background-image": `url(`+require('../assets/'+`${image}`),
        "background-size": "cover",
        "background-position": "center",
        "border-radius": "10px",
      };
    },
    
  },
  afterCreated() {
     
  },
  props: {
    data: Array,
  },
};
</script>

<style scoped>
.des {
  height: 150px;
  overflow-y: scroll;
}
.des::-webkit-scrollbar {
  display: none;
}
.btn {
  border: none;
  outline: none;
  color: white;
}
.btn:hover {
  background-color: white;
  color: black;
}

.bg-img {
  
}
.CRating {
  margin: 55px 1px 1px 3px;
}
.gen {
  transition: 0.5s;
  /* min-width: 248.452px; */
  cursor: pointer;
  
  width: 100%;
  display: flex;
  flex-direction: row;
  gap: 32px;
  margin: auto;
  justify-content: center;
  margin-top: 46px;
  flex-wrap: wrap;
}
/* 
.gen:hover {
  transform: scale(1.1);
} */

.text {
  color: white;
  display: flex;
  flex-direction: column;
  justify-content: start;
  padding: 10px;
  transition: 0.5s;
  width: 100%;
}

.text:hover {
  padding: 10px;
  background-color: white;
  border-radius: 15px;
  transform: translateY(-45px);
  transition: 0.5s;
  color: black;
}

.bg-img:hover ~ .text > .btn {
  padding: 10px;
  background-color: white;
  border-radius: 15px;
  transform: translateY(-45px);
  transition: 0.5s;
  color: black;
}
h4 {
  font-size: 16px;
  font-weight: 400;
  white-space: nowrap;
  text-align: start;
  margin: 5px 0px 0px 10px;
}
h5 {
  font-size: 9px;
  font-weight: 400;
  white-space: nowrap;
  text-align: start;
  margin: 5px 0px 0px 10px;
}

/* .gen:hover {
  
  background-color: black;
  color: white;
  height: 340px;
} */

.description:hover {
  opacity: 1;
  background-color: black;
  color: white;
  height: 340px;
  padding: 25px 5px 0px 5px;
  border-radius: 10px;
  transition: 0.5s;
  border: 1px solid rgba(255, 255, 255, 0.356);
}

.description {
  opacity: 0;
  height: 340px;
  transition: 0.5s;
}
.starDiv {
  display: flex;
  justify-content: start;
}
.starIcon {
  width: 20px;
  margin: 2px;
}
</style>