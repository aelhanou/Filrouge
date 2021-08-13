<template>
  <!-- Footer -->
  <div class="footer">
    <div class="social">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
    </div>
    <div class="CopyRight">
      <p>2021: CopyRight By GeekAnime.com</p>
    </div>
  </div>
  <!-- Footer -->
</template>


<script>
export default {
  name: "Footer",
};
</script>

<style scoped>
.footer {
    background-color: white;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin: 70px 0px 5px 0px;
  padding: 20px;
  color: white;
}
.social {
    display: flex;
    flex-direction: row;
    justify-content: center;
    gap: 50px;
   color: gray;  
    padding: 10px;
  margin-bottom: 9px;
  
}
a {
    transform: scale(1.5);
}
.CopyRight {
    color: gray;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    align-content: center;
    background-color: white;    width: 100%;
    height: 100%;
    
}

p {
    margin: 0px;
    padding: 13px;
}

</style>