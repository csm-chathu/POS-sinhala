<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, inject } from 'vue';

const t = inject('t');

const props = defineProps({
    byDay:   { type: Array,  default: () => [] },
    summary: { type: Object, default: () => ({}) },
    month:   { type: String, default: '' },
});

const selectedMonth = ref(props.month);

function fmt(v) {
    return 'Rs. ' + Number(v || 0).toLocaleString('en-LK', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function changeMonth() {
    router.get(route('reports.monthly'), { month: selectedMonth.value }, { preserveScroll: true });
}
</script>

<template>
    <Head :title="t('rep.monthly')" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center gap-3 flex-wrap">
                <Link :href="route('reports.index')" class="text-slate-400 hover:text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                </Link>
                <h1 class="text-xl font-bold" style="color:#0F172A;">{{ t('rep.monthly') }} — {{ summary.month }}</h1>
                <div class="ml-auto flex items-center gap-2">
                    <input type="month" v-model="selectedMonth" @change="changeMonth"
                        class="rounded-lg px-3 py-1.5 text-sm outline-none" style="border:1px solid #E2E8F0; color:#0F172A;" />
                </div>
            </div>
        </template>

        <!-- Summary -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-xl p-4 shadow-sm" style="border:1px solid #E2E8F0;">
                <p class="text-xs text-slate-500 mb-1">{{ t('rep.total_sales') }}</p>
                <p class="text-2xl font-bold" style="color:#2563EB;">{{ summary.total_sales }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm" style="border:1px solid #E2E8F0;">
                <p class="text-xs text-slate-500 mb-1">{{ t('rep.total_revenue') }}</p>
                <p class="text-xl font-bold" style="color:#16A34A;">{{ fmt(summary.total_revenue) }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm" style="border:1px solid #E2E8F0;">
                <p class="text-xs text-slate-500 mb-1">{{ t('rep.total_discount') }}</p>
                <p class="text-xl font-bold" style="color:#F59E0B;">{{ fmt(summary.total_discount) }}</p>
            </div>
        </div>

        <!-- Daily breakdown table -->
        <div class="bg-white rounded-xl shadow-sm" style="border:1px solid #E2E8F0;">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase" style="background:#F8FAFC; border-bottom:1px solid #E2E8F0;">
                            <th class="px-4 py-3 text-left">{{ t('th.date') }}</th>
                            <th class="px-4 py-3 text-center">{{ t('rep.total_sales') }}</th>
                            <th class="px-4 py-3 text-right">{{ t('rep.total_revenue') }}</th>
                            <th class="px-4 py-3 text-right">{{ t('lbl.discount') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="byDay.length === 0"><td colspan="4" class="px-4 py-8 text-center text-slate-400">{{ t('lbl.no_data') }}</td></tr>
                        <tr v-for="row in byDay" :key="row.date" class="hover:bg-slate-50" style="border-bottom:1px solid #F1F5F9;">
                            <td class="px-4 py-2.5 font-medium" style="color:#0F172A;">{{ row.date }}</td>
                            <td class="px-4 py-2.5 text-center text-slate-600">{{ row.count }}</td>
                            <td class="px-4 py-2.5 text-right font-semibold" style="color:#16A34A;">{{ fmt(row.total) }}</td>
                            <td class="px-4 py-2.5 text-right" style="color:#F59E0B;">{{ fmt(row.discount) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
