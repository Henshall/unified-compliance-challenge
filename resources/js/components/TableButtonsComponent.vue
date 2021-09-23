<template>
    <span>
        <button class="btn btn-primary" @click="goToView(row.id)">View</button>
        <button class="btn btn-primary" @click="goToEdit(row.id)">Edit</button>
        <button class="btn btn-danger"  data-toggle="modal" data-target="#mediumModal" @click="setDeleteId(row.id)">Delete</button>
    </span>
</template>

<script>
export default {
    props: {
        row: {
            type: Object
        }
    },
    data(){
        return{
            id : ''
        }
    },
 
    created() {},

    methods: {
    goToView(id) {
       switch(this.$route.name) {
        case 'cars':
            this.$router.push({ name: "carDetail", params: { id } });
            break;
        case 'owners':
             this.$router.push({ name: "ownerDetail", params: { id } });
             break;
         
        case 'addresses':
             this.$router.push({ name: "addressDetail", params: { id } });
             break;
         
         default:
          
        }
        
    },

    goToEdit(id) {
         
           switch(this.$route.name) {
        case 'cars':
            this.$router.push({ name: "carEdit", params: { id } });
            break;
        case 'owners':
             this.$router.push({ name: "ownerEdit", params: { id } });
             break;
         
        case 'addresses':
             this.$router.push({ name: "addressEdit", params: { id } });
             break;
         
          default:
            
        }
         
    },

     setDeleteId(deleteID) {
      this.id = deleteID;
       this.$root.$emit('deleteID',this.id);
    },
           
  },
}
</script>
