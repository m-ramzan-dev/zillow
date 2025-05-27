<template>
  <h1 class="text-3xl mb-4">Your Listings</h1>
  <RealtorFilters :filters="props.filters" />
  <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <Box v-for="listing in props.listings.data" :key="listing.id">
      <div
        class="flex flex-col md:flex-row gap-2 md:items-center justify-between"
      >
        <div>
          <div class="xl:flex items-center gap-2">
            <Price :price="listing.price" class="font-medium text-2xl" />
            <ListingSpace :listing="listing" />
          </div>
          <ListingAddress :listing="listing" />
        </div>
        <div>
          <Link class="btn-outline text-xs font-medium" :href="some"
            >Preview</Link
          >
          <Link class="btn-outline text-xs font-medium" :href="some">Edit</Link>
          <Link
            class="btn-outline text-xs font-medium"
            :href="route('realtor.listing.destroy', { listing: listing.id })"
            as="button"
            method="delete"
            >Delete</Link
          >
        </div>
      </div>
    </Box>
  </section>
  <Pagination :links="props.listings.links" />
</template>
<script setup>
import Box from "../Components/Box.vue";
import { Link } from "@inertiajs/vue3";
import ListingAddress from "../Components/ListingAddress.vue";
import ListingSpace from "../Components/ListingSpace.vue";
import Price from "../Components/Price.vue";
import RealtorFilters from "../Components/RealtorFilters.vue";
import Pagination from "../Listing/Components/Pagination.vue";
import { route } from "ziggy-js";
const props = defineProps({
  listings: Array,
  filters: Object,
});
</script>