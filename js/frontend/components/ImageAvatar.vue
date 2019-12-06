<template>
  <div class="justify-content-center d-flex mt-4 mb-4">
    <div class="card bord-rad-5" style="background-color: rgba(0,0,0,.03);">
      <div class="m-4">
        <div class="preview mt-2">
          <img :src="url" alt="no Image." />
          <button
            type="button"
            class="btn fa fa-trash btn-default bt-radius"
            @click="deleteImage()"
          ></button>
          <div class="text-center">
            <small
              class="gray-text-color font-montserrat-regular"
              v-if="url != null"
            >
              {{ $t('labels.frontend.request.uploaded') }} {{ sizeImage }} MB
            </small>
            <small class="gray-text-color font-montserrat-regular">
              {{ $t('labels.frontend.request.upload') }}
            </small>
          </div>
          <div>
            <input
              id="image"
              name="image"
              type="file"
              class="camera-button inputfile"
              @change="onFileChanged"
            />
            <label for="image">
              <img
                src="../../../assets/images/cameraIcon.png"
                alt="Camera icon"
                style="width: auto; height: 20%; cursor: pointer"
                class="position-cam"
              />
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script src="../assets/js/image-upload.js"></script>
<style scoped>
.preview {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: auto;
}
.preview img {
  width: 100px;
  height: 100px;
  border-radius: 5px;
  border: 1px solid lightgray;
  background-color: white;
}
.camera-button-position {
  margin: 0 !important;
}
</style>
