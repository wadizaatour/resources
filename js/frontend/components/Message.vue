<template>
  <div>
    <span style="cursor: pointer" :title="message">Stap {{ index }}</span>
  </div>
</template>
<script>
export default {
  props: {
    index: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      message: 'Finish this step to be able to go to stap ' + this.index
    }
  }
}
</script>
