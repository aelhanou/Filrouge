<template>
  <div>
    <div class="all">
      <div class="videoMSG">
        <div class="vidmedia" style="height: 140vh">
          <!-- <p>Video</p> -->
          <iframe
            id="DzGif"
            :src="y"
            width="100%"
            height="100%"
            allow="autoplay"
            allowfullscreen
          ></iframe>
        </div>
        <div  v-if="idLocalstorage" class="msg" style="display: flex">
          
            <div
              style="
                width: 50%;
                display: flex;
                flex-direction: column;
                border: 1px solid gray;
                background: gainsboro;
              "
            >
              <div id="getMsg" style="height: 267px; overflow-y: scroll">
                <span
                  style="
                    color: black;
                    display: flex;
                    margin-top: 3px;
                    padding: 7px 0px 3px 22px;
                    background-color: gray;
                  "
                  v-if="readoldMsgsError == 'empty'"
                >
                  no msg
                </span>
                <div
                  v-else
                  v-for="readoldMsg in readoldMsgs"
                  :key="readoldMsg.id"
                >
                  <span
                    style="
                      color: black;
                      display: flex;
                      margin-top: 3px;
                      padding: 7px 0px 3px 22px;
                      background-color: gray;
                    "
                    v-if="readoldMsg.user_id == idLocalstorage"
                  >
                    ME: {{ readoldMsg.msg_content }} -->
                    {{ readoldMsg.msg_time }}
                  </span>
                  <span
                    style="
                      color: black;
                      display: flex;
                      margin-top: 3px;
                      padding: 7px 0px 3px 22px;
                      background-color: yellow;
                    "
                    v-else
                  >
                    {{ readoldMsg.firstName }} {{ readoldMsg.LastName }} :
                    {{ readoldMsg.msg_content }} --> {{ readoldMsg.msg_time }}
                  </span>
                </div>
              </div>

              <div style="display: flex">
                <input
                  type="text"
                  v-model="sendMsg"
                  style="width: 83%; height: 51px"
                />
                <button @click="startchat">click</button>
              </div>
            </div>
            <div style="width: 50%">
              <h1>friends list</h1>
              <div class="users" style="height: 240px; overflow-y: scroll">
                <div
                  v-for="dUser in dataUsers"
                  :key="dUser.id"
                  class="user"
                  style="
                    display: flex;
                    gap: 10px;
                    margin-left: 10px;
                    margin-top: 5px;
                  "
                >
                  <img
                    :src="require('../assets/' + dUser.image)"
                    style="
                      width: 50px;
                      height: 50px;
                      border-radius: 50%;
                      object-fit: contain;
                      background-color: gainsboro;
                      padding: 3px;
                    "
                    alt="first User"
                  />
                  <h3
                    class="ClickToactive"
                    @click.prevent="getIdUser($event, dUser.id)"
                    style="
                      margin-top: 6px;
                      cursor: pointer;
                      width: 251px;
                      display: flex;
                    "
                  >
                    {{ dUser.firstName }} {{ dUser.LastName }}
                  </h3>
                  <span
                    v-if="dUser.connected == '0'"
                    style="
                      width: 12px;
                      height: 12px;
                      border-radius: 50%;
                      background-color: red;
                      margin-top: 10px;
                    "
                  ></span>
                  <span
                    v-else
                    style="
                      width: 12px;
                      height: 12px;
                      border-radius: 50%;
                      background-color: green;
                      margin-top: 10px;
                    "
                  ></span>
                </div>
              </div>
            </div>
          
          
        </div>
        <div
            style="
              width: 100%;
              display: flex;
              height: 100%;
              margin: auto;
              justify-content: center;
              align-items: center;
            "
            v-else
          >
            For Chat with Friends .. You should make account
          </div>
      </div>
      <div class="EpisodesAnimeAndOtherAnime">
        <div class="EpisodesAnime">
          <div class="titleEp">
            <div class="img">
              <img
                :src="require('../assets/' + dataAnime.image)"
                style="
                  width: 100%;
                  margin: 5px 0px;
                  border-raduis: 21px;
                  border-radius: 7px;
                "
                alt="img"
              />
            </div>
            <div class="titleAndDes">
              <h1
                style="
                  display: flex;
                  flex-direction: row;
                  justify-content: space-between;
                  font-size: 21px;
                  color: black;
                  font-family: cursive;
                "
              >
                {{ dataAnime.title }}
                <span style="font-size: 14px; color: black">{{
                  dataAnime.Created_at
                }}</span>
              </h1>
              <p
                class="descAnime"
                style="
                  overflow: scroll;
                  padding: 4px;
                  color: black;
                  border-left: 9px solid #b4b4b4;
                "
              >
                {{ dataAnime.description }}
              </p>
            </div>
          </div>
          <div class="Episodes">
            <div class="EpInfo" v-for="(a,index) in data" :key="a.id">
              <div class="Epvideo">
                <iframe
                  ref="mOver"
                  @mouseover="mouseOver"
                  :src="a.Episodes"
                  frameborder="0"
                  style="width: 193px; height: 117px"
                ></iframe>
              </div>
              <div class="EpdesVideo">
                <h3
                  class="h3Ep"
                  style="font-size: 1rem"
                  @click.prevent="yo(a.Episodes)"
                >
                  Episode {{ index + 1 }}
                </h3>
                <p class="pEp" style="font-size: 0.85rem">description</p>
              </div>
            </div>
          </div>
        </div>
        <div class="DifferentAnime">
          <div
            v-for="dCategory in dataCategory"
            :key="dCategory.id"
            class="dfAnime"
          >
            <div class="difImg">
              <img
                :src="require('../assets/' + dCategory.image)"
                style="height: 183px; border-radius: 7px;width: 142px;"
                alt=""
              />
            </div>
            <div class="difTItleAndDes">
              <h1
                style="
                  font-size: 1.4rem;
                  font-family: cursive;
                  width: 100%;
                  display: flex;
                  margin-left: 14px;
                "
                class="difTtile"
              >
                {{ dCategory.title }}
              </h1>
              <p class="difDesc">
                {{ dCategory.description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import video from "../assets/vid.mp4";
import dragonBallWallpaper from "../assets/dragonBallWallpaper.gif";
export default {
  name: "ShowAnime",
  data() {
    return {
      idLocalstorage: "",
      video,
      sendMsg: "",
      conn: null,
      dragonBallWallpaper,
      data: [],
      FullScreen: "",
      dataUsers: [],
      dataEp: [],
      y: "",
      dataAnime: [],
      readoldMsgs: [],
      hisuserid: "",
      readoldMsgsError: "",
      dataCategory: [],
      dataNmber : 0
    };
  },
  methods: {
    dataNmberFunc()
    {
      return this.dataNmber += 1
    }
    ,
    getIdUser(r, id) {
      let ClickToactive = document.querySelectorAll(".ClickToactive");

      Array.from(ClickToactive).map((e) => {
        e.addEventListener("click", () => {
          e.style.backgroundColor = "red";
        });
        e.style.backgroundColor = "white";
      });
      // Array.from(e.path).map(e=>{
      //   e.addEventListner("click",()=>{
      //      e == e.path[0] ?  e.path[0].style.backgroundColor = "red" : e.path[0].style.backgroundColor = "white"
      //   })

      // })
      this.hisuserid = id;
      this.readoldmsg(id);
    },
    async readoldmsg(id) {
      let resp = await fetch("http://localhost/fr/chatMsgC/read", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          myUserId: localStorage.getItem("id"),
          hisUserId: id,
        }),
      });

      let data = await resp.json();
      this.readoldMsgs = data.msg;
      this.readoldMsgsError = data.error;
      console.log(this.readoldMsgsError);
    },
    async getAllUsers() {
      let resp = await fetch("http://localhost/fr/RegisterC/getAllUsers", {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
      });

      this.dataUsers = await resp.json();
      console.log(this.dataUsers);
    },
    startchat() {
      // if (localStorage.getItem("id_secket")) {
      //   localStorage.removeItem("id_secket");
      // }
      console.log(this.hisuserid);
      let data = {
        msg: this.sendMsg,
        userId: localStorage.getItem("id"),
        hisuserId: this.hisuserid,
      };
      this.conn.send(JSON.stringify(data));
    },
    mouseOver() {
      // console.log("yo");
      //   this.$refs.mOver.play();
    },
    async readAnime() {
      let resp = await fetch("http://localhost/fr/AnimeC/read_single", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id: localStorage.getItem("id_Anime"),
        }),
      });

      this.dataAnime = await resp.json();
      console.log(this.dataAnime.genre);
      await this.getAnimeCategorise(this.dataAnime.genre);
    },
    async getAnimeCategorise(category) {
      let resp = await fetch("http://localhost/fr/AnimeC/readCategorise", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          category: category,
        }),
      });

      this.dataCategory = await resp.json();
      console.log(this.dataCategory);
    },
    async showData() {
      this.read_s();

      let resp = await fetch("http://localhost/fr/EpisodesC/read_single", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id_ep: localStorage.getItem("ep_id"),
        }),
      });
      this.data = await resp.json();
    },
    async read_s() {
      let id = this.$route.params.id;
      let resp = await fetch("http://localhost/fr/EpisodesC/read_s", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
        }),
      });
      this.dataEp = await resp.json();
      // console.log(this.dataEp[0].id_ep);
      localStorage.setItem("ep_id", this.dataEp[0].id_ep);
      this.y = this.dataEp[0].Episodes;
    },
    async yo(src) {
      this.y = src;
    },
    async stylingGif() {
      let DzGif = document
        .querySelector("#DzGif")
        .contentWindow.document.querySelector("body");

      DzGif.style.display = "flex";
      DzGif.style.height = "100%";
      DzGif.style.alignItems = "center";
      DzGif.style.height = "100%";
      DzGif.style.justifyContent = "center";
    },
  },

  async created() {
    this.idLocalstorage = localStorage.getItem("id");
    console.log(this.idLocalstorage);
    this.conn = new WebSocket("ws://localhost:8000");
    this.conn.onopen = function () {
      console.log("Connection established!");
    };

    this.conn.onmessage = function (e) {
      let d = JSON.parse(e.data);
      let textarea = document.getElementById("getMsg");
      if (d.from == "Me") {
        textarea.innerHTML += `<span style="color: black;
            display: flex;
            margin-top:3px;
              padding: 7px 0px 3px 22px;
              background-color: gray;
              border-radius: 17px;" > ${d.from} : ${d.msg} -->${d.dt} </span>`;
        console.log(textarea);
        console.log(d);
      } else {
        textarea.innerHTML += `<span style="color: black;
            display: flex;
            justify-content:flex-end;
            margin-top:3px;
            padding: 7px 0px 3px 22px;
            background-color: yellow;
            border-radius: 17px;"> ${d.from.firstName}-${d.from.LastName} : ${d.msg} -->${d.dt} </span>`;
        console.log(textarea);
        console.log(d);
      }
    };
    this.getAllUsers();
    this.readAnime();
    this.showData();
    this.y = this.dragonBallWallpaper;
    await setTimeout(() => {
      this.stylingGif();
    }, 600);
  },
};
</script>

<style scoped>
.users::-webkit-scrollbar {
  display: none;
}
#getMsg::-webkit-scrollbar {
  display: none;
}
.dfAnime {
  display: flex;
  flex-direction: row;
  background-color: #e0dbdb;
  padding: 10px;
  border-radius: 12px;
}

.h3Ep {
  width: 100%;
  display: flex;
  margin: 4px 0px 3px 0px;
}
.pEp {
  width: 100%;
  display: flex;
  margin: 4px 0px 3px 0px;
}
.EpdesVideo {
  width: 100%;
  display: flex;
  flex-direction: column;
  margin: 9px 0px 0px 18px;
}
.Epvideo {
  width: 200px;
}
.EpInfo {
  height: 128px;
  display: flex;
  flex-direction: row;
  padding: 6px;

  /* border: 1px solid red; */
}
.descAnime::-webkit-scrollbar {
  display: none;
}
.all {
  width: 90%;
  display: flex;
  flex-direction: row;
  /* border: 3px solid red; */
  margin: auto;
  margin-top: 92px;
  height: 90vh;
  gap: 10px;
}

.videoMSG {
  width: 2200px;
  display: flex;
  flex-direction: column;
  /* border: 3px solid yellow; */
}

.img {
  width: 122px;

  /* border: 3px solid red; */
}
.EpisodesAnimeAndOtherAnime {
  width: 100%;
  display: flex;
  flex-direction: column;
  /* border: 3px solid black; */
}
.msg {
  /* border: 3px solid black; */
  height: 100%;
}
.EpisodesAnime {
  height: 54vh;
  display: flex;
  flex-direction: column;
  /* border: 3px solid gray; */
  border-radius: 10px;
  padding: 6px;
  background-color: #b7b7b7;
  color: white;

  /* border: 3px solid green; */
}
.titleEp {
  height: 20vh;
  display: flex;
  flex-direction: row;
  padding: 7px;
  border-radius: 11px;
  background-color: #cac9c9;
  /* border: 3px solid gray; */
}
.titleAndDes {
  width: 100%;
  display: flex;
  flex-direction: column;
  padding: 14px;
  /* border: 3px solid pink; */
}
.Episodes {
  overflow: scroll;
  height: 100%;
  display: flex;
  flex-direction: column;
  margin-top: 20px;
  /* border: 3px solid blue; */
}
.Episodes::-webkit-scrollbar {
  display: none;
}
.DifferentAnime {
  height: 39%;
  display: flex;
  flex-direction: column;
  border: 3px solid gray;
  border-radius: 10px;
  margin-top: 5px;
  overflow-y: scroll;
  padding: 11px;
  background-color: rgb(204, 200, 200);
  gap: 20px;
  /* border: 3px solid orange; */
}
.DifferentAnime::-webkit-scrollbar {
  display: none;
}
.difDesc {
  overflow-y: scroll;
  width: 100%;
  height: 124px;
  word-break: break-all;
  /* text-align: center; */
  padding: 0px 14px;
}
.difDesc::-webkit-scrollbar {
  display: none;
}

@media screen and (max-width: 1200px) {
  .all {
        display: flex;
    flex-wrap: wrap;
       
  }
  .msg {
     max-height: 339px;
  }
  .vidmedia {
     max-height: 655px;
  }
}
/* .Scroll {
  overflow-y: scroll;
  height: 80%;
}

.Scroll::-webkit-scrollbar {
  display: none;
}
.dAnime {
  width: 100%;
}

.DisplayAnime {
  height: 564px;
  display: flex;
  justify-content: center !important;
  margin: auto !important;
  color: rgb(59, 0, 135);
  flex-wrap: wrap;
}
.DisplayEp {
  /* height: 564px; */
/*
}
/*
.EpH1 {
}
.SelectEp {
  background-color: black;
  padding: 10px;
  color: rgb(255 255 255 / 83%);
  height: 562px;
  order: 2;
}
/* video {
  width: 100%;
} */
/*
.vd {
  width: 70%;
  height: auto;
}
iframe {
  width: 100%;
}
.episodes {
  /* width: 300px; */
/*
  display: flex;
  flex-direction: column;
  justify-content: center;

  overflow-y: scroll;
}
/*
.Ep {
  color: rgb(255 255 255 / 83%);
}

.Ep:hover {
  color: black;
  text-decoration: none;
}

.episodes::-webkit-scrollbar {
  display: none;
}
 .container{
    position: relative;
    z-index: 0;
}

.container>.player-buttons{
    background: url('http://cdn1.iconfinder.com/data/icons/iconslandplayer/PNG/64x64/CircleBlue/Play1Pressed.png') center center no-repeat;
    height: 128px;
    left: 50%;
    margin: -64px 0 0 -64px;
    position: absolute;
    top: 50%;
    width: 128px;
    z-index: 1; 
} */
</style>