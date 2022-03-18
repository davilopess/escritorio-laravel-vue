<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detalhes da Petição
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-5">
          <h2 class="text-xl font-bold">{{ peticao.description }}</h2>
          <div class="mb-2">Valor: {{ peticao.value }}</div>
          <div class="whitespace-pre-line">Data: {{ peticao.date }}</div>
          <div class="whitespace-pre-line">Observação: {{ peticao.note }}</div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: {
    peticao: Object,
  },
};
</script>