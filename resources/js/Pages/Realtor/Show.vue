<template>
  <div>
    <Link :href="route('realtor.listing.index')">← Go back to Listings</Link>
  </div>
  <section class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box v-if="!hasOffers" class="flex md:col-span-7 items-center">
      <div class="w-full items-center font-medium text-gray-500">No Offers</div>
    </Box>
    <div v-else class="flex md:col-span-7 items-center">
      This is displayed when there are offers!
    </div>
    <Box class="md:col-span-5">
      <template #header>Basic Info</template>
      <Price :price="props.listing.price" class="text-2xl font-bold" />
      <ListingSpace :listing="props.listing" class="text-lg" />
      <ListingAddress :listing="props.listing" class="text-gray-500" />
    </Box>
  </section>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";
import { route } from "ziggy-js";
import Box from "../Components/Box.vue";
import Price from "../Components/Price.vue";
import ListingSpace from "../Components/ListingSpace.vue";
import ListingAddress from "../Components/ListingAddress.vue";
const props = defineProps({
  listing: Object,
});
const hasOffers = computed(() => props.listing.offers?.length);
</script>