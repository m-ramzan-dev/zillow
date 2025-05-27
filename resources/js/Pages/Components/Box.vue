<template>
  <div
    class="border border-gray-200 dark:border-gray-800 rounded-md shadow-sm p-4 dark:text-gray-300"
  >
    <div class="text-gray-500 font-medium mb-2">
      <slot name="header"></slot>
    </div>
    <slot></slot>
  </div>
</template>
<script setup></script>