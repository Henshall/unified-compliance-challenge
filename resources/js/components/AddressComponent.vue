  
<template>
  <div class="row col-md-12">
    <div class="col-md-6">Address</div>
    <div class="col-md-6">
      {{ addresses.address }}
    </div>

    <div class="col-md-6">City</div>
    <div class="col-md-6">
      {{ addresses.city }}
    </div>

    <div class="col-md-6">Country</div>
    <div class="col-md-6">
      {{ addresses.country }}
    </div>

    <div class="col-md-6">Postal code</div>
    <div class="col-md-6">
      {{ addresses.postal_code }}
    </div>
  </div>
</template>

<script>
export default {
  props: {
    addresses: {
      type: Object,
    },
  },
  created() {},

  methods: {},
};
</script>