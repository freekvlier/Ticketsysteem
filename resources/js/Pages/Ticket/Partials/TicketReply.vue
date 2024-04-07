<template>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
      <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-auto">
            Reply: {{ reply.user.name }}
        </h2>
        <div class="mb-4">
          <strong>Created At</strong>
          <p>{{ formatTimestamp(reply.created_at) }}</p>
        </div>
        <div class="mb-4">
          <strong>Reactie</strong>
          <p>{{ reply.content }}</p>
        </div>
        <div class="mb-4" v-if="reply.attachments && reply.attachments.length > 0">
          <strong>Attachments</strong>
          <ul>
            <li v-for="(attachment, index) in reply.attachments" :key="index">
              <a :href="attachment.url" target="_blank">{{ attachment.name }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import { defineProps } from 'vue';
  
  const props = defineProps<{
    reply: {
      id: number;
      content: string;
      attachments: { url: string; name: string }[] | null;
      user: { name: string };
      created_at: string;
    };
  }>();
  
  const formatTimestamp = (timestamp: string): string => {
    // Implement your timestamp formatting logic here
    return timestamp; // Placeholder implementation
  };
  </script>
  