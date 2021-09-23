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
import CarOwnerDetailComponent from "./CarOwnerDetailComponent";
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
          label: "Make ",
          field: "make",
          headerAlign: "left",
          align: "left",
        },
        {
          label: "Model",
          field: "model",
          headerAlign: "left",
          align: "left",
        },
        {
          label: "Year",
          field: "year",
          headerAlign: "left",
          align: "left",
        },

        {
          label: "Owner Detail",
          headerAlign: "left",
          align: "left",
          component: CarOwnerDetailComponent,
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
    showCars() {
      axios.get("/car").then((res) => {
        this.rows = res.data.map((o) => ({ ...o, type: "car" }));
      });
    },

    deleteData() {
      try {
        axios.delete(`/car/${this.id}`).then((res) => {
          this.showCars();
        });
      } catch (e) {
        this.loading = false;
      }
    },
  },
  created() {
    this.showCars();
  },
};
</script>
