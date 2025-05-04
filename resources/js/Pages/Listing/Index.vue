<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
  listings: {
    type: Array,
    required: true,
  },
});
</script>
<template>
  <div>All Showing Listings</div>
  <div v-for="listing in listings" :key="listing.id">
    <Link :href="`/listings/${listing.id}`">
      <p>{{ listing.description }}</p>
      <p>Price: {{ listing.price }}</p>
      <p>Location: {{ listing.location }}</p>
      <p>Created at: {{ listing.created_at }}</p>
    </Link>

    <hr />
  </div>
</template>