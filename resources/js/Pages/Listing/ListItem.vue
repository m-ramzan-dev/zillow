<script setup>
import { Link } from "@inertiajs/vue3";
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
  <Link :href="`listing/edit/${listing.id}`">Edit</Link>
</template>