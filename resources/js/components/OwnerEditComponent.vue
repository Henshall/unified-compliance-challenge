 <template>
  <div class="row">
    <div class="col-md-6 mt-2">First Name</div>
    <div class="col-md-6 mt-2">
      <input
        type="text"
        placeholder="First Name"
        class="form-control"
        v-model="owner.first_name"
      />
    </div>

    <div class="col-md-6 mt-2">Last Name</div>
    <div class="col-md-6 mt-2">
      <input
        type="text"
        placeholder=""
        class="form-control"
        v-model="owner.last_name"
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
      owner: {},
      loading: true,
    };
  },

  methods: {
    showOwnerDetail() {
      try {
        const id = this.$route.params.id;
        axios.get(`/owner/${id}`).then(
           (res) =>{
            this.owner = res.data.owner;
          }
        );
      } catch (e) {
        this.loading = false;
      }
    },

    updateDetail() {
      const id = this.$route.params.id;
      axios.put(`/owner/${id}`, this.owner).then((response) => {
         this.$router.push('/owners');
      });
    },
  },

  created() {
    this.showOwnerDetail();
  },
};
</script>
