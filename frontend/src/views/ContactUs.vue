<template>
  <!-- <div class="gen" style="margin-top: 70px">
    <div>
      <h1>Contact Us</h1>
      <img src="../assets/deathnoteContactUs.jpg" alt="" />
    </div>
    <div class="formContactUs">
      <form @submit.prevent="register" style="width: 500px">
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            v-model="firstName"
            placeholder="FirstName"
          />
        </div>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            v-model="LastName"
            placeholder="LastName"
          />
        </div>
        <div class="form-group">
          <input
            type="email"
            class="form-control"
            v-model="email"
            placeholder="Email"
          />
        </div>
        <div class="form-group">
          <input
            type="password"
            class="form-control"
            placeholder="Password"
            v-model="password"
          />
        </div>

        <input
          type="submit"
          value="Submit"
          class="btn btn-primary btn-block mt-3"
        />
      </form>
    </div>
  </div> -->
  <div>
    <div class="contact-container">
      <div class="left-col">
        <img class="logo" src=""  />
      </div>
      <div class="right-col">
        <div class="theme-switch-wrapper">
          <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" @change="darkMode" />
            <div class="slider round"></div>
          </label>
          <div class="description">Dark Mode</div>
        </div>

        <h1>Contact us</h1>

        <form
          id="contact-form"
          method="post"
          style="
            margin-top: 140px;
            display: flex;
            flex-direction: column;
            gap: 20px;
          "
          @submit.prevent="contactus"
        >
          <input
            type="text"
            id="name"
            v-model="fullname"
            placeholder="Your Full Name"
            required
          />

          <input
            type="email"
            id="email"
            v-model="email"
            placeholder="Your Email Address"
            required
          />

          <textarea
            rows="6"
            placeholder="Your Message"
            id="message"
            v-model="message"
            required
          ></textarea>
          <!--<a href="javascript:void(0)">--><button
            type="submit"
            id="submit"
            name="submit"
             style="width: 100%; display: flex; justify-content: flex-end"
          >
            Send</button
          ><!--</a>-->
        </form>
        <div id="error"></div>
        <div id="success-msg"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ContactUs",
  data()
  {
    return {
      fullname : "",
      email : "",
      message : "",
    }
  },
  methods: {
    darkMode(e) {
      let dark = document.querySelector(".contact-container");
      e.target.checked
        ? dark.setAttribute("id", "darkMode")
        : dark.removeAttribute("id");
    },
    async contactus()
    {
      await fetch("http://localhost/fr/ContactUsC/insert",{
        method: "POST",
        headers: {
          "Content-Type" : "application/json"
        },
        body: JSON.stringify({
          fullname : this.fullname,
          email: this.email,
          message: this.message
        })
      })
    }
  },
};
</script>

<style scoped>

#darkMode {
  background-color: black;
  color: white;
}
:root {
  --primary-color: #010712;
  --secondary-color: #818386;
  --bg-color: #fcfdfd;
  --button-color: #3b3636;
  --h1-color: #3f444c;
}

[data-theme="dark"] {
  --primary-color: #fcfdfd;
  --secondary-color: #818386;
  --bg-color: #010712;
  --button-color: #818386;
  --h1-color: #fcfdfd;
}

* {
  margin: 0;
  box-sizing: border-box;
  transition: all 0.2s ease-in-out;
}

.contact-container {
  display: flex;
  width: 100vw;
  height: 100vh;
  background: var(--bg-color);
}

.left-col {
  width: 45vw;

  background-image: url("../assets/deathnoteContactUs.png");

  background-size: contain;
  background-repeat: no-repeat;

  background-position: center;
}

.logo {
  width: 10rem;
  padding: 1.5rem;
}

.right-col {
  background: var(--bg-color);
  width: 50vw;
  height: 100vh;
  padding: 5rem 3.5rem;
}

h1,
label,
button,
.description {
  font-family: "Jost", sans-serif;
  font-weight: 400;
  letter-spacing: 0.1rem;
}

h1 {
  color: var(--h1-color);
  text-transform: uppercase;
  font-size: 2.5rem;
  letter-spacing: 0.5rem;
  font-weight: 300;
}

p {
  color: var(--secondary-color);
  font-size: 0.9rem;
  letter-spacing: 0.01rem;
  width: 40vw;
  margin: 0.25rem 0;
}

label,
.description {
  color: var(--secondary-color);
  text-transform: uppercase;
  font-size: 0.625rem;
}

form {
  width: 31.25rem;
  position: relative;
  margin-top: 2rem;
  padding: 1rem 0;
}

input,
textarea,
label {
  width: 40vw;
  display: block;
}

p,
placeholder,
input,
textarea {
  font-family: "Helvetica Neue", sans-serif;
}

input::placeholder,
textarea::placeholder {
  color: var(--primary-color);
}

input,
textarea {
  color: var(--primary-color);
  font-weight: 500;
  background: var(--bg-color);
  border: none;
  border-bottom: 1px solid var(--secondary-color);
  padding: 0.5rem 0;
  margin-bottom: 1rem;
  outline: none;
}

textarea {
  resize: none;
}

button {
  text-transform: uppercase;
  font-weight: 300;
  background: var(--button-color);
  color: var(--bg-color);
  width: 10rem;
  height: 2.25rem;
  border: none;
  border-radius: 2px;
  outline: none;
  cursor: pointer;
}

input:hover,
textarea:hover,
button:hover {
  opacity: 0.5;
}

button:active {
  opacity: 0.8;
}

/* Toggle Switch */

.theme-switch-wrapper {
  display: flex;
  align-items: center;
  text-align: center;
  width: 160px;
  position: absolute;
  top: 0.5rem;
  right: 0;
  margin-top: 78px;
}

.description {
  margin-left: 1.25rem;
}

.theme-switch {
  display: inline-block;
  height: 34px;
  position: relative;
  width: 60px;
}

.theme-switch input {
  display: none;
}

.slider {
  background-color: #ccc;
  bottom: 0;
  cursor: pointer;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: 0.4s;
}

.slider:before {
  background-color: #fff;
  bottom: 0.25rem;
  content: "";
  width: 26px;
  height: 26px;
  left: 0.25rem;
  position: absolute;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: var(--button-color);
}

input:checked + .slider:before {
  transform: translateX(26px);
}

.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

#error,
#success-msg {
  width: 40vw;
  margin: 0.125rem 0;
  font-size: 0.75rem;
  text-transform: uppercase;
  font-family: "Jost";
  color: var(--secondary-color);
}

#success-msg {
  transition-delay: 3s;
}

@media only screen and (max-width: 950px) {
  .logo {
    width: 8rem;
  }
  h1 {
    font-size: 1.75rem;
  }
  p {
    font-size: 0.7rem;
  }
  input,
  textarea,
  button {
    font-size: 0.65rem;
  }
  .description {
    font-size: 0.3rem;
    margin-left: 0.4rem;
  }
  button {
    width: 7rem;
  }
  .theme-switch-wrapper {
    width: 120px;
  }
  .theme-switch {
    height: 28px;
    width: 50px;
  }

  .theme-switch input {
    display: none;
  }

  .slider:before {
    background-color: #fff;
    bottom: 0.25rem;
    content: "";
    width: 20px;
    height: 20px;
    left: 0.25rem;
    position: absolute;
    transition: 0.4s;
  }
  input:checked + .slider:before {
    transform: translateX(16px);
  }

  .slider.round {
    border-radius: 15px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
}
/* .gen {
  display: flex;
  width: 80%;
  margin: auto;
  height: 90vh;
  align-items: center;
}
img { 
    height: 525px;
    max-width: 701px;
}
.formContactUs {
  margin: auto;
  margin-left: 0px;
  height: 527px;
  margin-top: 176px;
  background-color: gainsboro;
}
form {
  width: 500px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 100%;
  padding: 9px;
} */
</style>