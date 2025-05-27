<template>
  <span>
    {{ props.listing.street }} {{ props.listing.street_nr }},
    {{ props.listing.city }}
  </span>
</template>

<script setup>
const props = defineProps({
  listing: Object,
});
</script>