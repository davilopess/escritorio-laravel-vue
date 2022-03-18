<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Editar Peticao
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <jet-form-section @submitted="updatePeticao">
          <template #title> Editar Petição </template>

          <template #description> Complete os campos ao lado. </template>


          <template #form>
            <!-- Descrição -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="description" value="Descrição *" />
              <jet-input
                id="description"
                type="text"
                class="mt-1 block w-full"
                v-model="form.description"
                autocomplete="description"
              />
              <jet-input-error :message="form.errors.description" class="mt-2" />
            </div>

             <!-- Valor -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="value" value="Valor *" />
              <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <span class="text-gray-500 sm:text-sm"> $ </span>
                </div>
                <input 
                v-model="form.value"
                type="text" name="price" id="price" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
              </div>
            </div>

            <!-- data -->
            <div class="col-span-6 sm:col-span-4">
                <div class="datepicker relative form-floating mb-3 xl:w-96">
                    <jet-label for="date" value="Data de vencimento *" />
                    <input type="date"
                    v-model="form.date"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"                    placeholder="Select a date" />
                    
                </div>
            </div>

            <!-- note -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="note" value="Observação" />
              <textarea
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                v-model="form.note"
                rows="10"
              ></textarea>
              <jet-input-error :message="form.errors.note" class="mt-2" />
            </div>
          </template>

          <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
              Saved.
            </jet-action-message>

            <jet-button
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Editar
            </jet-button>
          </template>
        </jet-form-section>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetSelect from "@/Components/Select";

export default {
  components: {
    AppLayout,
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    JetSelect,
  },

  data() {
      return {
          form: this.$inertia.form({
            description: this.peticao.description,
            note: this.peticao.note,
            date: this.peticao.date,
            value:this.peticao.value,
          })
      }
  },

  props: ['peticao'],
  methods: {
      updatePeticao() {
          this.form.put(route('peticao.update', this.peticao));
      },
  },
};
</script>