<template>
  <div class = "nav">
    <a href="#"> Home </a>
    <a href="#"> About Us </a>
    <a href="#"> Login </a>
    <a href="#"> Help </a>
 </div>

  <div class = "image">
     <img :src="require('./images/property.jpg')"/>
  </div>
</template>

<script>

export default {
  name: 'HomeForever',
  props: {
    msg: String
  }
}
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.name {
  display: flex;
  align-items: center;
  justify-content: center;
  vertical-align: middle;
  width: 100vw;
  height: calc(100vh - 60px);
}
.letter {
  margin: .8%;
  filter: drop-shadow(0px 0px 7px rgba(150, 150, 150, .7));
}
.letter-image {
  width: 100%;
}
.menu {
  display: flex;
  align-items: center;
  justify-content: space-around;
  margin-top: 10px;
  height: 60px;
}
.menu-item {
  flex: 1;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
}
.menu-text{
  font-size: 20px;
  color: #818181;
  cursor: pointer;
  padding: 10px;
  border-bottom: 2px solid #080808;
  width: fit-content;
}
.menu-text:hover {
  border-bottom: 2px solid #c278ff;
}
.menu-center {
  font-size: 36px;
  color: #EAEAEA;
}
.nav {
  height: 60px;
  width: 99vw;
  border: 3px solid #E3E3E3;
  font-size: 20px;
  overflow: hidden;
  background-color: #ff9a8a;
  text-align: left;
}
.nav a{
  float: left;
  color: #FFFFFF;
  padding: 20px 35px;
}
</style>