<template>
  <div class="w-full max-w-sm mx-auto mt-10">
    <form @submit.prevent="submit">
      <div>
        <label for="email" class="label">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          v-model="form.email"
          class="input"
          required
        />
        <div v-if="form.errors.email" class="input-error">
          {{ form.errors.email }}
        </div>
      </div>
      <div class="mt-4">
        <label for="password">Password</label>
        <input
          type="text"
          id="password"
          name="password"
          v-model="form.password"
          class="input"
          required
        />
        <div v-if="form.errors.password" class="input-error">
          {{ form.errors.password }}
        </div>
      </div>
      <button class="button px-4 py-2 mt-4">Login</button>
    </form>
  </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
const form = useForm({
  email: "",
  password: "",
  remember: false,
});
const submit = () => {
  form.post("/signIn", {
    onSuccess: () => {
      form.reset();
    },
    onError: (errors) => {
      console.log(errors);
    },
  });
};
</script>