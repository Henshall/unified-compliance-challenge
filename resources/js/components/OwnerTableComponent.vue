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

    <ModalComponent />
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
          label: "First Name",
          field: "first_name",
          headerAlign: "left",
          align: "left",
        },
        {
          label: "Last Name",
          field: "last_name",
          headerAlign: "left",
          align: "left",
        },
        {
          label: "Addresses",
          headerAlign: "left",
          align: "left",
          interpolate: true,
          representedAs: (r) => {
            return r.addresses.length ? r.addresses.length : 0;
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
      id: "",
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
    showOwners() {
      axios.get("/owner").then((res) => {
        this.rows = res.data.map((o) => ({ ...o, type: "owner" }));
      });
    },
    deleteData() {
      try {
        axios.delete(`/owner/${this.id}`).then((res) => {
          this.showOwners();
        });
      } catch (e) {
        this.loading = false;
      }
    },
  },
  created() {
    this.showOwners();
  },
};
</script>
