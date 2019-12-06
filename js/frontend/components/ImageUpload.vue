<template>
  <div>
    <input
      id="image"
      name="image"
      type="file"
      class="camera-button ml-3 inputfile"
      accept="image/*"
      @change="onFileChanged"
    />
    <label for="image">
      <img
        src="../../../assets/images/cameraIcon.png"
        alt="Camera icon"
        class="camera-button-position"
      />
    </label>
    <div id="preview" class="d-flex flex-column mt-2">
      <img v-if="url" :src="url" alt="no Image." />
      <button
        v-if="url != null"
        type="button"
        @click="deleteImage()"
        class="btn fa fa-trash btn-default bt-radius"
      ></button>
      <div class="text-center">
        <small
          class="gray-text-color font-montserrat-regular"
          v-if="url != null"
        >
          {{ $t('labels.frontend.request.uploaded') }} {{ sizeImage }} MB
        </small>
      </div>
    </div>
  </div>
</template>
<script src="../assets/js/image-upload.js"></script>
