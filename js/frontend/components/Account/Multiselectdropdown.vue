<template>
  <div>
    <multiselect
      v-model="data_items"
      :tag-placeholder="$t('forms.onboarding.affiliatedWith')"
      :options="options"
      :multiple="true"
      :taggable="true"
      @tag="addTag"
      :value="value"
    >
    </multiselect>
    <input type="hidden" name="affiliated_with" :value="data_items" />
  </div>
</template>
<script>
export default {
  props: {
    items: {
      type: Array,
      default: function() {}
    }
  },
  data() {
    return {
      value: [],
      data_items: [],
      options: ['ARN', 'KZD', 'Stiba']
    }
  },
  mounted() {
    this.data_items = this.items
  },
  methods: {
    addTag(newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000)
      }
      this.options.push(tag)
      this.value.push(tag)
    }
  }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
