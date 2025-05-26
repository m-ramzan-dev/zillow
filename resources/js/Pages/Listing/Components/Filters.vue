<template>
  <form>
    <div class="flex flex-wrap mb-4 mt-2 gap-2">
      <div class="flex flex-nowrap items-center">
        <input
          type="text"
          placeholder="Price from"
          class="input-filter-l w-28"
        />
        <input type="text" placeholder="Price to" class="input-filter-r w-28" />
      </div>
      <div class="flex flex-nowrap items-center">
        <select name="beds" id="beds" class="input-filter-l w-28">
          <option :value="null">Beds</option>
          <option v-for="n in 5" :value="n" :key="n">{{ n }}</option>
          <option>6+</option>
        </select>
        <select name="baths" id="baths" class="input-filter-r w-28">
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
        />
        <input type="text" placeholder="Area to" class="input-filter-r w-28" />
      </div>
      <button type="submit" class="btn-normal">Filter</button>
      <button type="reset">Clear</button>
    </div>
  </form>
</template>
<script setup></script>