<script setup>
import ListItem from "./ListItem.vue";
import Box from "./Components/Box.vue";
import { ref, computed } from "vue";
const props = defineProps({
  listing: {
    type: Object,
    required: true,
  },
});
const interestRate = ref(2.5);
const duration = ref(25);
const monthlyPayment = computed(() => {
  const principal = props.listing.price;
  const rate = interestRate.value / 100 / 12;
  const n = duration.value * 12;
  return ((principal * rate) / (1 - Math.pow(1 + rate, -n))).toFixed(1);
});
</script>
<template>
  <div>Showing Single Listing</div>
  <div class="grid grid-cols-6 gap-4">
    <div class="col-span-4">
      <Box
        ><div class="w-full text-center p-4">
          <span>No Images</span>
        </div></Box
      >
    </div>
    <div class="col-span-2 space-y-4">
      <ListItem :listing="props.listing" />
      <div>
        <Box>
          <template #header>Monthly Payment</template>
          <div>
            <label for="interest" class="label"
              >Interest rate ({{ interestRate }}%)</label
            >
            <input
              v-model.number="interestRate"
              type="range"
              min="0.1"
              max="30"
              step="0.1"
              value="5"
              class="w-full h-4 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none"
            />
            <label for="duration" class="label"
              >Duration ({{ duration }} years)</label
            >
            <input
              v-model.number="duration"
              type="range"
              min="3"
              max="35"
              step="1"
              value="5"
              class="w-full h-4 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none"
            />
            <div class="text-gray-600 dark:text-gray-300 mt-2">
              <div class="text-gray-400">Your monthly payment</div>
              <div class="text-3xl">${{ monthlyPayment }}</div>
            </div>
          </div>
        </Box>
      </div>
    </div>
  </div>
</template>