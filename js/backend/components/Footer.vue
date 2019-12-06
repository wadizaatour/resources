<template>
  <AppFooter>
    <span class="ml-auto">
      <strong>
        <span>Copyright &copy; {{ new Date().getFullYear() }}</span>
        <a href="/" target="_blank">{{ name }}</a>
      </strong>
      . {{ $t('labels.all_rights_reserved') }}
    </span>
  </AppFooter>
</template>

<script>
import AppFooter from '../../vendor/coreui/components/Footer/Footer'

export default {
  name: 'Footer',
  components: {
    AppFooter
  },
  props: {
    name: {
      type: String,
      default: ''
    },
    editorName: {
      type: String,
      default: ''
    },
    editorSiteUrl: {
      type: String,
      default: ''
    }
  }
}
</script>
