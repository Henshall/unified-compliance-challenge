<template>
  <div>
    <bootstrap-4-datatable
      :columns="columns"
      :data="rows"
      :filter="filter"
      :per-page="perPage"
      class="table-bordered"
    ></bootstrap-4-datatable>
    <bootstrap-4-datatable-pager
      v-model="page"
      type="abbreviated"
    ></bootstrap-4-datatable-pager>
    <ModalComponent/>
  </div>
</template>

<script>
import TableButtonsComponent from "./TableButtonsComponent";
import ModalComponent from "./ModalComponent.vue";

export default {
  components: { ModalComponent },
  data() {
    return {
      columns: [
        {
          label: "ID",
          field: "id",
          align: "center",
        },
        {
          label: "Address",
          field: "address",
          headerAlign: "left",
          align: "left",
          interpolate: true,
          representedAs: (r) => {
            return (
              r.address +
              "<br>" +
              r.city +
              "<br>" +
              r.country +
              "<br>" +
              r.postal_code
            );
          },
        },

        {
          label: "Owner",

          headerAlign: "left",
          align: "left",
          interpolate: true,
          representedAs: (r) => {
            return r.owners.first_name + " " + r.owners.last_name;
          },
        },

        {
          label: "Cars",
          headerAlign: "left",
          align: "left",
          interpolate: true,
          representedAs: (r) => {
            return r.cars.length ? r.cars.length : 0;
          },
        },

        {
          label: "Actions",
          headerAlign: "right",
          align: "right",
          component: TableButtonsComponent,
        },
      ],
      rows: [],
      page: 1,
      filter: "",
      perPage: 20,
      loading: true,
    };
  },
  mounted() {
    this.$root.$on("proceedDelete", (value) => {
      this.deleteData();
    });
    this.$root.$on("deleteID", (value) => {
      this.id = value;
    });
  },
  beforeDestroy() {
    this.$root.$off("proceedDelete");
    this.$root.$off("deleteID");
  },
  methods: {
    showAddresses() {
      axios.get("/address").then((res) => {
        this.rows = res.data.map((o) => ({ ...o, type: "address" }));
      });
    },

    deleteData() {
      try {
        axios.delete(`/address/${this.id}`).then((res) => {
          this.showAddresses();
        });
      } catch (e) {
        this.loading = false;
      }
    },
  },
  created() {
    this.showAddresses();
  },
};
</script>
