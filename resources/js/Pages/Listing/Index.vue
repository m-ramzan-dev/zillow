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
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
    <div v-for="listing in listings" :key="listing.id">
      <Link :href="`/listings/${listing.id}`">
        <ListItem :listing="listing" class="p-4" />
      </Link>
    </div>
  </div>
</template>