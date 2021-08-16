<template>
  <div class="colorBackG">
    <b-navbar
      toggleable="lg"
      type="dark"
      variant="info"
      style="
        position: fixed;
        z-index: 99;
        top: 0px;
        left: 0px;
        min-height: 70px;
        width: 100%;
        /* margin: 12px auto; */
        background: transparent;
        /* background-color: rgb(59, 0, 135) !important; */
        background: rgb(2, 0, 36);
        background-color: linear-gradient(
          180deg,
          rgba(2, 0, 36, 1) 0%,
          rgb(255 255 255 / 0%) 100%
        ) !important;
      "
    >
      <b-navbar-brand href="#">GeekAnime</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item href="#"
            ><router-link to="/" style="color: white !important"
              >Home</router-link
            >
          </b-nav-item>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-form v-if="!DisplaySearch(['/'])">
            <b-form-input
              id="inputsearch"
              size="sm"
              class="mr-sm-2"
              placeholder="Search"
            ></b-form-input>
            <b-button
              size="sm"
              class="my-2 my-sm-0"
              type="submit"
              style="color: white !important"
              @click.prevent="inputsearch"
              >Search</b-button
            >
          </b-nav-form>

          <!-- <b-nav-item-dropdown text="Lang" right>
          <b-dropdown-item href="#">EN</b-dropdown-item>
          <b-dropdown-item href="#">ES</b-dropdown-item>
          <b-dropdown-item href="#">RU</b-dropdown-item>
          <b-dropdown-item href="#">FA</b-dropdown-item>
        </b-nav-item-dropdown> -->

          <b-nav-item-dropdown right>
            <!-- Using 'button-content' slot -->
            <template #button-content>
              <em style="outline: none !important"
                ><img
                  v-if="data"
                  :src="require('../assets/' + getImg.image)"
                  alt="ME"
                  style="
                    width: 45px;
                    height: 43px;
                    border-radius: 15px;
                    background-color: white;
                    object-fit: contain;
                    outline: none;
                  "
                />
                <img
                  v-else
                  src="https://bootdey.com/img/Content/avatar/avatar6.png"
                  alt="Anonymous"
                  style="
                    width: 45px;
                    height: 43px;
                    border-radius: 15px;
                    background-color: white;
                    object-fit: contain;
                    outline: none;
                  "
                />
              </em>
            </template>
            <b-dropdown-item v-if="data">{{name.firstName}} {{name.LastName}}</b-dropdown-item>
            <b-dropdown-item v-if="data" href="#"
              ><router-link
                href="#"
                to="/Profile"
                style="color: black !important"
                >Profile
              </router-link>
            </b-dropdown-item>

            <b-dropdown-item v-if="data == ''" href="#"
              ><router-link to="/SignUp" style="color: black !important"
                >Sign Up</router-link
              ></b-dropdown-item
            >
            
            <b-dropdown-item href="#"
              ><router-link to="/ContactUs" style="color: black !important"
                >Contact Us</router-link
              ></b-dropdown-item
            >
            <b-dropdown-item v-if="data == ''" href="#"
              ><router-link to="/SignIn" style="color: black !important"
                >Sign In</router-link
              ></b-dropdown-item
            >
            <b-dropdown-item v-if="data" href="#"
              ><router-link to="/LogOut" style="color: black !important"
                >Log Out</router-link
              ></b-dropdown-item
            >
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      data: localStorage.getItem("token") ? localStorage.getItem("token") : "",
      getImg: [],
      name : ""
    };
  },
  props: {},
  methods: {
    DisplaySearch(arr) {
      for (let i = 0; i < arr.length; i++) {
        if (this.$route.path != arr[i]) {
          return true;
        }
      }
    },
    inputsearch() {
      let inputvalue = document.getElementById("inputsearch");
      let h4 = document.querySelectorAll(".h4Title");

      Array.from(h4).map((e) => {
        if (!e.innerHTML.includes(inputvalue.value)) {
          e.parentElement.parentNode.parentElement.parentElement.style.display =
            "none";
        } else {
          e.parentElement.parentNode.parentElement.parentElement.style.display =
            "block";
        }
      });
    },
    async displayNameofUser()
    {
      let resp = await fetch("http://localhost/fr/RegisterC/read",{
        method: "POST",
        headers: {
          "Content-Type" : "application/json"
        },
        body: JSON.stringify({
          id : localStorage.getItem("id")
        })
      })
      this.name = await resp.json()
    }
    ,
    async getImage() {
      let resp = await fetch("http://localhost/fr/RegisterC/readImageProfile", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id_user: localStorage.getItem("id"),
        }),
      });
      this.getImg = await resp.json();
    },
    takeOut() {
      document.querySelector("nav").classList.add("bg-info");
    },
  },
  created() {
    this.displayNameofUser()
    this.getImage();
    setTimeout(() => {
      this.takeOut();
    }, 1000);
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped >
.navbar-dark .navbar-nav .nav-link {
  color: rgb(255 255 255) !important;
}

h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.bg-info {
  background-color: transparent !important;
  background: linear-gradient(180deg, #000000 0%, rgb(255 255 255 / 0%) 100%);
}
</style>

