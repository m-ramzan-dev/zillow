<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
const page = usePage();
const flash = computed(() => page.props.flash.success);
const user = computed(() => usePage().props.auth.user);
</script>

<script>
export default {
  layout: (h, page) => h(Layout, [page]),
};
</script>
<template>
  <header
    class="border-b bg-white border-gray-200 dark:border-gray-700 dark:bg-gray-800 w-full"
  >
    <div class="container mx-auto">
      <nav class="p-2 flex items-center justify-between">
        <div class="text-lg font-medium">
          <Link href="listings">Listing</Link>
        </div>
        <div class="text-lg font-bold text-indigo-500 dark:text-indigo-400">
          <Link href="/"> Zillow App</Link>
        </div>
        <div class="flex items-center gap-4" v-if="user">
          <span>{{ user.name }}</span>
          <div class="button">
            <Link href="listing/create" class="p-2"> + New Listing</Link>
          </div>
          <div><Link href="logout" method="post">Logout</Link></div>
        </div>
        <div v-else>
          <div class="button px-4 py-2"><Link href="login">Login</Link></div>
        </div>
      </nav>
    </div>
  </header>
  <main class="container mx-auto p-4">
    <div
      v-if="flash"
      class="mb-2 border rounded-sm shadow-sm dark:bg-green-900 bg-green-50 border-green-200 dark:border-green-800"
    >
      <span class="px-2 py-4">{{ flash }} </span>
    </div>
    <slot></slot>
  </main>
</template>