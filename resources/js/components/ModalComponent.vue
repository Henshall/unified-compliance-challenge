
    <template>
  <div
    class="modal fade"
    id="mediumModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="mediumModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content h-auto">
        <div class="modal-header bg-light text-dark">
          <h5 class="modal-title" id="mediumModalLabel">Delete</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-left">Are you sure you want to delete this item?</p>
        </div>
        <div class="modal-footer bg-white text-dark">
          <button
            type="button"
            data-dismiss="modal"
            class="btn btn-primary color-white"
            @click="deleteItem()"
          >
            Yes
          </button>
          <button
            type="button"
            data-dismiss="modal"
            class="btn btn-light border border-secondary color-dark"
            aria-label="Close"
          >
            No
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  methods:{
    deleteItem(){
      this.$root.$emit('proceedDelete',true);
    },
  }
};
</script>