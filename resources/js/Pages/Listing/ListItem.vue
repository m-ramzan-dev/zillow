<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";
const props = defineProps({
  listing: {
    type: Object,
    required: true,
  },
});
const price = computed(() => Number(props.listing.price).toLocaleString());
</script>
<template >
  <div
    class="border border-gray-200 dark:border-gray-800 shadow-sm dark:text-gray-300 rounded-md p-4"
  >
    <span class="font-bold text-2xl">$ {{ price }}</span>
    <div class="text-lg">
      <span class="font-bold">{{ props.listing.beds }}</span> bd
      <span class="text-gray-700">| </span>
      <span class="font-bold">{{ props.listing.baths }}</span> ba
      <span class="text-gray-700">| </span>
      <span class="font-bold">{{ props.listing.area }}</span
      >㎡
    </div>
    <div class="text-gray-400">
      {{ props.listing.street }} {{ props.listing.street_nr }}
      {{ props.listing.city }}
    </div>
    <Link :href="`listing/edit/${listing.id}`">Edit</Link>
  </div>
</template>