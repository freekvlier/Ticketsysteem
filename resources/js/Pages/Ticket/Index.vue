<template>
  <div>
    <Head title="Tickets" />
    <AuthenticatedLayout>
      <template #header>
        <h2
          class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
          Tickets
        </h2>
      </template>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
          >
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex gap-2 items-right">
                  <div class="mb-4">
                    <label for="sortBy" class="mr-2">Sort By:</label>
                    <select v-model="sortBy" @change="updateSort">
                      <option value="id">ID</option>
                      <option value="name">Name</option>
                      <option value="email">Email</option>
                      <option value="subject">Subject</option>
                      <option value="priority">Priority</option>
                      <option value="status">Status</option>
                    </select>
                  </div>
                  <div class="mb-4">
                    <label for="sortDirection" class="mr-2">Sort Direction:</label>
                    <select v-model="sortDirection" @change="updateSort">
                      <option value="asc">Ascending</option>
                      <option value="desc">Descending</option>
                    </select> 
                  </div>
                </div>
              <TicketTable :tickets="tickets.data" />
            </div>
          </div>
          <div v-if="tickets.links">
            <Pagination :links="tickets.links" :query="{ sortBy, sortDirection }"/>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </div>
</template>

<script setup lang="ts">
import { defineProps, ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import TicketTable from './Partials/TicketTable.vue';
import Pagination from '@/Components/Pagination.vue';

const props = defineProps<{
   tickets:Object;
   sortBy: string;
   sortDirection: string;
}>()

const sortBy = ref(props.sortBy);
const sortDirection = ref(props.sortDirection);

const updateSort = () => {
  window.location = `?sortBy=${sortBy.value}&sortDirection=${sortDirection.value}`;
}
</script>
