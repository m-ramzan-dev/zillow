<template>
  <div>
    <span class="font-bold">{{ props.listing.beds }}</span> bds
    <span class="text-gray-400">| </span>
    <span class="font-bold">{{ props.listing.baths }}</span> ba
    <span class="text-gray-400">| </span>
    <span class="font-bold">{{ props.listing.area }}</span> m²
  </div>
</template>

<script setup>
const props = defineProps({
  listing: Object,
});
</script>