<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import TicketTable from './Partials/TicketTable.vue';

const props = defineProps<{
    tickets: { 
        id: number; 
        name: string; 
        email: string; 
        subject: string; 
        priority: string;
        status: string;
    }[];
}>();
</script>

<template>
    <div>
        <Head title="Tickets" />
        <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tickets</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <TicketTable :tickets="tickets" />
                </div>
            </div>
            </div>
        </div>
        </AuthenticatedLayout>
    </div>
</template>
  

  