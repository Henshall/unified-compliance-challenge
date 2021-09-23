<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Owners</div>

                    <div class="card-body">
                        <avg-address-car-component></avg-address-car-component>
                        <owner-table-component></owner-table-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import AvgAddressCarComponent from "./avgs/AvgAddressCarComponent.vue";
export default {
  components: { AvgAddressCarComponent },

}
</script>
