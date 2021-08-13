<template>
  <div class="home container-fluid">
    <!-- <Slides /> -->
    <HomeVideo   />
    <div class="Trending">
      <h3 class="TrendingH3">Trending Now</h3>
    </div>
    <div class="row" style="width: 100%; gap: 30px">
      <Card :data="data" @showAnime="showAnime" />
    </div>
    <div class="video">
      <Video />
    </div>
    <div class="Trending">
      <h3 class="TrendingH3">Popular Shows</h3>
    </div>
    <div class="row" style="width: 100%; gap: 30px">
      <Card :data="data" @showAnime="showAnime" />
    </div>
    <!-- <div class="row" style="width: 100%; margin: auto">
      <Card   />
    </div> -->

    <div class="TrendingGenre">
      <h3 class="TrendingH3Genre">Anime's Categories</h3>
    </div>
    <div class="genreAn" style="margin: auto; height: none">
      <GenreAnime :data="GenreData" />
    </div>

    <div class="footerAnime">
      <Footer />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Card from "@/components/Card.vue";
// import Slides from "@/components/Slides.vue";
import HomeVideo from "@/components/HomeVideo.vue";
import Video from "@/components/Video.vue";
import GenreAnime from "@/components/GenreAnime.vue";
import Footer from "@/components/Footer.vue";

// import { mapGetters } from "vuex";
export default {
  name: "Home",
  data() {
    return {
      data: [],
      GenreData: [],
     
    };
  },

  // computed: mapGetters(["alltodos"]),
  components: {
    Card,
    // Slides,
    HomeVideo,
    Video,
    GenreAnime,
    Footer,
  },
  methods: {
    // myvid(id)
    // {
      
    //   this.handleScroll(id)
    //   // console.log(id);
    // }
    // ,
    // handleScroll(myvi) {
   

    //   console.log(myvi);
    //   // console.log(video);
    //   // Any code to be executed when the window is scrolled
    //   this.isUserScrolling = window.scrollY < 10;
    //   // console.log(this.isUserScrolling);
    //   if (this.isUserScrolling) {
    //     myvi.play();
    //     // myvi.play();
    //   }
    //   else {
    //     myvi.pause();
    //   }
    // },
    async ReadGenreAnime() {
      let resp = await fetch("http://localhost/fr/KindOfAnimeC/read", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
      });
      this.GenreData = await resp.json();
    },
    async readall() {
      let resp = await fetch("http://localhost/fr/AnimeC/readAll", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
      });

      this.data = await resp.json();
    },

    showAnime(id) {
      console.log(id);
    },
  },
  created() {
    this.readall();
    this.ReadGenreAnime();
    // this.handleDebouncedScroll = debounce(this.myvid, 100);
    // window.addEventListener('scroll', this.handleDebouncedScroll);
    
  },
 
};
</script>


<style scoped>
img {
  height: 683px !important;
  background-size: cover;
}
.home {
  background-color: #3b0087;
  padding: 0px !important;
  margin: 0px !important;
  box-sizing: border-box;
}
.row {
  justify-content: center !important;
  gap: 30px !important;
  display: flex !important;
}
.video {
  margin-top: 6 0px;
}
.Trending {
  width: 100%;
  display: flex;
  text-align: start;
  color: white;
}
.TrendingH3 {
  width: 100%;
  margin: 10px 0px 5px 19px;
}

.TrendingH3Genre {
  width: 100%;
  margin: 10px 0px -34px 19px;
}

.TrendingGenre {
  width: 100%;
  display: flex;
  text-align: start;
  color: white;
  margin-bottom: 69px;
  margin-top: 17px;
}
.genreAn {
  display: flex;
  flex-direction: row;
  margin: 10px !important;
  margin-bottom: 30px !important;
  overflow-x: scroll !important;
  -ms-overflow-style: none; /* IE and Edge */
}
/* Hide scrollbar for Chrome, Safari and Opera */
.genreAn::-webkit-scrollbar {
  display: none;
}
</style>