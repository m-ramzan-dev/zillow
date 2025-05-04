<script setup>
defineProps({
  listings: {
    type: Array,
    required: true,
  },
});
</script>
<template >
  <div>
    <h1>Listing</h1>
    <p>Hello Ramzan, welcome to your first Inertia app!{{ listings }}</p>
  </div>
</template>