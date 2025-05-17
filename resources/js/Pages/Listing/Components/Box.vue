<template>
  <div
    class="border rounded-md shadow-sm border-gray-200 dark:border-gray-800 dark:text-gray-300 p-2"
  >
    <div class="font-medium text-gray-500 mb-1">
      <slot name="header"></slot>
    </div>
    <slot></slot>
  </div>
</template>