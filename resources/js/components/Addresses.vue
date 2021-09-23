<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Addresses</div>

                    <div class="card-body">
                        <avg-cars-component></avg-cars-component>

                        <address-table-component></address-table-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AvgCarsComponent from './avgs/AvgCarsComponent.vue'
export default {
  components: { AvgCarsComponent }
  }
</script>
