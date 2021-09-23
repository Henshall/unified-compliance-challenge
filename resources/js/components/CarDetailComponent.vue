 <template>
  <div class="row">
    
     <div class="row col-md-12" >
     <car-component :car=car></car-component>
     </div>

    <div class="col-md-12">
      <hr />
      <b>Owner Detail</b>
      <hr />
    </div>
    <div class="col-md-6">Name</div>
    <div class="col-md-6">
      {{ fullName }}
    </div>

    <div class="col-md-12" v-if="car.addresses">
      <hr />
      <b>Address</b>
      <hr />
    </div>

    <div class="row col-md-12" v-if="car.addresses">

     <address-component :addresses=car.addresses></address-component>

    </div>
  </div>
</template>
<script>
import CarComponent from './CarComponent.vue';
export default {
  components: { CarComponent },
  data() {
    return {
      car: {},
      loading: true,
    };
  },
  computed: {
    fullName: function () {
      if (this.car.owners) {
        return this.car.owners.first_name + " " + this.car.owners.last_name;
      }
    },
  },
  methods: {
    showCarDetail: function () {
      try {
        const id = this.$route.params.id;
        axios.get(`/car/${id}`).then(
          function (res) {
            this.car = res.data.car;
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
