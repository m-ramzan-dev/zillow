<template>
  <Box>
    <template #header>Upload New Images</template>
    <form @submit.prevent="upload" enctype="multipart/form-data">
      <input type="file" multiple @input="addFiles" />
      <button type="submit">Upload</button>
    </form>
  </Box>
</template>

<script setup>
import { route } from "ziggy-js";
import Box from "../../Components/Box.vue";
import { useForm } from "@inertiajs/vue3";
const props = defineProps({
  listing: Object,
});
const form = useForm({
  images: [],
});
const upload = () => {
  form.post(
    route(
      "realtor.listing.image.store",
      { listing: props.listing.id },
      {
        onSuccess: () => {
          reset();
        },
      }
    )
  );
};
const reset = () => form.reset("images");

const addFiles = (event) => {
  for (const image of event.target.files) {
    form.images.push(image);
  }
};
</script>