<template>
  <div>
    <div>{{ row.owners.first_name }} {{ row.owners.last_name }}</div>
    <div>{{ row.addresses.address }}</div>
    <div>{{ row.addresses.city }}</div>
    <div>{{ row.addresses.country }}</div>
    <div>{{ row.addresses.postal_code }}</div>
  </div>
</template>

<script>
export default {
  props: {
    row: {
      type: Object,
    },
  },
  created() {},

  methods: {},
};
</script>