<template>
  <div>
    <div class="row mb-5 ps-rl-mb">
      <div class="col-lg-6 col-md-5">
        <input
          name="lpn"
          maxlength="8"
          class="plate-input-parts img-input-r"
          v-model="lpn"
        />
      </div>
      <div class="col-lg-6 col-md-6">
        <a href="">
          <img
            src="/images/Ophalen.png"
            alt="button"
            class="blue-button-mobile size-button"
            ref="bigBlue"
            @click="getLP"
          />
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="make">
            {{ $t('forms.request.make') }} *
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <select
            name="make"
            id="make"
            class="form-control light-gray-background request-input"
            v-model="lp.make_id"
            @change="onChangeMake"
            required
          >
            <option :value="null" disabled selected>
              {{ $t('labels.account.cars.selectBrand') }}
            </option>
            <option
              v-for="(option, index) in makes"
              :value="index"
              :key="index"
            >
              {{ option }}
            </option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="model">
            {{ $t('forms.request.model') }} *
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <select
            name="model"
            id="model"
            v-model="lp.model_id"
            class="form-control light-gray-background request-input"
            @change="onChangeType"
            required
          >
            <option
              v-for="(option, index) in models"
              :key="index"
              :value="index"
            >
              {{ option }}
            </option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div>
          <label
            class="gray-text-color font-montserrat-regular"
            for="chassis_nr"
          >
            {{ $t('forms.request.chassisNumber') }}
          </label>
        </div>
        <div
          class="form-group light-gray-background brd3"
          style="margin-left:-11px"
        >
          <input
            type="text"
            name="chassis_nr"
            id="chassis_nr"
            class="form-control light-gray-background request-input"
          />
        </div>
      </div>
      <div class="col-md-3">
        <div>
          <label
            class="gray-text-color font-montserrat-regular"
            for="build_year"
          >
            {{ $t('forms.request.constructionYear') }} *
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <select
            name="build_year"
            id="build_year"
            class="form-control light-gray-background request-input"
            v-model="lp.build_year"
            required
          >
            <option :value="option" :key="option.id" v-for="option in years">
              {{ option }}
            </option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div>
          <label
            class="gray-text-color font-montserrat-regular w-120"
            for="build_month"
          >
            {{ $t('forms.request.constructionMonth') }}
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <select
            name="build_month"
            id="build_month"
            class="form-control light-gray-background request-input"
            v-model="lp.build_month"
          >
            <option :value="option" :key="option.id" v-for="option in months">
              {{ option }}
            </option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="type">
            {{ $t('forms.request.type') }} *
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <select
            name="type"
            id="type"
            v-model="lp.type_id"
            class="form-control light-gray-background request-input"
            required
          >
            <option
              v-for="(option, index) in types"
              :key="index"
              :value="index"
            >
              {{ option }}
            </option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="doors">
            {{ $t('forms.request.doors') }}
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <select
            name="doors"
            id="doors"
            class="form-control light-gray-background request-input"
            v-model="lp.doors"
          >
            <option value="" disabled selected>-</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="gear">
            {{ $t('forms.request.gear') }}
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <select
            name="gear"
            id="gear"
            class="form-control light-gray-background request-input"
            v-model="gearBox"
          >
            <option value="" disabled selected>-</option>
            <option value="4">{{ $t('forms.request.gear_val_1') }}</option>
            <option value="5">{{ $t('forms.request.gear_val_2') }}</option>
            <option value="6">{{ $t('forms.request.gear_val_3') }}</option>
            <option value="Automaat Overdrive">
              {{ $t('forms.request.gear_val_4') }}
            </option>
            <option value="DSG">{{ $t('forms.request.gear_val_5') }}</option>
            <option value="Semi Automaat">
              {{ $t('forms.request.gear_val_6') }}
            </option>
          </select>
        </div>
      </div>
      <div class="col-md-2">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="power">
            {{ $t('forms.request.power') }}
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <input
            type="text"
            name="power"
            id="power"
            class="form-control light-gray-background request-input"
            :value="lp.kw"
          />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="drive">
            {{ $t('forms.request.drive') }}
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <select
            name="drive"
            id="drive"
            class="form-control light-gray-background request-input"
            v-model="lp.drive"
          >
            <option
              v-for="(option, index) in drives"
              :key="index"
              :value="index"
            >
              {{ option }}
            </option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="fueltype">
            {{ $t('forms.request.fueltype') }} *
          </label>
        </div>
        <div class="form-group light-gray-background brd3">
          <select
            name="fueltype"
            id="fueltype"
            class="form-control light-gray-background request-input"
            v-model="lp.fueltype_id"
            required
          >
            <option
              v-for="(option, index) in fueltypes"
              :key="index"
              :value="index"
            >
              {{ option }}
            </option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>
<script src="../../assets/js/car.js"></script>
