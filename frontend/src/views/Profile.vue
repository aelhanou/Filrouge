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
    <div class="content" style="width: 100%">
      <div class="container-fluid" style="width: 100%">
        <div class="main-body">
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div
                    class="d-flex flex-column align-items-center text-center;"
                  >
                    <div
                      style="object-fit: cover; height: 200px; overflow: hidden"
                    >
                      <img
                        v-if="d.image != 'empty'"
                        :src="require('../assets/' + d.image)"
                        alt="Admin"
                        class="rounded-circle"
                        style="height: 100%"
                      />
                      <img
                        v-else
                        src="https://bootdey.com/img/Content/avatar/avatar6.png"
                        alt="Admin"
                        class="rounded-circle p-1 bg-primary"
                        style="height: 100%"
                      />
                    </div>
                    <div class="mt-3">
                      <h4>{{ data.firstName }} {{ data.LastName }}</h4>
                      <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">
                        Bay Area, San Francisco, CA
                      </p>-->
                      <div class="form-group">
                        <input
                          type="file"
                          accept="image/*"
                          class="form-control"
                          id="exampleInputPassword1"
                          @change="onFileChange"
                        />
                      </div>
                      <button
                        v-if="d.image == 'empty'"
                        @click.prevent="InsertImageProfile"
                        class="btn btn-primary"
                      >
                        Insert Image
                      </button>
                      <button
                        v-else
                        @click.prevent="UpdateImageProfile"
                        class="btn btn-primary"
                      >
                        Change Image
                      </button>
                      <!-- <button class="btn btn-outline-primary">Message</button>  -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li
                    class="
                      list-group-item
                      d-flex
                      justify-content-between
                      align-items-center
                      flex-wrap
                    "
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-globe mr-2 icon-inline"
                      >
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path
                          d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"
                        ></path></svg
                      >Website
                    </h6>
                    <span class="text-secondary">https://bootdey.com</span>
                  </li>
                  <li
                    class="
                      list-group-item
                      d-flex
                      justify-content-between
                      align-items-center
                      flex-wrap
                    "
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-github mr-2 icon-inline"
                      >
                        <path
                          d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"
                        ></path></svg
                      >Github
                    </h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li
                    class="
                      list-group-item
                      d-flex
                      justify-content-between
                      align-items-center
                      flex-wrap
                    "
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="
                          feather feather-twitter
                          mr-2
                          icon-inline
                          text-info
                        "
                      >
                        <path
                          d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                        ></path></svg
                      >Twitter
                    </h6>
                    <span class="text-secondary">@bootdey</span>
                  </li>
                  <li
                    class="
                      list-group-item
                      d-flex
                      justify-content-between
                      align-items-center
                      flex-wrap
                    "
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="
                          feather feather-instagram
                          mr-2
                          icon-inline
                          text-danger
                        "
                      >
                        <rect
                          x="2"
                          y="2"
                          width="20"
                          height="20"
                          rx="5"
                          ry="5"
                        ></rect>
                        <path
                          d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"
                        ></path>
                        <line
                          x1="17.5"
                          y1="6.5"
                          x2="17.51"
                          y2="6.5"
                        ></line></svg
                      >Instagram
                    </h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li
                    class="
                      list-group-item
                      d-flex
                      justify-content-between
                      align-items-center
                      flex-wrap
                    "
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="
                          feather feather-facebook
                          mr-2
                          icon-inline
                          text-primary
                        "
                      >
                        <path
                          d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                        ></path></svg
                      >Facebook
                    </h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                      style="border:none;outline:none;background-color:white;text-align:center;"
                        type="text"
                        id="firstName"
                        disabled
                        v-model="data.firstName"
                      />
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                      style="border:none;outline:none;background-color:white;text-align:center;"
                        type="text"
                        id="LastName"
                        disabled
                        v-model="data.LastName"
                      />
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                      style="border:none;outline:none;background-color:white;text-align:center;width:400px;"
                        type="email"
                        disabled
                        id="email"
                        v-model="data.email"
                      />
                    </div>
                  </div>
                  <hr />

                  <div class="row">
                    <div class="col-sm-12">
                      <a
                        class="btn btn-info "
                        target="__blank"
                        @click.prevent="edit"
                        >Edit</a
                      >
                      <a
                        class="btn btn-info "
                        target="__blank"
                        @click.prevent="Save"
                        style="margin-left:5px;"
                        >Save</a
                      >

                    </div>
                  </div>
                </div>
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
  name: "Profile",
  data() {
    return {
      data: [],
      image: "",
      d: [],
    };
  },
  methods: {
    edit() {
      let email = document.getElementById("email");
      let firstName = document.getElementById("firstName");
      let LastName = document.getElementById("LastName");

      firstName.removeAttribute("disabled")
      email.removeAttribute("disabled")
      LastName.removeAttribute("disabled")
    },
    async Save() {
      let email = document.getElementById("email");
      let firstName = document.getElementById("firstName");
      let LastName = document.getElementById("LastName");

      await fetch("http://localhost/fr/RegisterC/edit", {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id: localStorage.getItem("id"),
          email: email.value,
          firstName: firstName.value,
          LastName: LastName.value
        }),
      });
      firstName.setAttribute("disabled",true)
      LastName.setAttribute("disabled",true)
      email.setAttribute("disabled",true)
      this.userInfo();
    },
    onFileChange() {
      this.image = event.target.files[0];
    },
    async UpdateImageProfile() {
      await fetch("http://localhost/fr/RegisterC/UpdateImageProfile", {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          image: this.image.name,
          id_user: localStorage.getItem("id"),
        }),
      });

      this.readImageProfile();
    },
    async InsertImageProfile() {
      await fetch("http://localhost/fr/RegisterC/InsertImageProfile", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          image: this.image.name,
          id_user: localStorage.getItem("id"),
        }),
      });

      this.readImageProfile();
    },
    async readImageProfile() {
      let resp = await fetch("http://localhost/fr/RegisterC/readImageProfile", {
        method: "POST",
        headers: {
          "Content-Type": "applicaiton/json",
        },
        body: JSON.stringify({
          id_user: localStorage.getItem("id"),
        }),
      });

      this.d = await resp.json();
      console.log(this.d.image);
    },
    async userInfo() {
      let resp = await fetch("http://localhost/fr/RegisterC/read", {
        method: "POST",
        headers: {
          "Content-Type": "applicaiton/json",
        },
        body: JSON.stringify({
          id: localStorage.getItem("id"),
        }),
      });

      this.data = await resp.json();
    },
  },
  created() {
    this.userInfo();
    this.readImageProfile();
  },
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