<template>
    <div>
      <Head :title="ticket.subject" />
      <AuthenticatedLayout>
        <template #header>
          <div class="flex justify-between items-center">
            <Link :href="route('ticket.index')" class="text-blue-500 hover:text-blue-700">Back to Tickets</Link>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-auto">
              Ticket Details
            </h2>
          </div>
        </template>
        <div class="py-12">
          <div class="flex flex-col gap-7 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <TicketReplyForm :ticketId="ticket.id" />
            <div v-for="reply in ticket.replies.slice().reverse()" :key="reply.id">
                <TicketReply :reply="reply" />
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-auto">
                    Ticket {{ ticket.id }}
                </h2>
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
                  <ul>
                  <li v-for="(attachment, index) in ticket.attachments" :key="index">
                      <a :href="attachment.path" download>{{ attachment.name }}</a>
                  </li>
                </ul>
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
  import { Link } from '@inertiajs/vue3';
  import TicketReplyForm from './Partials/TicketReplyForm.vue';
  import TicketReply from './Partials/TicketReply.vue';
  
  interface Attachment {
    name: string;
    path: string;
    size: number;
  }

  interface Reply {
    id: number;
    content: string;
    attachments: Attachment[] | null;
    user: {
      name: string;
    };
    created_at: string;
  }

  const props = defineProps<{
    ticket: {
      id: number;
      name: string;
      email: string;
      subject: string;
      priority: string;
      content: string;
      attachments: Attachment[] | null;
      replies: Reply[];
      status: string;
      created_at: string;
      updated_at: string;
    };
  }>();

  props.ticket.attachments = JSON.parse(props.ticket.attachments);
  </script>
  