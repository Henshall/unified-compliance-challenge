  
<template>
   <div class="row col-md-12">
  

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
  components: {  },
  data() {
    return {
      item: {},
      loading: true,
    };
  },
  computed: {
     carsAverage() {
        return this.item.carsAverage ? Math.round(this.item.carsAverage) : 0;
     },

  },
  methods: {
    getAverage() {
      try {
        
        axios.get(`/addresses-average`).then(
           (res)=> {
            this.item = res.data;
            
          }
        );
      } catch (e) {
        this.loading = false;
      }
    },
  },

  created() {
    this.getAverage();
  },
};
</script>