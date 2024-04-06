<template>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-auto">
                    Reply
                </h2>
                <form @submit.prevent="submitReply">
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea id="content" v-model="reply.content" rows="4" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required></textarea>
                    </div>
                    <!-- <div class="mb-4">
                        <label for="attachment" class="block text-sm font-medium text-gray-700">Attachment</label>
                        <input type="file" id="attachment" v-model="reply.attachment" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div> -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="status" v-model="reply.status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </div>
                </form>
            </div>
    </div>

    
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps<{
    ticketId: number;
  }>();

  const reply = useForm({
    content: '',
    attachment: null,
    status: 'pending'
  });
  
  const submitReply = () => {
    reply.post(route('ticket.reply.store', props.ticketId), {
        preserveScroll: true,
        onFinish: ()  => {
            reply.reset();
        },
    });
  };
  </script>
  