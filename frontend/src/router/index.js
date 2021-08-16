import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import SignUp from "../views/SignUp.vue";
import SignIn from "../views/SignIn.vue";
import AnimeDescription from "../views/AnimeDescription.vue";
import ShowAnime from "../views/ShowAnime.vue";
import Dashboard from "../views/Dashboard.vue";
import InsertAnime from "../views/InsertAnime.vue";
import DisplayAnimes from "../views/DisplayAnimes.vue";
import ContactUsMessages from "../views/ContactUsMessages.vue";
import Profile from "../views/Profile.vue";
import LogOut from "../views/LogOut.vue";
import ContactUs from "../views/ContactUs.vue";
import testVuex from "../views/testVuex.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/SignUp",
    name: "SignUp",
    component: SignUp,
  },
  {
    path: "/SignIn",
    name: "SignIn",
    component: SignIn
  },
  {
    path: "/AnimeDescription/:id",
    name: "AnimeDescription",
    component: AnimeDescription
  },
  {
    path: "/ShowAnime",
    name: "ShowAnime",
    component: ShowAnime
  },
  {
    path: "/Dashboard",
    name: "Dashboard",
    component: Dashboard
  },
  {
    path: "/InsertAnime",
    name: "InsertAnime",
    component: InsertAnime
  },
  {
    path: "/DisplayAnimes",
    name: "DisplayAnimes",
    component: DisplayAnimes
  }
  ,
  {
    path: "/ContactUsMessages",
    name: "ContactUsMessages",
    component: ContactUsMessages
  },
  {
    path: "/Profile",
    name: "Profile",
    component: Profile
  },
  {
    path: "/ShowAnime/:id",
    name: "ShowAnimeId",
    component: ShowAnime,
  },
  {
    path: "/LogOut",
    name: "LogOut",
    component: LogOut
  },
  {
    path: "/ContactUs",
    name: "ContactUs",
    component: ContactUs
  },

  {
    path: "/testVuex",
    name: "testVuex",
    component: testVuex
  }



  // {
  //   path: "/about",
  //   name: "About",
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () =>
  //     import(/* webpackChunkName: "about" */ "../views/About.vue"),
  // },
];




const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});


router.beforeEach((to, from, next) => {
  if (to.name === 'Profile') {
    if (!localStorage.getItem('token')) {
      next({name: "SignIn"});
      return;
    }
  }

  if (to.name === 'DisplayAnimes') {
    if (!localStorage.getItem('token') || localStorage.getItem('role') != 'admin' ) {
      next({name: "SignIn"});
      return;
    }
  }
  if (to.name === 'SignIn') {
    if (localStorage.getItem('token')) {
      next({name: "Home"});
      return;
    }
  }
  if (to.name === 'SignUp') {
    if (localStorage.getItem('token')) {
      next({name: "Home"});
      return;
    }
  }
  if (to.name === 'Dashboard') {
    if (!localStorage.getItem('token')) {
      next({name: "SignIn"});
      return;
    }
  }
  if (to.name === 'InsertAnime') {
    if (!localStorage.getItem('token') || localStorage.getItem('role') != 'admin') {
      next({name: "SignIn"});
      return;
    }
  }
  if (to.name === 'ContactUsMessages') {
    if (!localStorage.getItem('token') || localStorage.getItem('role') != 'admin') {
      next({name: "SignIn"});
      return;
    }
  }

  if (to.name === 'Profile') {
    if (!localStorage.getItem('token')) {
      next({name: "SignIn"});
      return;
    }
  }
  next();

})





export default router;
