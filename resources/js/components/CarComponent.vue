  
<template>
   <div class="row col-md-12">
   <div class="col-md-6">Make</div>
    <div class="col-md-6">
      {{ car.make }}
    </div>

    <div class="col-md-6">Model</div>
    <div class="col-md-6">
      {{ car.model }}
    </div>

    <div class="col-md-6">Year</div>
    <div class="col-md-6">
      {{ car.year }}
    </div>
   </div>
   
</template>

<script>
export default {
  props: {
    car: {
      type: Object,
    },
  },
  created() {
    
  },

  methods: {},
};
</script>