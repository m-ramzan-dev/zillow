<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<!-- <script>
export default {
  layout: (h, page) => h(Layout, [page]),

  layout: Layout,
};
</script> -->
<template>
  <main>
    <header>
      <Link href="/">Home</Link>
      <Link href="/about">About</Link>
      <Link href="/contact">Contact</Link>
    </header>
  </main>
  <slot></slot>
</template>