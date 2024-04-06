<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import TextAreaInput from '@/Components/TextAreaInput.vue';

const form = useForm({
    name: '',
    email: '',
    subject: '',
    priority: 'medium',
    content: '',
    attachments: '',
});

const submit = () => {
    form.post(route('ticket.store'), {
        preserveScroll: true,
        onFinish: ()  => {
            form.reset();
        },
    });
};
</script>

<template>
       <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <Head title="Create Ticket" />
            <h1 class="text-xl text-center">Nieuwe Ticket maken</h1>
            <form @submit.prevent="submit">
                <div class="mt-4">
                    <InputLabel for="name" value="Naam" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="subject" value="Onderwerp" />

                    <TextInput
                        id="subject"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.subject"
                        required
                        autocomplete="subject"
                    />

                    <InputError class="mt-2" :message="form.errors.subject" />
                </div>

                <div class="mt-4">
                    <InputLabel for="priority" value="Prioriteit" />

                    <div class="flex items-center mt-1">
                        <input
                            id="priority-low"
                            type="radio"
                            class="mr-2"
                            v-model="form.priority"
                            value="low"
                            required
                            autofocus
                            autocomplete="off"
                        />
                        <label for="priority-low" class="mr-4">Laag</label>

                        <input
                            id="priority-medium"
                            type="radio"
                            class="mr-2"
                            v-model="form.priority"
                            value="medium"
                            required
                            autofocus
                            autocomplete="off"
                            checked
                        />
                        <label for="priority-medium" class="mr-4">Gemiddeld</label>

                        <input
                            id="priority-high"
                            type="radio"
                            class="mr-2"
                            v-model="form.priority"
                            value="high"
                            required
                            autofocus
                            autocomplete="off"
                        />
                        <label for="priority-high" class="mr-4">Hoog</label>
                    </div>

                    <InputError class="mt-2" :message="form.errors.priority" />
                </div>


                <div class="mt-4">
                    <InputLabel for="content" value="Bericht" />

                    <TextAreaInput
                        id="content"
                        type="text"
                        class="mt-1 block w-full h-24"
                        v-model="form.content"
                        required
                        autofocus
                        autocomplete="content"
                    />

                    <InputError class="mt-2" :message="form.errors.content" />
                </div>

                <div class="mt-4">
                    <InputLabel for="attachments" value="Bijlages" />

                    <TextInput
                        id="attachments"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.attachments"
                        autofocus
                        autocomplete="attachments"
                    />

                    <InputError class="mt-2" :message="form.errors.attachments" />
                </div>

                <div class="flex items-center justify-center mt-4">
                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Verstuur
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
        
</template>
