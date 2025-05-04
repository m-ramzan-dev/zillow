<script setup>
defineProps({
  listing: {
    type: Object,
    required: true,
  },
});
</script>
<template>
  <p>Price: ${{ listing.price }}</p>
  <p>Location: {{ listing.city }}</p>
  <p>Created at: {{ listing.created_at }}</p>
  <hr />
</template>