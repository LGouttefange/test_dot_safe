<template>
  <!-- @see https://ui.nuxt.com/components/table -->
  <UTable :rows="todos || []" :columns="[
    {
      key: 'title',
      label: 'Nom',
    },
    {
      key: 'completed',
      label: 'Complétée',
    },
    {
      key: 'completionProgress',
      label: 'Progrès',
    },
    {
      key: 'dueDate',
      label: 'Date limite',
    },
    {
      key: 'actions',
      label: 'Actions',
    },
  ]">
    <template #completed-data="{ row }">
      <UToggle v-model="row.completed" type="boolean" @update:model-value="updateCompleted(row, $event)"></UToggle>
    </template>
    <template #completionProgress-data="{ row }">
      <UInput v-model="row.completionProgress" type="number" min="0" max="100" class="w-[100px]"
        @update:model-value="updateProgressCompletion(row, $event)"></UInput>
    </template>
    {# <template #dueDate-data="{ row }">
      <UIDate v-model="row.dueDate" type="date" min="0" max="100" class="w-[100px]"
        @update:model-value="updateDueDate(row, $event)">
      </UIDate>
    </template> #}
    <template #actions-data="{ row }">
      <UDropdown :items="items(row)">
        <UButton v-model="row.id" @update:model-value="deleteRow(row)" color="gray" variant="ghost"
          icon="i-heroicons-ellipsis-horizontal-20-solid" />
      </UDropdown>
    </template>
  </UTable>
</template>
<script setup="" lang="ts">
import { useAsyncData } from "#app";
import debounce from "lodash/debounce";
import type { Todo } from "~/@types/Todo";
import { fetchApi } from "~/utils/api";

const items = (row) => [
  [{
    label: 'Delete',
    icon: 'i-heroicons-trash-20-solid'
  }]
]

const { data: todos } = await useAsyncData("todos", () => {
  return fetchApi("/todos");
});
const updateCompleted = debounce(
  (row: Todo, completed: boolean) =>
    fetchApi(`/todos/${row.id}`, {
      body: {
        completed: completed,
      },
      method: "PATCH",
    }),
  500,
);
const updateProgressCompletion = debounce(
  (row: Todo, progress: number) =>
    fetchApi(`/todos/${row.id}`, {
      body: {
        completionProgress: progress,
      },
      method: "PATCH",
    }),
  500,
);
const updateDueDate = debounce(
  (row: Todo, dueDate: string) =>
    fetchApi(`/todos/${row.id}`, {
      body: {
        dueDate: dueDate,
      },
      method: "PATCH",
    }),
  500,
);
const deleteRow = debounce(
  (row: Todo) =>
    fetchApi(`/todos/${row.id}`, {
      method: "DELETE",
    }),
  500,
);
</script>
