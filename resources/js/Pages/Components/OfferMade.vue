
<template>
  <Box>
    <template #header>Offer Made</template>
    <Price :price="props.offer.amount" class="text-3xl" />
    <section class="flex flex-col md:flex-row justify-between text-gray-500">
      <div>Made on</div>
      <div class="font-medium">{{ offerMadeOn }}</div>
    </section>
  </Box>
</template>

<script setup>
import { computed } from "vue";
import Box from "../Listing/Components/Box.vue";
import Price from "./Price.vue";
const props = defineProps({
  offer: Object,
});
const offerMadeOn = computed(() =>
  new Date(props.offer.created_at).toDateString()
);
</script>