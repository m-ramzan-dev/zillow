<template>
  <div class="flex gap-1 mt-4">
    <Link
      v-for="(link, index) in links"
      :key="index"
      :href="link.url || '#'"
      class="px-4 py-2 rounded-sm"
      :class="{ 'bg-indigo-500 dark:bg-indigo-800 text-gray-300': link.active }"
      v-html="link.label"
    />
  </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  links: {
    type: Array,
    required: true,
  },
});
</script>