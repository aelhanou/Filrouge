<template>
  <div class="gen" style="margin-top:71px;">
    <div class="navBar">
      <!-- <span
        ><router-link
          to="/Dashboard"
          style="color: white !important; text-decoration: none"
          >Dashboard</router-link
        ></span
      > -->
      <span v-if="role"
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

      <span v-if="role"
        ><router-link
          to="/DisplayAnimes"
          style="color: white !important; text-decoration: none"
          >Display Animes</router-link
        ></span
      >
      <span v-if="role"
        ><router-link
          to="/ContactUsMessages"
          style="color: white !important; text-decoration: none"
          >Contact Us Messages</router-link
        ></span
      >
    </div>

    <div class="w-100 d-flex flex-row" style="background-color: aliceblue">
      <div class="container w-100">
        <div class="container-fluid w-100" style="margin: 20px">
          <h1>Insert Anime</h1>
          <form @submit.prevent="insertAnime">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                v-model="title"
                placeholder="title"
              />
            </div>
            <div class="form-group">
              <select name="" id="" class="form-control" v-model="kanime">
                <option value="">Choose kind of Anime</option>
                <option
                  v-for="kindData in kindOfAnimeData"
                  :key="kindData.id"
                  :value="kindData.genreOfAnime"
                >
                  {{ kindData.genreOfAnime }}
                </option>
              </select>
            </div>
            <div class="form-group">
              <input
                type="date"
                class="form-control"
                id="exampleInputPassword1"
                v-model="createdAt"
                placeholder="Created at"
              />
            </div>
            <div class="form-group">
              <input
                type="file"
                accept="image/*"
                class="form-control"
                id="exampleInputPassword1"
                @change="onFileChange"
              />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div
          class="container-fluid w-100"
          style="margin: 20px; margin-top: 128px"
        >
          <h1>Insert Episodes</h1>
          <form class="">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                v-model="title"
                placeholder="Episode"
              />
            </div>

            <div class="form-group">
              <select name="" id="" class="form-control">
                <option value="">Choose id Episodes</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      <div class="container w-100">
        <div class="container-fluid w-100" style="margin: 20px">
          <form @submit.prevent="DescriptionAnime">
            <h1>Insert Description</h1>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                v-model="description"
                placeholder="description"
              />
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                id="exampleInputPassword1"
                v-model="numberOfEpisodes"
                placeholder="numberOfEpisodes"
              />
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="exampleInputPassword1"
                v-model="Status"
                placeholder="Status"
              />
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                id="exampleInputPassword1"
                v-model="timeOfEpisode"
                placeholder="timeOfEpisode"
              />
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                id="exampleInputPassword1"
                v-model="TheBeginningOfShow"
                placeholder="TheBeginningOfShow"
              />
            </div>
            <div class="form-group">
              <select
                name=""
                id=""
                class="form-control"
                v-model="id_info_anime"
              >
                <option>Choose id anime</option>
                <option
                  v-for="dataAnime in animeData"
                  :key="dataAnime.id"
                  :value="dataAnime.id"
                >
                  {{ dataAnime.title }}
                </option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="container-fluid w-100" style="margin: 20px">
          <h1>Insert Kind of anime</h1>
          <form @submit.prevent="insertGenreOfAnime">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                v-model="genreOfAnime"
                placeholder="Genre Of Anime"
              />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "InsertAnime",
  data() {
    return {
      genreOfAnime: "",
      kindOfAnimeData: "",
      image: "",
      createdAt: "",
      kanime: "",
      title: "",
      animeData: "",
      dAnime: "",
      TheBeginningOfShow: "",
      timeOfEpisode: "",
      created_At: "",
      numberOfEpisodes: "",
      description: "",
      role : ""
    };
  },
  methods: {
    onFileChange() {
      this.image = event.target.files[0];
    },
    async insertGenreOfAnime() {
      await fetch("http://localhost/fr/KindOfAnimeC/insert", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          genreOfAnime: this.genreOfAnime,
        }),
      });

      this.genreOfAnime = "";
    },
    async DescriptionAnime() {
      await fetch("http://localhost/fr/AnimeDescriptionC/insert", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id_info_anime: this.id_info_anime,
          TheBeginningOfShow: this.TheBeginningOfShow,
          timeOfEpisode: this.timeOfEpisode,
          Status: this.Status,
          numberOfEpisodes: this.numberOfEpisodes,
          description: this.description,
        }),
      });
      this.id_info_anime = "";
      this.TheBeginningOfShow = "";
      this.timeOfEpisode = "";
      this.Status = "";
      this.numberOfEpisodes = "";
      this.description = "";
    },
    async fetchGenreOfAnime() {
      let resp = await fetch("http://localhost/fr/KindOfAnimeC/read", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
      });

      this.kindOfAnimeData = await resp.json();
    },
    async fetchanime() {
      let resp = await fetch("http://localhost/fr/AnimeC/read", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
      });

      this.animeData = await resp.json();
    },

    async insertAnime() {
      // console.log(this.title);
      // console.log(this.kanime);
      // console.log(this.createdAt);
      // console.log(this.image.name);
      await fetch("http://localhost/fr/AnimeC/insert", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          title: this.title,
          genre: this.kanime,
          Created_at: this.createdAt,
          image: this.image.name,
        }),
      });

      this.title = "";
      this.kanime = "";
      this.createdAt = "";
      this.image.name = "";
    },
  },
  created() {
    this.role = localStorage.getItem('role') == "admin"
    this.fetchanime();
    this.fetchGenreOfAnime();
  },
};
</script>


<style scoped>
.gen {
  width: 100%;
  height: calc(100vh - 71px);
  display: flex;
  flex-direction: row;
  overflow: hidden;
}
.navBar {
  width: 366px;
  display: flex;
  flex-direction: column;
  gap: 25px;
  height: auto;
  background-color: gray;
  color: white;
  padding-top: 20px;
}
.colorLink {
  color: white;
}

input::placeholder {
  color: rgba(0, 0, 0, 0.383);
}
</style>