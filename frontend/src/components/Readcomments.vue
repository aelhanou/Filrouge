<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-5 col-md-12 col-12 pb-4">
        <h1>Comments</h1>
        <div v-for="d in data" :key="d.id" style="display: flex; width: 100%">
          <div class="comment mt-4 text-justify float-left" style="width: 100%">
            <div style="display: flex; gap: 20px">
              <img
                :src="require('../assets/' + d.image)"
                alt=""
                class="rounded-circle"
                width="40"
                height="40"
              />
              <h4>{{ d.firstName }} {{ d.LastName }}</h4>
            </div>

            <div
              style="
                width: 100%;
                display: flex;
                justify-content: space-between;
                background-color: rgba(236, 236, 236, 0.58);
                padding: 14px;
                border: 0px solid gray;
                border-radius: 16px;
                margin: 11px;
              "
            >
              <span style="margin-left: 20px">{{ d.comment }}</span>
              <span style="margin-right: 20px">- {{ d.created_at }}</span>
            </div>
            <div
              style="
                display: flex;
                width: 100%;
                justify-content: flex-end;
                margin-right: 4px;
                gap: 10px;
              "
            >
              <select
                v-model="act"
                class="form-control"
                style="
                  width: 120px;
                  appearance: none;
                  // Additional resets for further consistency
                  background-color: transparent;
                  border: none;
                  padding: 0 1em 0 0;
                  margin: 0;

                  font-family: inherit;
                  font-size: inherit;
                  cursor: inherit;
                  line-height: inherit;
                "
              >
                <option value="-1" disabled>Action</option>
                <option :value="JSON.stringify({ action: 'delete', id: d.id })">
                  Delete
                </option>
                <option :value="JSON.stringify({ action: 'edit', id: d.id })">
                  Edit
                </option>
              </select>
            </div>

            <div v-if="currentId === d.id">
              <div
                class="
                  col-lg-8 col-md-5 col-sm-4
                  offset-md-1 offset-sm-1
                  col-12
                  mt-4
                "
                style="margin: auto; padding: 4px"
              >
                <form @submit.prevent="edit(d.id)">
                  <div class="form-group">
                    <h4>Edit Comment</h4>
                    <label for="message">Message</label>
                    <textarea
                      msg
                      cols="30"
                      rows="5"
                      class="form-control"
                      style="background-color: black;color:white;"
                      v-model="dataPopUp.comment"
                    ></textarea>
                  </div>

                  <div class="form-group">
                    <button type="submit" id="post" class="btn btn-secondary">
                      Post Comment
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Readcomments",
  data() {
    return {
      act: -1,
      showPopUp: false,
      dataPopUp: [],
      currentId: null
    };
  },
  props: {
    data: Array,
  },
  methods: {
    doAction() {
      let action = JSON.parse(this.act);
      switch (action.action) {
        case "delete":
          this.Delete(action.id);

          break;
        case "edit":
          this.Get_edit_data(action.id);

          break;

        default:
          break;
      }
    },

    async Delete(id) {
      await fetch("http://localhost/fr/CommentsC/delete", {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
        }),
      });

      this.$emit("refreshComments");
    },
    async getIdImage() {
      let resp = await fetch("http://localhost/fr/RegisterC/getIdImage", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id_user: localStorage.getItem("id"),
        }),
      });
      let data = await resp.json();

      return data;
    },
    async Get_edit_data(id) {
      // this.showPopUp = true;
      this.currentId = id;
      let resp = await fetch("http://localhost/fr/CommentsC/read_Single", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
        }),
      });

      this.dataPopUp = await resp.json();
      console.log(this.dataPopUp);
      //   this.showPopUp = true;
    },
    async edit(id) {
        this.currentId = null;

      let id_image = await this.getIdImage();

      await fetch("http://localhost/fr/CommentsC/update", {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
            id: id,
          id_comment_anime: this.$route.params.id,
          comment: this.dataPopUp.comment,
          id_image_profile: id_image.id,
          id_user: localStorage.getItem("id"),
        }),
      });

    this.dataPopUp = ""
      this.$emit("refreshComments");
      this.act = -1
    },
  },
  watch: {
    act() {
      this.doAction();
    },
  },
};
</script>

<style>
select::-ms-expand {
  display: none;
}

select {
  outline: none;
}
</style>