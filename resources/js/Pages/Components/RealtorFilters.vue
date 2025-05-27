<template>
  <form class="mb-4">
    <div class="flex gap-4">
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
      <div>
        <select
          name="by"
          id="by"
          v-model="filterForm.by"
          class="input-filter-l w-24"
        >
          <option value="created_at">Added</option>
          <option value="price">Price</option>
        </select>
        <select
          name="order"
          id="order"
          class="input-filter-r w-32"
          v-model="filterForm.order"
        >
          <option
            v-for="option in sortOptions"
            :key="option.value"
            :value="option.value"
          >
            {{ option.label }}
          </option>
        </select>
      </div>
    </div>
  </form>
</template>
<script setup>
import { computed, reactive, watch } from "vue";
import { router } from "@inertiajs/vue3";

const sortLabels = {
  created_at: [
    {
      label: "Latest",
      value: "desc",
    },
    {
      label: "Oldest",
      value: "asc",
    },
  ],
  price: [
    {
      label: "Pricey",
      value: "desc",
    },
    {
      label: "Cheapest",
      value: "asc",
    },
  ],
};

const props = defineProps({
  filters: Object,
});

const filterForm = reactive({
  deleted: props.filters.deleted ?? false,
  by: "created_at",
  order: "desc",
});

watch(filterForm, () =>
  router.get(route("realtor.listing.index"), filterForm, {
    preserveState: true,
    preserveScroll: true,
  })
);

const sortOptions = computed(() => {
  return sortLabels[filterForm.by] || [];
});
</script>