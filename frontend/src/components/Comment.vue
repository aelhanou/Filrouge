<template>
  <div class="col-lg-8 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4" style="margin:auto;padding:4px;">
    <form @submit.prevent="comments">
      <div class="form-group">
        <h4>Leave a comment</h4>
        <label for="message">Message</label>
        <textarea
          msg
          cols="30"
          rows="5"
          class="form-control"
          style="background-color: black;color:white;"
          v-model="comment"
        ></textarea>
      </div>
      
      <div class="form-group">
        <button type="submit" id="post" class="btn btn-secondary">Post Comment</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
    name : "Comment",
    data(){
        return {
            comment : ""
        }
    },
    methods : {
        async getIdImage(){
          console.log(localStorage.getItem("id"));
            let resp = await fetch("http://localhost/fr/RegisterC/getIdImage",{
                method: "POST",
                headers: {
                    "Content-Type" : "application/json"
                },
                body: JSON.stringify({
                    id_user : localStorage.getItem("id")
                })
            })
            let data = await resp.json()
            localStorage.setItem("id_image",data.id)
            return data;
        }
        ,
        async comments()
        {
            let id = this.$route.params.id
 
            let id_image = await this.getIdImage();
            console.log(id_image.id);
            await fetch("http://localhost/fr/CommentsC/insert",{
                method: "POST",
                headers: {
                    "Content-Type" : "application/json"
                },
                body : JSON.stringify({
                    id_comment_anime : id,
                    comment : this.comment,
                    id_user: localStorage.getItem("id"),
                    id_image_profile: id_image.id
                    
                })
            })
            this.comment = ""

            this.$emit("refreshComments")
        }
    }
};
</script>

<style>
</style>