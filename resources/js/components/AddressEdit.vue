<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Edit Address Details</div>

          <div class="card-body">
            <address-edit-component></address-edit-component>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AddressEditComponent from "./AddressEditComponent.vue";
export default {
  components: { AddressEditComponent },
};
</script>