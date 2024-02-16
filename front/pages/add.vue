<template>
  <UCard>
    <UForm :state="state" class="grid gap-5 py-5" @submit="createTodo($event)">
      <UFormGroup label="Type" class="col-span-full">
        <URadioGroup name="type" v-model="state.type" :options="[{
          value: 'todo',
          label: 'Simple'
        }, {
          value: 'timedtodo',
          label: 'Timée'
        }, {
          value: 'todowithpartialprogression',
          label: 'Avec progression partielle'
        }]">
        </URadioGroup>
      </UFormGroup>
      <UFormGroup label="Nom">
        <UInput v-model="state.title" name="title" />
      </UFormGroup>
      <UFormGroup v-if="state.type === 'todowithpartialprogression'" label="Progression">
        <UInput v-model="state.completionProgress" icon="i-heroicons-calendar" name="dueDate" type="number" />
      </UFormGroup>
      <UFormGroup v-if="state.type === 'timedtodo'" label="Date limite">
        <UInput v-model="state.dueDate" icon="i-heroicons-calendar" name="dueDate" type="date" />
      </UFormGroup>
      <div class="col-span-full flex justify-end">
        <UButton type="submit">Envoyer</UButton>
      </div>
    </UForm>
  </UCard>
</template>
<script setup="" lang="ts">
import type { FormSubmitEvent } from "#ui/types";
import { navigateTo } from "#app";
import { fetchApi } from "~/utils/api";

const state = reactive({
  type: undefined,
  title: undefined,
});

async function createTodo(event: FormSubmitEvent<any>) {
  await fetchApi("/todos", {
    method: "POST",
    body: event.data,
  });
  navigateTo("/");
}
</script>
