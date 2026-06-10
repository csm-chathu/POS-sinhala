import { ref, readonly } from 'vue';

const locale = ref(localStorage.getItem('locale') || 'si');

const translations = {
    si: {
        // ── Sidebar nav ───────────────────────────────────────────────
        'nav.dashboard':    'මුල් පිටුව',
        'nav.sales':        'විකුණුම්',
        'nav.products':     'භාණ්ඩ',
        'nav.purchases':    'මිලදී ගැනීම්',
        'nav.suppliers':    'සැපයුම්කරුවන්',
        'nav.customers':    'පාරිභෝගිකයන්',
        'nav.reports':      'වාර්තා',
        'nav.credit_book':  'ණය පොත',
        'nav.settings':     'සැකසුම්',
        'nav.users':        'පරිශීලකයන්',

        // ── Common buttons ────────────────────────────────────────────
        'btn.save':         'සුරකින්න',
        'btn.cancel':       'අවලංගු',
        'btn.delete':       'මකන්න',
        'btn.edit':         'සංස්කරණය',
        'btn.add':          'එකතු කරන්න',
        'btn.search':       'සොයන්න',
        'btn.close':        'වසන්න',
        'btn.print':        'මුද්‍රණය',
        'btn.logout':       'පිටවන්න',
        'btn.back':         'ආපසු',
        'btn.create':       'නව',
        'btn.view':         'බලන්න',
        'btn.settle':       'ගෙවන්න',
        'btn.report':       'වාර්තාව',
        'btn.complete':     'සම්පූර්ණ',
        'btn.hold':         'රඳවන්න',

        // ── Common table headers ───────────────────────────────────────
        'th.name':          'නම',
        'th.phone':         'දුරකථනය',
        'th.email':         'විද්‍යුත් තැපෑල',
        'th.address':       'ලිපිනය',
        'th.actions':       'ක්‍රියා',
        'th.date':          'දිනය',
        'th.total':         'මුළු',
        'th.paid':          'ගෙවූ',
        'th.balance':       'ශේෂය',
        'th.qty':           'ප්‍රමාණය',
        'th.price':         'මිල',
        'th.status':        'තත්ත්වය',
        'th.invoice':       'ඉන්වොයිස්',
        'th.product':       'භාණ්ඩය',
        'th.category':      'වර්ගය',
        'th.stock':         'තොගය',

        // ── Common labels ─────────────────────────────────────────────
        'lbl.profile':      'පැතිකඩ',
        'lbl.language':     'භාෂාව',
        'lbl.loading':      'පූරණය වෙමින්...',
        'lbl.no_data':      'දත්ත නොමැත',
        'lbl.search_hint':  'සොයන්න...',
        'lbl.total':        'මුළු',
        'lbl.subtotal':     'උප එකතුව',
        'lbl.discount':     'වට්ටම',
        'lbl.tax':          'බද්ද',
        'lbl.grand_total':  'මහා එකතුව',
        'lbl.cash':         'මුදල්',
        'lbl.card':         'කාඩ්',
        'lbl.credit':       'ණය',
        'lbl.change':       'ඉතිරිය',
        'lbl.customer':     'ගනුදෙනුකරු',
        'lbl.cashier':      'අශ්‍රිත',
        'lbl.note':         'සටහන',
        'lbl.active':       'සක්‍රිය',
        'lbl.inactive':     'අක්‍රිය',

        // ── Page titles ───────────────────────────────────────────────
        'page.dashboard':       'මුල් පිටුව',
        'page.sales':           'විකුණුම්',
        'page.new_sale':        'නව විකුණුමක්',
        'page.sale_receipt':    'රිසිට් පත',
        'page.products':        'භාණ්ඩ',
        'page.new_product':     'නව භාණ්ඩය',
        'page.purchases':       'මිලදී ගැනීම්',
        'page.new_purchase':    'නව මිලදී ගැනීම',
        'page.suppliers':       'සැපයුම්කරුවන්',
        'page.customers':       'පාරිභෝගිකයන්',
        'page.reports':         'වාර්තා',
        'page.credit_book':     'ණය පොත',
        'page.settings':        'සැකසුම්',
        'page.users':           'පරිශීලකයන්',

        // ── Dashboard ─────────────────────────────────────────────────
        'dash.today_sales':     'අද විකුණුම්',
        'dash.today_revenue':   'අද ආදායම',
        'dash.total_products':  'භාණ්ඩ ගණන',
        'dash.low_stock':       'අඩු තොග',
        'dash.recent_sales':    'මෑත විකුණුම්',

        // ── Reports ───────────────────────────────────────────────────
        'rep.today':            'අද විකුණුම්',
        'rep.monthly':          'මාසික විකුණුම්',
        'rep.top_products':     'ඉහළ භාණ්ඩ',
        'rep.low_stock':        'අඩු තොග',
        'rep.profit':           'ලාභ වාර්තාව',
        'rep.credit':           'ණය පාරිභෝගිකයන්',

        // ── Settings ─────────────────────────────────────────────────
        'set.shop_name':        'වෙළඳසල් නම',
        'set.shop_address':     'ලිපිනය',
        'set.shop_phone':       'දුරකථනය',
        'set.tax_rate':         'බදු අනුපාතය',
        'set.currency':         'මුදල් ඒකකය',
        'set.receipt_footer':   'රිසිට් පාදය',
        'set.saved':            'සැකසුම් සුරකිනා ලදී',
    },

    en: {
        // ── Sidebar nav ───────────────────────────────────────────────
        'nav.dashboard':    'Dashboard',
        'nav.sales':        'Sales',
        'nav.products':     'Products',
        'nav.purchases':    'Purchases',
        'nav.suppliers':    'Suppliers',
        'nav.customers':    'Customers',
        'nav.reports':      'Reports',
        'nav.credit_book':  'Credit Book',
        'nav.settings':     'Settings',
        'nav.users':        'Users',

        // ── Common buttons ────────────────────────────────────────────
        'btn.save':         'Save',
        'btn.cancel':       'Cancel',
        'btn.delete':       'Delete',
        'btn.edit':         'Edit',
        'btn.add':          'Add',
        'btn.search':       'Search',
        'btn.close':        'Close',
        'btn.print':        'Print',
        'btn.logout':       'Logout',
        'btn.back':         'Back',
        'btn.create':       'New',
        'btn.view':         'View',
        'btn.settle':       'Settle',
        'btn.report':       'Report',
        'btn.complete':     'Complete',
        'btn.hold':         'Hold',

        // ── Common table headers ───────────────────────────────────────
        'th.name':          'Name',
        'th.phone':         'Phone',
        'th.email':         'Email',
        'th.address':       'Address',
        'th.actions':       'Actions',
        'th.date':          'Date',
        'th.total':         'Total',
        'th.paid':          'Paid',
        'th.balance':       'Balance',
        'th.qty':           'Qty',
        'th.price':         'Price',
        'th.status':        'Status',
        'th.invoice':       'Invoice',
        'th.product':       'Product',
        'th.category':      'Category',
        'th.stock':         'Stock',

        // ── Common labels ─────────────────────────────────────────────
        'lbl.profile':      'Profile',
        'lbl.language':     'Language',
        'lbl.loading':      'Loading...',
        'lbl.no_data':      'No data',
        'lbl.search_hint':  'Search...',
        'lbl.total':        'Total',
        'lbl.subtotal':     'Subtotal',
        'lbl.discount':     'Discount',
        'lbl.tax':          'Tax',
        'lbl.grand_total':  'Grand Total',
        'lbl.cash':         'Cash',
        'lbl.card':         'Card',
        'lbl.credit':       'Credit',
        'lbl.change':       'Change',
        'lbl.customer':     'Customer',
        'lbl.cashier':      'Cashier',
        'lbl.note':         'Note',
        'lbl.active':       'Active',
        'lbl.inactive':     'Inactive',

        // ── Page titles ───────────────────────────────────────────────
        'page.dashboard':       'Dashboard',
        'page.sales':           'Sales',
        'page.new_sale':        'New Sale',
        'page.sale_receipt':    'Receipt',
        'page.products':        'Products',
        'page.new_product':     'New Product',
        'page.purchases':       'Purchases',
        'page.new_purchase':    'New Purchase',
        'page.suppliers':       'Suppliers',
        'page.customers':       'Customers',
        'page.reports':         'Reports',
        'page.credit_book':     'Credit Book',
        'page.settings':        'Settings',
        'page.users':           'Users',

        // ── Dashboard ─────────────────────────────────────────────────
        'dash.today_sales':     "Today's Sales",
        'dash.today_revenue':   "Today's Revenue",
        'dash.total_products':  'Total Products',
        'dash.low_stock':       'Low Stock',
        'dash.recent_sales':    'Recent Sales',

        // ── Reports ───────────────────────────────────────────────────
        'rep.today':            "Today's Sales",
        'rep.monthly':          'Monthly Sales',
        'rep.top_products':     'Top Products',
        'rep.low_stock':        'Low Stock',
        'rep.profit':           'Profit Report',
        'rep.credit':           'Credit Customers',

        // ── Settings ─────────────────────────────────────────────────
        'set.shop_name':        'Shop Name',
        'set.shop_address':     'Address',
        'set.shop_phone':       'Phone',
        'set.tax_rate':         'Tax Rate',
        'set.currency':         'Currency',
        'set.receipt_footer':   'Receipt Footer',
        'set.saved':            'Settings saved',
    },
};

function t(key) {
    return translations[locale.value]?.[key] ?? translations['si'][key] ?? key;
}

function toggleLocale() {
    locale.value = locale.value === 'si' ? 'en' : 'si';
    localStorage.setItem('locale', locale.value);
}

export function useLocale() {
    return { locale: readonly(locale), t, toggleLocale };
}
