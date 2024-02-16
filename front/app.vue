<template>
  <div class="min-h-full">
    <UHeader
      :links="[
        {
          label: 'Toutes les todos',
          to: '/',
          activeClass: 'text-purple-800',
        },
        {
          label: 'Ajouter une todo',
          to: '/add',
        },
      ]"
    >
      <template #logo> </template>
    </UHeader>
    <UMain>
      <NuxtLayout />
    </UMain>
  </div>
</template>
<script setup lang="ts"></script>
