<script setup>
import { Link } from "@inertiajs/vue3";
import ListItem from "./ListItem.vue";
import Pagination from "./Components/Pagination.vue";
defineProps({
  listings: {
    type: Object,
    required: true,
  },
});
</script>
<template>
  <div>All Showing Listings</div>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
    <div v-for="listing in listings.data" :key="listing.id">
      <Link :href="`/listings/${listing.id}`">
        <ListItem :listing="listing" class="p-4" />
      </Link>
    </div>
  </div>
  <div v-if="listings.data.length">
    <Pagination :links="listings.links" />
  </div>
</template>