<template>
  <div class="d-flex flex-column">
    <div class="p-2 gray-text-color font-montserrat mt-3">
      <h5>
        <ul>
          <li v-for="item in itemsById" :key="item.name">
            {{ item.name }}
          </li>
        </ul>
      </h5>
    </div>
    <div class="p-2 mb-2">
      <img src="../../../../public/images/homepage/LogoCompany.png" />
    </div>
    <div
      class="p-2 gray-text-color font-montserrat-thin font-weight-bold w-50 mt-2"
    >
      [Straatnaam] [Huisnr.] [Postcode XX] [Woonplaats] [Provincie], [Land]
    </div>
    <div class="p-2 gray-text-color font-montserrat-thin font-weight-bold">
      [website url]
    </div>
    <div class="p-2 gray-text-color font-montserrat-regular">
      Neem contact op met deze aanbieder via:
    </div>
    <div class="p-2 flex-lg-row d-flex justify-content-lg-around">
      <div class="">
        <a href="tel:1234567890">
          <img
            src="../../../../public/images/homepage/Telefoon.png"
            alt="button"
            title="submit"
          />
        </a>
      </div>
      <div>
        <a href="mailto:EMAILADDRESS">
          <img
            src="../../../../public/images/homepage/e-mail.png"
            alt="button"
            title="submit"
          />
        </a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'SearchCompaniesTable',
  props: {
    companyTitle: {
      type: String,
      required: false,
      default: () => ''
    },
    companyAddress: {
      type: String,
      required: false,
      default: () => ''
    },
    companyPhone: {
      type: String,
      required: false,
      default: () => ''
    },
    companyUrl: {
      type: String,
      required: false,
      default: () => ''
    },
    companyMainBrands: {
      type: String,
      required: false,
      default: () => ''
    },
    companyInventory: {
      type: String,
      required: false,
      default: () => ''
    }
  },
  data() {
    return {
      messages: ['hello', 'vue', 'js'],
      shoppingItems: [
        { name: 'apple', price: '10' },
        { name: 'orange', price: '12' }
      ],
      columns: ['company_name']
    }
  },
  computed: {
    itemsById: function() {
      return this.shoppingItems.filter(function(item) {
        return item.price == 10
      })
    }
  }
}
</script>
