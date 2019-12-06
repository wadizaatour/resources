<template>
  <hooper :items-to-show="1" :center-mode="true" pagination="no">
    <slide v-for="(photo, index) in photos" :key="index" :index="index">
      <img :src="photo" :alt="'photo[' + index + ']'" />
    </slide>
    <hooper-navigation slot="hooper-addons"></hooper-navigation>
  </hooper>
</template>
<script>
import { Hooper, Slide, Navigation as HooperNavigation } from 'hooper'
import 'hooper/dist/hooper.css'
export default {
  components: {
    Hooper,
    Slide,
    HooperNavigation
  },
  props: {
    photos: {
      type: Array,
      default: null
    },
    count: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      hooperSettings: {
        itemsToShow: 2,
        centerMode: true
      }
    }
  }
}
</script>
<style>
.hooper-slide.is-active.is-current {
  width: 500px;
  align-self: center;
  display: flex;
  justify-content: center;
}
.hooper-slide.is-active.is-current img {
  max-height: 100%;
}
.carouselExampleControls {
  border: 2px solid gray;
}
.hooper {
  height: 100%;
  position: static;
  max-height: 100%;
  max-width: 100%;
}
.hooper-slide.is-current {
  transform: scale(1.2);
}
</style>
