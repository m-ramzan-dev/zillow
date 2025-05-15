<script setup>
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";
const props = defineProps({
  listing: Object,
  required: true,
});
const form = useForm({
  beds: props.listing.beds,
  baths: props.listing.baths,
  area: props.listing.area,
  city: props.listing.city,
  code: props.listing.code,
  street: props.listing.street,
  street_nr: props.listing.street_nr,
  price: props.listing.price,
});
const create = () => {
  form.put(`/listing/update/${props.listing.id}`, {
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
  <h2>Update Listing</h2>
  <form @submit.prevent="create">
    <div>
      <div>
        <label for="beds">Beds</label>
        <input type="text" id="beds" name="beds" v-model.number="form.beds" />
        <div v-if="form.errors.beds">
          {{ form.errors.beds }}
        </div>
      </div>
      <div>
        <label for="baths">Baths</label>
        <input
          type="text"
          id="baths"
          name="baths"
          v-model.number="form.baths"
        />
        <div v-if="form.errors.baths">{{ form.errors.baths }}</div>
      </div>
      <div>
        <label for="area">Area</label>
        <input type="text" id="area" name="area" v-model="form.area" />
        <div v-if="form.errors.area">{{ form.errors.area }}</div>
      </div>
      <div>
        <label for="city">City</label>
        <input type="text" id="city" name="city" v-model="form.city" />
        <div v-if="form.errors.city">{{ form.errors.city }}</div>
      </div>
      <div>
        <label for="code">Code</label>
        <input type="text" id="code" name="code" v-model="form.code" />
        <div v-if="form.errors.code">{{ form.errors.code }}</div>
      </div>
      <div>
        <label for="street">Street</label>
        <input type="text" id="street" name="street" v-model="form.street" />
        <div v-if="form.errors.street">{{ form.errors.street }}</div>
      </div>
      <div>
        <label for="street_nr">Street No.</label>
        <input
          type="text"
          id="street_nr"
          name="street_nr"
          v-model="form.street_nr"
        />
        <div v-if="form.errors.street_nr">{{ form.errors.street_nr }}</div>
      </div>
      <div>
        <label for="price">Price</label>
        <input
          type="text"
          id="price"
          name="price"
          v-model.number="form.price"
        />
        <div v-if="form.errors.price">{{ form.errors.price }}</div>
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