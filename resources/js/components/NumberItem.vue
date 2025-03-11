<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type GatewayNumber,  type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { CloudDownload } from 'lucide-vue-next';

defineProps<{
    items: GatewayNumber[];
}>();

const page = usePage<SharedData>();

const  segments = page.url.split('/');
const  lastSegment =  parseInt(segments[segments.length - 1]);

</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarMenu>
            <SidebarMenuItem v-for="item in items" :key="item.number">
                <SidebarMenuButton as-child :is-active="item.number == lastSegment">
                    <Link :href="`/chatpanel/${item.number}`" class="flex justify-between items-center">
                        <span>{{ item.number }}</span>
                        <div class="flex space-x-2">
                            <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">10</span>
                            <component :is="CloudDownload" />
                        </div>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
