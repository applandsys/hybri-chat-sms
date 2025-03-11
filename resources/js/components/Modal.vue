<template>
    <div>
        <div
            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 z-50"
        >
            <div class="relative bg-white rounded-lg shadow-lg w-96 p-6">
                <!-- Cross button to close the modal -->
                <button
                    @click="toggleModal"
                    class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl"
                >
                    &times;
                </button>
                <h2 class="text-xl font-semibold mb-4"><slot name="modal-header"></slot></h2>
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">

const emit = defineEmits(['toggleModal']);
const toggleModal = () => {
    emit('toggleModal')
}

</script>
