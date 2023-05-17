<template>
  <HomeForever msg="Welcome to Your Vue.js App"/>
</template>

<script>
import HomeForever from './components/HomeForever.vue'

export default {
  name: 'App',
  components: {
    HomeForever
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0px;
}

body{
padding:0;
margin:0;
}
</style>
