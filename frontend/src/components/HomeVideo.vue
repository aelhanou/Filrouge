<template>
  <div class="yo">
    <video
      ref="myvideo"
      :src="video"
      height="100%"
      width="100%"
      autoplay
      type="mp4"
    ></video>
    <div class="wordsuptovideo"
      style="
        width: 100%;
        position: absolute;
        z-index: 99;
        top: 400px;
        display: flex;
        flex-direction: column;
        color: white;
        overflow-x: hidden;
        gap: 20px;
      "
    >
      <h1
        style="
          width: 100%;
          display: flex;
          margin-left: 50px;
          color: white;
          font-size: 120px;
          font-weight: 900;
        "
      >
        One Piece
      </h1>
      <div style="width: 100%; display: flex; margin-left: 80px; color: white">
        <button
          class="btn btn-info"
          style="
            width: 170px;
            height: 50px;
            background-color: transparent;
            margin-right: 12px;
          "
        >
          Play
        </button>
        <button class="btn btn-info">My list</button>
      </div>
      <p
        style="
          width: 50%;
          word-break: break-all;
          margin-left: 74px;
          color: white;
        "
      >
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos architecto
        maxime inventore quibusdam veniam delectus sequi cumque iure nisi
        explicabo, saepe ex necessitatibus eligendi, excepturi temporibus
        tempora dicta rem suscipit.
      </p>
    </div>
  </div>
</template>

<script>
import video from "../assets/vid.mp4";
import debounce from "lodash/debounce";

export default {
  name: "HomeVideo",
  data() {
    return {
      video,
      handleDebouncedScroll: "",
      isUserScrolling: "",
    };
  },
  methods: {
    handleScroll() {
      // Any code to be executed when the window is scrolled
      this.isUserScrolling = window.scrollY < 350;
      // console.log(this.isUserScrolling);
      this.$refs.myvideo.play();
      if (this.isUserScrolling) {
        this.$refs.myvideo.play();
        // myvi.play();
      } else {
        this.$refs.myvideo.pause();
      }
    },
  },
  created() {

      this.handleDebouncedScroll = debounce(this.handleScroll, 100);
      window.addEventListener("scroll", this.handleDebouncedScroll);
    
  },
};
</script>

<style>
.yo {
  clip-path: inset(0px 0px 0px 0px);
}

@media screen and (max-width: 1340px ) {
  .wordsuptovideo {
    top: 345px !important;
  }
}
@media screen and (max-width: 1200px ) {
  .wordsuptovideo {
    top: 293px !important;
  }
}
@media screen and (max-width: 1116px ) {
  .wordsuptovideo {
    top: 250px !important;
  }
}
@media screen and (max-width: 980px ) {
  .wordsuptovideo {
    top: 170px !important;
  }
}

@media screen and (max-width: 980px ) {
  .wordsuptovideo {
    display: none !important;
  }
}
</style>