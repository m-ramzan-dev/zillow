<script setup>
import ListItem from "./ListItem.vue";
defineProps({
  listing: {
    type: Object,
    required: true,
  },
});
</script>
<template>
  <div>Showing Single Listing</div>
  <ListItem :listing="listing" />
</template>