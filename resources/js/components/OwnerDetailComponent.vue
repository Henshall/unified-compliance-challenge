 <template>
  <div class="row">
    <div class="col-md-6">Owner</div>
    <div class="col-md-6">
      {{ fullName }}
    </div>

    <div class="col-md-12">
      <hr />
      <b>Cars</b>
      <hr />
    </div>
    <div class="row col-md-12" v-for="car in owner.cars" :key="car.id">
      <div class="col-md-12">
        <hr />
      </div>

      <car-component :car="car"></car-component>
    </div>

    <div class="col-md-12">
      <hr />
      <b>Addresses</b>
      <hr />
    </div>

    <div
      class="row col-md-12"
      v-for="address in owner.addresses"
      :key="address.id"
    >
      <div class="col-md-12">
        <hr />
      </div>

      <address-component :addresses="address"></address-component>
    </div>
  </div>
</template>
<script>
import AddressComponent from "./AddressComponent.vue";
import CarComponent from "./CarComponent.vue";
export default {
  components: { CarComponent, AddressComponent },
  data() {
    return {
      owner: {},
      loading: true,
    };
  },
  computed: {
    fullName: function () {
      if (this.owner) {
        return this.owner.first_name + " " + this.owner.last_name;
      }
    },
  },
  methods: {
    showCarDetail: function () {
      try {
        const id = this.$route.params.id;
        axios.get(`/owner/${id}`).then(
          function (res) {
            this.owner = res.data.owner;
          }.bind(this)
        );
      } catch (e) {
        this.loading = false;
      }
    },
  },

  created() {
    this.showCarDetail();
  },
};
</script>
