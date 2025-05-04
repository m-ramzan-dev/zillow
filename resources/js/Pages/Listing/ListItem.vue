<script setup>
defineProps({
  listing: {
    type: Object,
    required: true,
  },
});
</script>
<template>
  <h2>{{ listing.title }}</h2>
  <p>{{ listing.description }}</p>
  <p>Price: ${{ listing.price }}</p>
  <p>Location: {{ listing.location }}</p>
  <p>Created at: {{ listing.created_at }}</p>
  <hr />
</template>