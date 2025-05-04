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
  form.post("/listing/create", {
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
    <div>
      <div>
        <label for="beds">Beds</label>
        <input type="text" id="beds" name="beds" v-model.number="form.beds" />
      </div>
      <div>
        <label for="baths">Baths</label>
        <input
          type="text"
          id="baths"
          name="baths"
          v-model.number="form.baths"
        />
      </div>
      <div>
        <label for="area">Area</label>
        <input type="text" id="area" name="area" v-model="form.area" />
      </div>
      <div>
        <label for="city">City</label>
        <input type="text" id="city" name="city" v-model="form.city" />
      </div>
      <div>
        <label for="code">Code</label>
        <input type="text" id="code" name="code" v-model="form.code" />
      </div>
      <div>
        <label for="street">Street</label>
        <input type="text" id="street" name="street" v-model="form.street" />
      </div>
      <div>
        <label for="street_nr">Street No.</label>
        <input
          type="text"
          id="street_nr"
          name="street_nr"
          v-model="form.street_nr"
        />
      </div>
      <div>
        <label for="price">Price</label>
        <input
          type="text"
          id="price"
          name="price"
          v-model.number="form.price"
        />
      </div>
    </div>
    <button type="submit">Submit</button>
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