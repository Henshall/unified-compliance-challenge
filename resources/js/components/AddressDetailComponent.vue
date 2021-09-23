 <template>
  <div class="row">
    <div class="col-md-12">
      <hr />
      <b>Addresss Detail</b>
      <hr />
    </div>

    <address-component :addresses="address"></address-component>

    <div class="col-md-12">
      <hr />
      <b>Cars</b>
      <hr />
    </div>
    <div class="row col-md-12" v-for="car in address.cars" :key="car.id">
      <div class="col-md-12">
        <hr />
      </div>

      <car-component :car="car"></car-component>
    </div>

    <div class="col-md-12">
      <hr />
      <b>Owner</b>
      <hr />
    </div>
    <div class="col-md-6">
      {{ fullName }}
    </div>
  </div>
</template>
<script>
export default {
  components: {},
  data() {
    return {
      address: {},
      loading: true,
    };
  },
  computed: {
    fullName() {
      if (this.address.owners) {
        return (
          this.address.owners.first_name + " " + this.address.owners.last_name
        );
      }
    },
  },
  methods: {
    showAddressDetail() {
      try {
        const id = this.$route.params.id;
        axios.get(`/address/${id}`).then(
           (res) => {
            this.address = res.data.address;
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
