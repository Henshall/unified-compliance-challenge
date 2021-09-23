 <template>
  <div class="row">
    <div class="col-md-6 mt-2">Make</div>
    <div class="col-md-6 mt-2">
      <input
        type="text"
        placeholder="Make"
        class="form-control"
        v-model="car.make"
      />
    </div>

    <div class="col-md-6 mt-2">Model</div>
    <div class="col-md-6 mt-2">
      <input
        type="text"
        placeholder="Make"
        class="form-control"
        v-model="car.model"
      />
    </div>

    <div class="col-md-6 mt-2">Year</div>
    <div class="col-md-6 mt-2">
      <input
        type="text"
        placeholder="Make"
        class="form-control"
        v-model="car.year"
      />
    </div>

    <div class="col-md-6 mt-2"></div>
    <div class="col-md-6 mt-2">
      <button type="button" @click="updateDetail()" class="btn btn-primary">
        Update
      </button>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      car: {},
      loading: true,
    };
  },
  computed: {
    fullName() {
      if (this.car.owners) {
        return this.car.owners.first_name + " " + this.car.owners.last_name;
      }
    },
  },
  methods: {
    showCarDetail() {
      try {
        const id = this.$route.params.id;
        axios.get(`/car/${id}`).then(
           (res)=> {
            this.car = res.data.car;
          }
        );
      } catch (e) {
        this.loading = false;
      }
    },

    updateDetail() {
      const id = this.$route.params.id;
      axios.put(`/car/${id}`, this.car).then((response) => {
         this.$router.push('/cars');
      });
    },
  },

  created() {
    this.showCarDetail();
  },
};
</script>
