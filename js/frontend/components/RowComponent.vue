<template>
  <div>
    <ul>
      <li v-for="(input, index) in inputs">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label class="gray-text-color font-montserrat-regular"
                     for="component2">@lang('forms.request.component')
              </label>
              <input placeholder="Onderdeelnaam"
                     class="form-control light-gray-background  request-input"
                     name="component2" id="component2"
                     type="text"
                     v-model="input.part">@{{ input.part }}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="gray-text-color font-montserrat-regular"
                     for="article_number2">@lang('forms.request.articleNumber')
              </label>
              <input class="form-control light-gray-background  request-input"
                     name="article_number2" id="article_number2"
                     type="text"
                     v-model="input.sku">@{{ input.sku }}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-9">
            <div class="form-group"
                 style="margin-right:-40px">
              <input placeholder="Toelichting (optioneel)"
                     class="form-control light-gray-background input-width-mobile request-input"
                     name="explanation1"
                     type="text"
                     v-model="input.description">@{{ input.description }}
            </div>
          </div>
          <div class="col-2 ml-lg-5 ml-md-4">
            <img class=" image-position-mobile image-width-desktop"
                 src="../../../../public/images/cameraIcone.png"
                 v-model="input.image"/>@{{ input.image }}
          </div>
        </div>
        <button @click="deleteRow(index)"
                type="button"
                style="border-radius: 5px;"
                class="btn btn-danger fa fa-trash"></button>
        <hr>
      </li>
    </ul>
    <button @click="addRow"
            type="button"
            style="border-radius: 5px; color: white;font-size: 15px"
            class="btn font-montserrat-regular btn-success btn-plus"
    >Add row
    </button>
  </div>
</template>
<script>
export default {
  data: {
    companies,
      inputs: []
  },
  methods: {
    addRow() {
      this.inputs.push({
        part: '',
        sku: '',
        description: '',
        image: ''
      })
    },
    deleteRow(index) {
      this.inputs.splice(index, 1.0)
    }
  }
}
</script>
