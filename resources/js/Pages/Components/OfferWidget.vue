<template>
  <Box>
    <template #header>Offer #{{ offer.id }}</template>
    <section class="flex items-center justify-between">
      <div>
        <Price :price="offer.amount" class="text-xl" />
        <div class="text-gray-500">
          Difference <Price :price="difference" />
        </div>
        <div class="text-gray-500">Made by John Doe</div>
        <div class="text-gray-500">Made on {{ madeOn }}</div>
      </div>
      <div>
        <Link
          class="btn-outline text-xs font-medium"
          as="button"
          method="put"
          :href="route('realtor.offer.accept', { offer: props.offer.id })"
          >Accept</Link
        >
      </div>
    </section>
  </Box>
</template>
<script setup>
import { computed } from "vue";
import Box from "./Box.vue";
import { Link } from "@inertiajs/vue3";
import Price from "./Price.vue";
import { route } from "ziggy-js";
const props = defineProps({
  offer: Object,
  listingPrice: Number,
});
const madeOn = computed(() => new Date(props.offer.created_at).toDateString());
const difference = computed(() => props.offer.amount - props.listingPrice);
</script>