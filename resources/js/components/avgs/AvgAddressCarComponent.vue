  
<template>
  <div class="row col-md-12">
    <div class="col-md-3">Average Addresses</div>
    <div class="col-md-9">:
      {{ addressAverage }}
    </div>

    <div class="col-md-3">Average Cars</div>
    <div class="col-md-9">:
      {{ carsAverage }}
    </div>

    <div class="col-md-12">
      <hr />
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      item: {},
      loading: true,
    };
  },
  computed: {
    addressAverage() {
      return this.item.addressAverage
        ? Math.round(this.item.addressAverage)
        : 0;
    },

    carsAverage() {
      return this.item.carsAverage ? Math.round(this.item.carsAverage) : '0';
    },
  },
  methods: {
    showAddressDetail() {
      try {
        axios.get(`/owners-average`).then(
          (res) =>{
            this.item = res.data;
          }
        );
      } catch (e) {
        this.loading = false;
      }
    },
  },

  created() {
    this.showAddressDetail();
  },
};
</script>