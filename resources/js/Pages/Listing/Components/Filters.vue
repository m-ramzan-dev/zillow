<template>
  <form @submit.prevent="filter">
    <div class="flex flex-wrap mb-4 mt-2 gap-2">
      <div class="flex flex-nowrap items-center">
        <input
          type="text"
          placeholder="Price from"
          class="input-filter-l w-28"
          v-model="filterForm.priceFrom"
        />
        <input
          type="text"
          placeholder="Price to"
          class="input-filter-r w-28"
          v-model="filterForm.priceTo"
        />
      </div>
      <div class="flex flex-nowrap items-center">
        <select
          name="beds"
          id="beds"
          class="input-filter-l w-28"
          v-model="filterForm.beds"
        >
          <option :value="null">Beds</option>
          <option v-for="n in 5" :value="n" :key="n">{{ n }}</option>
          <option>6+</option>
        </select>
        <select
          name="baths"
          id="baths"
          class="input-filter-r w-28"
          v-model="filterForm.baths"
        >
          <option :value="null">Baths</option>
          <option v-for="n in 5" :value="n" :key="n">{{ n }}</option>
          <option>6+</option>
        </select>
      </div>
      <div class="flex flex-nowrap items-center">
        <input
          type="text"
          placeholder="Area from"
          class="input-filter-l w-28"
          v-model="filterForm.areaFrom"
        />
        <input
          type="text"
          placeholder="Area to"
          class="input-filter-r w-28"
          v-model="filterForm.areaTo"
        />
      </div>
      <button type="submit" class="btn-normal">Filter</button>
      <button type="reset" @click="clear">Clear</button>
    </div>
  </form>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
const props = defineProps({
  filters: Object,
});
const filterForm = useForm({
  priceFrom: props.filters.priceFrom ?? null,
  priceTo: props.filters.priceTo ?? null,
  beds: props.filters.beds ?? null,
  baths: props.filters.baths ?? null,
  areaFrom: props.filters.areaFrom ?? null,
  areaTo: props.filters.areaTo ?? null,
});

const filter = () => {
  filterForm.get(route("listings.index"), {
    preserveState: true,
    preserveScroll: true,
    // onSuccess: () => {
    //   filterForm.reset();
    // },
  });
};

const clear = () => {
  filterForm.reset();

  filter();
};
</script>