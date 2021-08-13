<template>
  <div class="gen" style="margin-top: 71px">
    <div class="navBar">
      <span
        ><router-link
          to="/Dashboard"
          style="color: white !important; text-decoration: none"
          >Dashboard</router-link
        ></span
      >
      <span
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
      <span
        ><router-link
          to="/DisplayAnimes"
          style="color: white !important; text-decoration: none"
          >Display Animes</router-link
        ></span
      >
      <span
        ><router-link
          to="/ContactUsMessages"
          style="color: white !important; text-decoration: none"
          >Contact Us Messages</router-link
        ></span
      >
    </div>
    <div class="container-fluid">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Messages</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="d in data" :key="d.id">
            <td>{{d.fullname}}</td>
            <td>{{d.email}}</td>
            <td>{{d.message}}</td>
            <td><button class="btn btn-primary">Reply</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "ContactUsMessages",
  data()
  {
    return {
      data: []
    }
  },
  methods: {
    async getMessages()
  {
    let resp = await fetch("http://localhost/fr/ContactUsC/readAll",{
      method: "GET",
      headers: {
        "Content-Type" : "application/json"
      }
    })

    this.data = await resp.json()
    console.log(this.data);
  }
  }
  ,
  mounted()
  {
    this.getMessages()
  }
};
</script>


<style scoped>
.gen {
  width: 100%;
  height: calc(100vh - 71px);
  display: flex;
  flex-direction: row;
}
.navBar {
  width: 300px;
  display: flex;
  flex-direction: column;
  gap: 25px;
  height: auto;
  background-color: gray;
  color: white;
  padding-top: 20px;
}
</style>