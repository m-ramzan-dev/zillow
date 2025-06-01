<template>
  <Box>
    <template #header>Make an Offer</template>
    <div>
      <form>
        <input type="text" v-model.number="form.amount" class="input" />
        <input
          type="range"
          v-model="form.amount"
          :min="min"
          :max="max"
          step="10000"
          class="w-full h-4 mt-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
        />
        <button class="text-sm btn-outline w-full mt-2" type="submit">
          Make an Offer
        </button>
      </form>
    </div>
    <div class="flex justify-between">
      <div>Difference</div>
      <div>{{ difference }}</div>
    </div>
  </Box>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import Box from "../Listing/Components/Box.vue";
import { computed } from "vue";

const props = defineProps({
  listingId: Number,
  price: Number,
});
const form = useForm({
  amount: props.price,
});
const min = computed(() => props.price / 2);
const max = computed(() => props.price * 2);
const difference = computed(() => form.amount - props.price);
</script>