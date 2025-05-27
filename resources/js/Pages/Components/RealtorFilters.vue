<template>
  <form class="mb-4">
    <div>
      <div class="flex flex-nowrap items-center gap-2">
        <input
          type="checkbox"
          v-model="filterForm.deleted"
          id="deleted"
          name="deleted"
          class="h-4 w-4 rounded border-gray-300 text-indigo-600 foucs:ring-indigo-500"
        />
        <label for="deleted">Show Deleted</label>
      </div>
      <div></div>
    </div>
  </form>
</template>
<script setup>
import { reactive, watch } from "vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
  filters: Object,
});

const filterForm = reactive({
  deleted: props.filters.deleted ?? false,
});

watch(filterForm, () =>
  router.get(route("realtor.listing.index"), filterForm, {
    preserveState: true,
    preserveScroll: true,
  })
);
</script>