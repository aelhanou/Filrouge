<template>
  <div>
    <div class="genDescription">
      <div class="insideDescription" style="margin-top: 100px">
        <div class="imgDescription" style="width: 550px !important">
          <img
            v-if="data.image"
            style="width: 100% !important; height: 450px !important"
            :src="getImage(data.image)"
          />
        </div>
        <div class="AllDescription">
          <div class="DescriptionAboutAnime">
            <h1 class="DescriptionH1">{{ data.title }}</h1>
            <h5 class="EpisodesNumber">
              {{ data.Created_at }} - {{ data.numberOfEpisodes }} Episodes -
              Japanese &#38; English
            </h5>
            <h6 class="UnderAge">
              Persons under the age of 15 must be accompanied by a parent or
              adult guardian
            </h6>
          </div>
          <div class="decriptionAnime">
            <h4 class="QuoteDes">
              I Want to Be like You...The Strongest Hero!
            </h4>
            <h6 class="TheRightAnimeDescription">
              {{ data.description }}
            </h6>
            <div class="show-tags">
              <a href="#" class="ActionDesc">Action</a>

              <a href="#" class="SchoolDesc">School</a>

              <a href="#" class="SpowerDesc">Super Power</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="seasonANDEpisodeNumber">
      <select
        name=""
        class="SelectEpNum"
        id=""
        style="width: 120px"
        v-model="SessEp"
        
      >
        <option
          v-for="sessionEp in ae"
          :key="sessionEp"
          
          class="id_session"
          :value="JSON.stringify({ action: 'SessionEpiso', id: sessionEp })"
        >
          Season {{ sessionEp }}
        </option>
        <!-- <option value="2">Season 2</option>
        <option value="3">Season 3</option>
        <option value="4">Season 4</option> -->
      </select>

      <span class="EpisodeNumber">{{ data.numberOfEpisodes }}</span>
    </div>
    <div class="EpisodeDescription">
      <EpisodeDescription :data="dataSes" />
    </div>

    <div v-if="ShowPopUpEp" class="GPopUp">
      <div class="GenPopUp">
        <div class="gen">
          <div class="img-anime">
            <img
              style="width: 300px"
              src="../assets/135625.jpg"
              alt="animeGenre"
            />
          </div>

          <div class="description">
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Voluptatem vero quaerat excepturi incidunt nulla blanditiis!
              Maxime temporibus
            </p>
          </div>

          <button class="close" @click="close">Close</button>
        </div>
      </div>
    </div>
    <Comment @refreshComments="refreshComments" />
    <Readcomments :data="Rcomments" @refreshComments="refreshComments" />
    <div class="footerAnime">
      <Footer />
    </div>
  </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import Comment from "../components/Comment.vue";
import EpisodeDescription from "../components/EpisodeDescription.vue";
import Readcomments from "../components/Readcomments.vue";

export default {
  name: "AnimeDescription",
  data() {
    return {
      data: [],
      ShowPopUpEp: false,
      Rcomments: [],
      dataEpisodes: [],
      sessionEp: "",
      SessEp: "",
      idSess: null,
      ae: null,
      dataSes: []
    };
  },
  components: {
    Footer,
    EpisodeDescription,
    Comment,
    Readcomments,
  },
  methods: {
    doAction() {
      let action = JSON.parse(this.SessEp);
      switch (action.action) {
        case "SessionEpiso":
          this.SessionE(action.id);

          break;

        default:
          break;
      }
    },
    y() {
      let tt = document.querySelectorAll('.id_session')[0].setAttribute('selected',true)
      console.log(tt);
    },
    SessionE(id) {

      // this.idSess = id;
      this.readEpisodes(id)
    },
    getImage(pet) {
      var images = require.context("../assets/", false, /\.png||jpg$/);
      return images("./" + pet);
    },
    refreshComments() {
      this.readComments();
    },
    async readComments() {
      let id = this.$route.params.id;
      let resp = await fetch("http://localhost/fr/CommentsC/readComments", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
        }),
      });
      this.Rcomments = await resp.json();
    },
    async show() {
      let id = this.$route.params.id;
      localStorage.setItem("id_Anime", id);

      let resp = await fetch("http://localhost/fr/AnimeC/read_single", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
        }),
      });

      this.data = await resp.json();
    },
    async readEpisodes(id_s) {
      let id = this.$route.params.id;
      let resp = await fetch("http://localhost/fr/EpisodesC/read_sin", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
          id_session: id_s
        }),
      });
     
      this.dataSes = await resp.json();
      console.log(this.dataSes);
    },
    async readEpiSession() {
      let id = this.$route.params.id;
      let resp = await fetch("http://localhost/fr/EpisodesC/readEpisodesWithImage", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
          
        }),
      });
     
      let arr = []
      this.dataSes = await resp.json();

      this.dataSes.map((e) => {
        arr.push(e.session);
      });

      this.sessionEp = new Set(arr);
        let ae = this.sessionEp;
        this.ae = [...ae]
        
    
      // console.log(f);
    },
    yo(id) {
      console.log(id);
      this.ShowPopUpEp = true;
    },
    close() {
      this.ShowPopUpEp = false;
    },
  },
  created() {
    this.readEpiSession()
    this.show();
    // this.readEpisodes();
    this.readComments();
  },
  watch: {
    SessEp() {
      this.doAction();
    },
  },
};
</script>

<style scoped >
.genDescription {
  width: 100%;
  /* height: 80vh; */
  background: linear-gradient(
    to bottom,
    #3b0080 0%,
    #3b0080 40%,
    #3b0090 40%,
    #3b0090 80%,
    #3b0099 80%,
    #3b0099 100%
  );
  display: flex;
  flex-direction: row;
  justify-content: center;
  margin: auto;
  color: white;
}
.insideDescription {
  width: 70%;
  display: flex;
  flex-direction: row;
  justify-content: center;
  margin-top: 120px;
}
.imgDescription {
  width: 900px;
  height: 400px;
}
.img-g {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 8px;
  filter: blur(0);
}

.img-g:hover {
  transform: rotate(360deg);
  transition: 1s;
}

.AllDescription {
  display: flex;
  flex-direction: column;
  gap: 150px;
  margin-top: 46px;
}
.DescriptionAboutAnime {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-left: 20px;
  margin-top: 10px;
}
.DescriptionH1 {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-left: 20px;
}
.EpisodesNumber {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-left: 50px;
  font-size: 13px;
  color: rgba(255, 255, 255, 0.445);
}
.UnderAge {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-left: 50px;
  font-size: 13px;
  color: rgba(255, 255, 255, 0.445);
}
.decriptionAnime {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
.QuoteDes {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-left: 40px;
}
.TheRightAnimeDescription {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-left: 50px;
  font-size: 14px;
  text-align: start;
  color: rgba(255, 255, 255, 0.445);
}

.show-tags {
  margin: 30px 0px 40px 50px;
}

.ActionDesc {
  margin: 5px;
  padding: 8px;
  border: 1px solid white;
  border-radius: 60px;
  color: white;
}
.SchoolDesc {
  margin: 5px;
  padding: 8px;
  border: 1px solid white;
  border-radius: 60px;
  color: white;
}
.SpowerDesc {
  margin: 5px;
  padding: 8px;
  border: 1px solid white;
  border-radius: 60px;
  color: white;
}

a:hover {
  text-decoration: none !important;
  color: black !important;
}

.EpisodeDescription {
  background-color: #3b0080;
  display: flex;
  flex-direction: row;
  /* margin: 10px !important; */
  margin-bottom: 30px !important;
  overflow-x: scroll !important;
  -ms-overflow-style: none; /* IE and Edge */
}
/* Hide scrollbar for Chrome, Safari and Opera */
.EpisodeDescription::-webkit-scrollbar {
  display: none;
}
.seasonANDEpisodeNumber {
  background-color: #3b0080;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 0px 45px 25px 45px;
  color: white;
}
.EpisodeNumber {
  /* width: 40px; */
  border: 1px solid white;
  border-radius: 50px;
  padding: 5px 10px;
}
.SelectEpNum {
  width: 7%;
  border: 1px solid white;
  border-radius: 50px;
  padding: 5px 10px;
  outline: none;
}

/* Pop up Episode*/

.GenPopUp {
  width: 30%;
  min-width: 250px;
  top: 380px;
  left: 700px;
}
.gen {
  width: 80%;
  min-width: 250px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 5px;
  margin: 0px auto;
}
img {
  width: 100%;
  border-radius: 8px;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

img:hover {
  width: 100%;
  border-radius: 18px;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

.img-anime:hover ~ .description {
  width: 100%;
  background-color: white;
  color: black;
  border-top-left-radius: 0px;
  border-top-right-radius: 0px;
  padding: 8px;
}

.description {
  width: 100%;

  background-color: white;
  color: black;
  padding: 8px;

  border-top-left-radius: 0px;
  border-top-right-radius: 0px;
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
  transform: scale(1.02);
  border-radius: 3px;
  transition: 0.5s;
}
.description:hover ~ .ActionDiv > .actionH4 {
  background-color: white;
  color: black;

  border-top-left-radius: 0px;
  border-top-right-radius: 0px;
}
.GPopUp {
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  position: fixed;
  background-color: rgba(0, 0, 0, 0.431);
  z-index: 10;
  display: flex;
  justify-content: center;
  align-items: center;
}
.close {
  width: 200px;
  width: 100%;
  background-color: white;
  border-radius: 10px;
  border-top-left-radius: 0px;
  border-top-right-radius: 0px;
}

@media screen and (max-width: 900px) {
  .insideDescription {
    display: flex;
    flex-wrap: wrap;
    margin-top: 35px;
    transition: 0.4s;
  }
  .AllDescription {
    gap: 60px;
  }
}
</style>