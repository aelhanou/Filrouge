<template>
  <div class="gen" style="margin-top: 71px; transition: 0.5s">
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
    <div
      class="container-fluid removeBar"
      style="min-width:52%; padding: 5px; background-color: #d7d7d"
    >
      <table class="table-responsive table-striped">
        <thead>
          <tr>
            <th>title</th>
            <th>Created at</th>
            <th>Status</th>
            <th>TheBeginningOfShow</th>
            <th>description</th>
            <th>genre</th>
            <th>image</th>
            <th>numberOfEpisodes</th>
            <th>timeOfEpisode</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="dt in data" :key="dt.id">
            <td>{{ dt.title }}</td>
            <td>{{ dt.Created_at }}</td>
            <td>{{ dt.Status }}</td>
            <td>{{ dt.TheBeginningOfShow }}</td>
            <td>
              <p class="desc" style="overflow-y: scroll; height: 90px">
                {{ dt.description }}
              </p>
            </td>
            <td>{{ dt.genre }}</td>
            <td>
              <img
                width="40px"
                :src="require('../assets/' + dt.image)"
                alt=""
              />
            </td>
            <td>{{ dt.numberOfEpisodes }}</td>
            <td>{{ dt.timeOfEpisode }}</td>
            <td>
              <div class="d-flex" style="gap: 10px">
                <button @click.prevent="Delete(dt.id)" class="btn btn-danger">
                  Delete
                </button>
                <button @click.prevent="edit(dt.id)" class="btn btn-primary">
                  Edit
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <nav
        aria-label="Page navigation example"
        style="position: absolute; top: 704px; right: 39px"
      >
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" @click="prev">Previous</a>
          </li>
          <li v-for="id in dataId" :key="id" class="page-item" @click="yyy(id)">
            <a class="page-link" href="#">{{ id }}</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" @click="next">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  name: "DisplayAnimes",
  data() {
    return {
      data: [],
      dataId: null,
      idPagination: 5,
      role : ""
    };
  },
  methods: {
    prev() {
      if (
        this.idPagination > 5 &&
        this.idPagination < this.dataIdBeforeDevide
      ) {
        this.idPagination -= 5;
        this.readAllAnimes();
      } else {
        this.idPagination = this.dataIdBeforeDevide - 1;
        this.readAllAnimes();
      }
      console.log(this.dataIdBeforeDevide);
    },
    next() {
      if (
        this.idPagination >= 5 &&
        this.idPagination < this.dataIdBeforeDevide - 1
      ) {
        this.idPagination += 5;
        this.readAllAnimes();
      } else {
        this.idPagination = 5;
        this.readAllAnimes();
      }
      console.log(this.idPagination);
    },
    yyy(id) {
      this.idPagination = id * 5;
      this.readAllAnimes();
    },
    async readAllid() {
      let resp = await fetch("http://localhost/fr/AnimeC/readAll", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
      });
      let data = await resp.json();
      this.dataIdBeforeDevide = parseInt(data.length);
      this.dataId = Math.floor(parseInt(data.length) / 5);
    },
    async readAllAnimes() {
      let resp = await fetch("http://localhost/fr/AnimeC/readA", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          pagination: this.idPagination,
        }),
      });
      this.data = await resp.json();
    },
    async Delete(id) {
      await fetch("http://localhost/fr/AnimeC/delete", {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
        }),
      });
      this.readAllAnimes();
    },
    async edit(id) {
      await fetch("http://localhost/fr/AnimeC/update", {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id,
        }),
      });
      this.readAllAnimes();
    },
  },
  created() {
    this.role = localStorage.getItem('role') == "admin"
    this.readAllAnimes();
    this.readAllid();
  },
};
</script>


<style scoped>
.removeBar::-webkit-scrollbar {
  display: none;
}
td {
  color: black;
}
.desc::-webkit-scrollbar {
  display: none;
}
.gen {
  width: 100%;
  /* height: calc(100vh - 71px); */
  overflow: hidden;
  display: flex;
  flex-direction: row;
}
.navBar {
  min-width: 300px;
  display: flex;
  flex-direction: column;
  gap: 25px;
  height: 92vh;
  background-color: gray;

  padding-top: 20px;
}
</style>