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
  <div>Showing Listing</div>
  <ListItem :listing="listing" />
</template>