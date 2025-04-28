<script setup>
import Layout from "./Layout.vue";

defineProps(["name"]);
</script>

<template>
  <Layout>
    <div>
      <h1>Welcome</h1>
      <p>Hello {{ name }}, welcome to your first Inertia app!</p>
    </div>
  </Layout>
</template>