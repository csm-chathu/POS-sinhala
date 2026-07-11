<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { inject, computed } from 'vue';

const t = inject('t');
const numpadEnabled = inject('numpadEnabled', computed(() => false));
const openNumpad    = inject('openNumpad', () => {});

const props = defineProps({
    customer: { type: Object, required: true },
});

const form = useForm({
    name: props.customer.name || '',
    phone: props.customer.phone || '',
    email: props.customer.email || '',
    address: props.customer.address || '',
    credit_limit: props.customer.credit_limit || 0,
});

function submit() {
    form.put(route('customers.update', props.customer.id));
}
</script>

<template>
    <Head :title="t('page.edit_product')" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center gap-2">
                <Link :href="route('customers.index')" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </Link>
                <h1 class="text-xl font-bold text-gray-800">{{ t('page.customers') }}</h1>
            </div>
        </template>

        <div class="max-w-lg">
            <form @submit.prevent="submit" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ t('cust.name') }} <span class="text-red-500">*</span></label>
                    <input
                        v-model="form.name"
                        type="text"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[44px]"
                        :class="{ 'border-red-500': form.errors.name }"
                    />
                    <p v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ t('cust.phone') }}</label>
                        <input
                            v-model="form.phone"
                            type="tel"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[44px]"
                            :class="{ 'border-red-500': form.errors.phone }"
                        />
                        <p v-if="form.errors.phone" class="text-red-500 text-xs mt-1">{{ form.errors.phone }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ t('cust.email') }}</label>
                        <input
                            v-model="form.email"
                            type="email"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[44px]"
                            :class="{ 'border-red-500': form.errors.email }"
                        />
                        <p v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ t('cust.address') }}</label>
                    <textarea
                        v-model="form.address"
                        rows="3"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    ></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ t('cust.credit_limit') }} (Rs.)</label>
                    <input
                        v-model="form.credit_limit"
                        type="number"
                        step="0.01"
                        min="0"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[44px]"
                        :class="[{ 'border-red-500': form.errors.credit_limit }, numpadEnabled ? 'cursor-pointer' : '']"
                        :readonly="numpadEnabled"
                        @click="numpadEnabled && openNumpad(form.credit_limit, t('cust.credit_limit'), v => form.credit_limit = parseFloat(v) || 0)"
                    />
                    <p v-if="form.errors.credit_limit" class="text-red-500 text-xs mt-1">{{ form.errors.credit_limit }}</p>
                </div>

                <!-- Read-only credit balance info -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-500">{{ t('lbl.credit_balance') }}</p>
                    <p class="text-lg font-bold" :class="props.customer.credit_balance > 0 ? 'text-red-600' : 'text-green-600'">
                        Rs. {{ Number(props.customer.credit_balance || 0).toLocaleString('en-LK', { minimumFractionDigits: 2 }) }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 disabled:opacity-50 text-white font-medium py-3 px-6 rounded-lg transition-colors min-h-[44px]"
                    >
                        {{ form.processing ? t('lbl.loading') : t('btn.save') }}
                    </button>
                    <Link
                        :href="route('customers.index')"
                        class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-6 rounded-lg transition-colors min-h-[44px] flex items-center justify-center"
                    >
                        {{ t('btn.cancel') }}
                    </Link>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
