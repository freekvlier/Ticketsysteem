<template>
    <div>
      <Head :title="ticket.subject" />
      <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <a :href="route('ticket.index')" class="text-blue-500 hover:text-blue-700">Back to Tickets</a>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-auto">Ticket Details</h2>
            </div>
        </template>
        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mb-4">
                  <strong>Name</strong>
                  <p>{{ ticket.name }}</p>
                </div>
                <div class="mb-4">
                  <strong>Email:</strong>
                  <p>{{ ticket.email }}</p>
                </div>
                <div class="mb-4">
                  <strong>Subject</strong>
                  <p>{{ ticket.subject }}</p>
                </div>
                <div class="mb-4">
                  <strong>Priority</strong>
                  <p>{{ ticket.priority }}</p>
                </div>
                <div class="mb-4">
                  <strong>Content</strong>
                  <p>{{ ticket.content }}</p>
                </div>
                <div class="mb-4">
                  <strong>Attachments</strong>
                  <p>{{ ticket.attachments }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </AuthenticatedLayout>
    </div>
  </template>
  
  <script setup lang="ts">
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head, usePage } from '@inertiajs/vue3';
  
  const props = defineProps<{
    ticket: {
      id: number;
      name: string;
      email: string;
      subject: string;
      priority: string;
      content: string;
      attachments: string;
    };
  }>();
  </script>
  