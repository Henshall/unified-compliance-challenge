 <template>
  <div class="row">
    <div class="col-md-12">
      <hr />
      <b>Address</b>
      <hr />
    </div>

    <div class="col-md-6 mt-2">Address</div>
    <div class="col-md-6 mt-2">
      <input
        type="text"
        placeholder="Make"
        class="form-control"
        v-model="address.address"
      />
    </div>

    <div class="col-md-6 mt-2">City</div>
    <div class="col-md-6 mt-2">
      <input
        type="text"
        placeholder="Make"
        class="form-control"
        v-model="address.city"
      />
    </div>

    <div class="col-md-6 mt-2">Country</div>
    <div class="col-md-6 mt-2">
      <input
        type="text"
        placeholder="Make"
        class="form-control"
        v-model="address.country"
      />
    </div>

    <div class="col-md-6 mt-2">Postal code</div>
    <div class="col-md-6 mt-2">
      <input
        type="text"
        placeholder="Make"
        class="form-control"
        v-model="address.postal_code"
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
      address: {},
      loading: true,
    };
  },

  methods: {
    showAddressDetail() {
      try {
        const id = this.$route.params.id;
        axios.get(`/address/${id}`).then(
          (res) =>{
            this.address = res.data.address;
          }
        );
      } catch (e) {
        this.loading = false;
      }
    },

    updateDetail() {
      const id = this.$route.params.id;
      axios.put(`/address/${id}`, this.address).then((response) => {
        this.$router.push('/addresses');
      });
    },
  },

  created() {
    this.showAddressDetail();
  },
};
</script>
