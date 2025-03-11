<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/components/Modal.vue';
import { PencilLineIcon , Send, PaperclipIcon, Phone, Mail, MailOpen} from 'lucide-vue-next';
import { SidebarGroupLabel } from '@/components/ui/sidebar';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Chat Panel',
        href: '/chatpanel',
    }
];

const isOpen = ref(false);

const {lead_numbers} = defineProps({
    lead_numbers: Object
});

const composeForm = ref({
    number: null,
    message: null
});
const handleToggleModal = () => {
    isOpen.value = !isOpen.value;
}

const handleSendSms = () =>{
    console.log('send sms');
}

</script>

<template>
    <Head title="Chat Panel" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 p-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="relative col-span-1 md:col-span-1 p-4 bg-white rounded-xl shadow-md border dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-center item-center">
                        <button
                            @click="handleToggleModal"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md"
                        >
                          <div class="flex"><span class="mx-1">Compose</span><PencilLineIcon/></div>
                        </button>
                    </div>
                    <div class="mt-6">
                        <SidebarGroupLabel>Numbers</SidebarGroupLabel>
                        <ul class="list-disc list-inside mt-2 text-gray-600 dark:text-gray-300">
                            <li v-for="item in lead_numbers" :key="item.id" class="flex">
                                <div class="flex space-x-2 bg-gray-200 p-1 my-2 rounded w-full text-sm align-middle">
                                    <span class="mx-2"><Mail v-if="item.new==='yes'"/>  <MailOpen v-if="item.new==='no'"/> </span> {{item.lead_number}}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="relative col-span-3 md:col-span-3 p-4 bg-white rounded-xl shadow-md border dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex "><Phone/> <h2 class="font-bold ml-4"> 000000? </h2> </div>
                    <hr>
                    <div class="mt-4">

                        <div class="w-full">
                            <div class="overflow-y-auto h-96">
                                <div class="flex items-start space-x-4 my-4">
                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex justify-center items-center text-white">U</div>
                                    <div class="bg-blue-100 p-3 rounded-lg text-sm w-3/5">
                                        <p>Hello! How can I assist you today?</p>
                                    </div>
                                </div>

                                <div class="flex items-end space-x-4 justify-end my-4">
                                    <div class="bg-gray-100 p-3 rounded-lg text-sm w-3/5">
                                        <p>Hi, I need help with my order.</p>
                                    </div>
                                    <div class="w-10 h-10 bg-gray-500 rounded-full flex justify-center items-center text-white">Me</div>
                                </div>

                                <div class="flex items-start space-x-4 my-4">
                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex justify-center items-center text-white">U</div>
                                    <div class="bg-blue-100 p-3 rounded-lg text-sm w-3/5">
                                        <p>Sure, can you provide me with your order number?</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Chat Input Form -->
                            <div class="flex items-center p-4 rounded-b-lg">
                                <input type="text" placeholder="Type a message..." class="w-full bg-gray-700 text-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button class="ml-3 p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    <PaperclipIcon/>
                                </button>
                                <button class="ml-3 p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                  <Send/>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

    <div class="min-h-screen flex items-center justify-center bg-gray-100" v-if="isOpen">
        <Modal  @toggle-modal="handleToggleModal">
            <template #modal-header>First Message</template>

            <form method="POST" @submit.prevent="handleSendSms">
                <div class="mb-4">
                    <label for="number" class="block text-gray-600 dark:text-gray-300 mb-2">Number <span class="text-red-600">*</span></label>
                    <input
                        type="number"
                        v-model="composeForm.number"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required
                    />
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-gray-600 dark:text-gray-300 mb-2">Message <span class="text-red-600">*</span></label>
                    <textarea
                        id="message"
                        name="message"
                        rows="4"
                        v-model="composeForm.message"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required
                    ></textarea>
                </div>

                <div class="mb-4">
                    <button
                        type="submit"
                        class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        <div class="flex justify-center">
                            <span class="mr-2">Send</span> <Send/>
                        </div>
                    </button>
                </div>
            </form>

        </Modal>
    </div>
</template>
