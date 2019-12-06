<template>
  <div class="border-0">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group ml-2">
          <label class="gray-text-color font-montserrat-regular" :for="part">
            {{ $t('labels.frontend.request.part') }} *
          </label>
          <div class="form-group brd3">
            <select
              :name="'r[' + index + '][category]'"
              :id="category + index"
              class="form-control light-gray-background arrow-select-position request-input"
              v-model="input.category"
              @change="onchangeCategory"
              required
            >
              <option :value="null" disabled selected>
                {{ $t('labels.account.create.selectCategory') }}
              </option>
              <option
                v-for="(option, index1) in categories"
                :value="index1"
                :key="index1"
              >
                {{ option }}
              </option>
            </select>
          </div>
          <div class="form-group brd3">
            <select
              :name="'r[' + index + '][subcategory]'"
              :id="subcategory + index"
              class="form-control light-gray-background arrow-select-position request-input"
              v-model="input.subcategory"
              @change="onchangeSubCategory"
              required
            >
              <option :value="null" disabled selected>
                {{ $t('labels.frontend.request.subCategory') }}
              </option>
              <option
                v-for="(option, index1) in subcategories"
                :value="index1"
                :key="option.id"
              >
                {{ option }}
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="gray-text-color font-montserrat-regular" :for="sku">
            {{ $t('labels.frontend.request.articleNumber') }}
          </label>
          <input
            type="text"
            :name="'r[' + index + '][sku]'"
            :id="'sku' + index"
            v-model="input.sku"
            class="form-control light-gray-background request-input mb-w-96"
          />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <input
          type="text"
          id="dynamic_attribute"
          :name="'r[' + index + '][attributes][' + attribute + ']'"
          v-for="attribute in attributes"
          :key="attribute"
          :placeholder="attribute"
          class="form-control mt-3 mb-3 light-gray-background request-input mb-w-96"
        />
      </div>
    </div>
    <div class="row">
      <div class="col-9">
        <div class="form-group" style="margin-right:-40px">
          <input
            type="text"
            :name="'r[' + index + '][description]'"
            v-model="input.description"
            class="form-control light-gray-background input-width-mobile request-input"
            placeholder="Toelichting (optioneel)"
          />
        </div>
      </div>
      <input
        :id="'image' + index"
        :name="'r[' + index + '][image]'"
        type="file"
        class="camera-button inputfile"
        :change="input.image"
        accept="image/*"
        @change="onFileChanged"
      />
      <label :for="'image' + index" class="ps-camera-mb">
        <img
          src="../../../../../resources/assets/images/cameraIcon.png"
          alt="Camera icon"
          class="camera-button-position"
        />
      </label>
      <div id="preview" class="d-flex flex-column mt-2 position_0_left">
        <img v-if="url" :src="url" alt="no Image." />
        <button
          v-if="url != null"
          type="button"
          @click="deleteImage()"
          class="btn fa fa-trash btn-default bt-radius"
        ></button>
        <small
          class="gray-text-color font-montserrat-regular"
          v-if="url != null"
        >
          {{ $t('labels.frontend.request.uploaded') }} {{ sizeImage }} MB
        </small>
        <div class="ft-14">
          <label>{{ $t('labels.frontend.request.image') }}</label>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="../../assets/js/part.js"></script>
<style src="../../assets/css/part.css"></style>
