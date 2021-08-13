<template>
  <div style="margin-top: 200px">
    getcount : {{ counter }} <br />
    multiCount * 5 : {{ multiCount }}
    <button @click="increase">click me</button>
    <button @click="insertAfter1second">After 1s </button>
  </div>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";
export default {
  name: "testVuex",
  computed: {
    ...mapGetters(["counter", "getCount"]),
    // counter()
    // {
    //     return this.$store.getters.getCount
    // },
    // getCount()
    // {
    //     return this.$store.getters.getCount
    // },
    multiCount() {
      return this.$store.getters.multiCount(5);
    },
  },
  methods: {
    ...mapMutations(["increase"]),
    insertAfter1second()
    {
        this.$store.dispatch("insertAfter1second")
    }
    // increase() {
    //   return this.$store.commit("increase");
    // },
  },
};
</script>

<style>
</style>