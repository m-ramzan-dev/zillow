<script setup>
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";
const form = useForm({
  beds: 0,
  baths: 0,
  area: 0,
  city: "",
  code: "",
  street: "",
  street_nr: "",
  price: 0,
});
const create = () => {
  form.put("/listing/edit", {
    onSuccess: () => {
      form.reset();
    },
    onError: (errors) => {
      console.log(errors);
    },
  });
};
</script>
<template>
  <h2>Create Listing</h2>
  <form @submit.prevent="create">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label for="beds" class="label">Beds</label>
        <input
          type="text"
          id="beds"
          name="beds"
          v-model.number="form.beds"
          class="input"
        />
        <div v-if="form.errors.beds">
          {{ form.errors.beds }}
        </div>
      </div>
      <div class="col-span-2">
        <label for="baths" class="label">Baths</label>
        <input
          type="text"
          id="baths"
          name="baths"
          v-model.number="form.baths"
          class="input"
        />
        <div v-if="form.errors.baths">{{ form.errors.baths }}</div>
      </div>
      <div class="col-span-2">
        <label for="area" class="label">Area</label>
        <input
          type="text"
          id="area"
          name="area"
          v-model="form.area"
          class="input"
        />
        <div v-if="form.errors.area">{{ form.errors.area }}</div>
      </div>
      <div class="col-span-4">
        <label for="city" class="label">City</label>
        <input
          type="text"
          id="city"
          name="city"
          v-model="form.city"
          class="input"
        />
        <div v-if="form.errors.city">{{ form.errors.city }}</div>
      </div>
      <div class="col-span-2">
        <label for="code" class="label">Code</label>
        <input
          type="text"
          id="code"
          name="code"
          v-model="form.code"
          class="input"
        />
        <div v-if="form.errors.code">{{ form.errors.code }}</div>
      </div>
      <div class="col-span-4">
        <label for="street" class="label">Street</label>
        <input
          type="text"
          id="street"
          name="street"
          v-model="form.street"
          class="input"
        />
        <div v-if="form.errors.street">{{ form.errors.street }}</div>
      </div>
      <div class="col-span-2">
        <label for="street_nr" class="label">Street No.</label>
        <input
          type="text"
          id="street_nr"
          name="street_nr"
          v-model="form.street_nr"
          class="input"
        />
        <div v-if="form.errors.street_nr">{{ form.errors.street_nr }}</div>
      </div>
      <div class="col-span-6">
        <label for="price" class="label">Price</label>
        <input
          type="text"
          id="price"
          name="price"
          v-model.number="form.price"
          class="input"
        />
        <div v-if="form.errors.price">{{ form.errors.price }}</div>
      </div>
    </div>
    <div class="col-span-6">
      <button type="submit" class="button p-2 my-4">Submit</button>
    </div>
  </form>
</template>
<style scope>
label {
  margin-right: 2em;
}
div {
  padding: 2px;
}
</style>