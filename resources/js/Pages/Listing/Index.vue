<script setup>
defineProps({
  listings: array,
});
</script>
<template>
  <div>All Showing Listings</div>
  <div :v-for="listing in listings" :key="listing.id">
    <h2>{{ listing.title }}</h2>
    <p>{{ listing.description }}</p>
    <p>Price: {{ listing.price }}</p>
    <p>Location: {{ listing.location }}</p>
    <p>Created at: {{ listing.created_at }}</p>
    <hr />
  </div>
</template>