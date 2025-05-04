<script setup>
import { Link } from "@inertiajs/vue3";
import ListItem from "./ListItem.vue";
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
      <ListItem :listing="listing" />
    </Link>

    <hr />
  </div>
</template>