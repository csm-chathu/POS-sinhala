<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_variants')->delete();
        DB::table('products')->delete();
        DB::table('categories')->delete();

        // ── Categories ────────────────────────────────────────────────────────
        $cats = [
            'Rice & Grains'  => 'හාල් සහ ධාන්‍ය',
            'Flour'          => 'පිටි',
            'Sugar & Salt'   => 'සීනි සහ ලුණු',
            'Oils & Fats'    => 'තෙල් සහ මේද',
            'Dhal & Pulses'  => 'දාල් සහ රනිල',
            'Spices'         => 'කුළුබඩු',
            'Other'          => 'වෙනත්',
        ];

        $catIds = [];
        foreach ($cats as $name => $nameSi) {
            $catIds[$name] = DB::table('categories')->insertGetId([
                'name'       => $name,
                'name_si'    => $nameSi,
                'slug'       => Str::slug($name),
                'active'     => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // ── Products with variants ────────────────────────────────────────────
        // Each variant: [label, cost, selling, wholesale, stock]
        // 'base' => index of the default variant shown on product card
        $withVariants = [

            // Flour
            [
                'cat' => 'Flour', 'name' => 'Wheat Flour', 'name_si' => 'තිරිඟු පිටි',
                'sku' => 'FLR-WHT', 'unit' => 'kg', 'base' => 1,
                'v' => [
                    ['500g',   120,  140,  130,  80],
                    ['1kg',    235,  270,  255, 120],
                    ['2kg',    465,  530,  500,  60],
                ],
            ],
            [
                'cat' => 'Flour', 'name' => 'Rice Flour', 'name_si' => 'හාල් පිටි',
                'sku' => 'FLR-RICE', 'unit' => 'kg', 'base' => 1,
                'v' => [
                    ['500g',   100,  115,  108,  60],
                    ['1kg',    195,  225,  210,  80],
                ],
            ],

            // Rice & Grains
            [
                'cat' => 'Rice & Grains', 'name' => 'Samba Rice', 'name_si' => 'සම්බා හාල්',
                'sku' => 'RICE-SAM', 'unit' => 'kg', 'base' => 1,
                'v' => [
                    ['500g',   115,  130,  120, 100],
                    ['1kg',    230,  260,  245, 150],
                    ['5kg',   1100, 1250, 1180,  50],
                    ['25kg',  5200, 5800, 5500,  20],
                ],
            ],
            [
                'cat' => 'Rice & Grains', 'name' => 'Nadu Rice', 'name_si' => 'නාඩු හාල්',
                'sku' => 'RICE-NAD', 'unit' => 'kg', 'base' => 0,
                'v' => [
                    ['1kg',    215,  240,  228, 120],
                    ['5kg',   1020, 1150, 1090,  40],
                    ['25kg',  4800, 5400, 5100,  15],
                ],
            ],

            // Sugar & Salt
            [
                'cat' => 'Sugar & Salt', 'name' => 'White Sugar', 'name_si' => 'සුදු සීනි',
                'sku' => 'SUG-WHT', 'unit' => 'kg', 'base' => 1,
                'v' => [
                    ['500g',   110,  125,  118, 100],
                    ['1kg',    215,  245,  230, 150],
                    ['5kg',   1050, 1200, 1130,  40],
                ],
            ],
            [
                'cat' => 'Sugar & Salt', 'name' => 'Jaggery', 'name_si' => 'හකුරු',
                'sku' => 'SUG-JGR', 'unit' => 'kg', 'base' => 1,
                'v' => [
                    ['500g',   195,  225,  210,  40],
                    ['1kg',    380,  440,  415,  30],
                ],
            ],
            [
                'cat' => 'Sugar & Salt', 'name' => 'Iodised Salt', 'name_si' => 'ලුණු',
                'sku' => 'SLT-IOD', 'unit' => 'kg', 'base' => 1,
                'v' => [
                    ['500g',    35,   45,   40, 100],
                    ['1kg',     65,   80,   73, 150],
                ],
            ],

            // Oils & Fats
            [
                'cat' => 'Oils & Fats', 'name' => 'Coconut Oil', 'name_si' => 'පොල් තෙල්',
                'sku' => 'OIL-COC', 'unit' => 'L', 'base' => 1,
                'v' => [
                    ['500ml',  350,  395,  375,  60],
                    ['1L',     690,  780,  740,  80],
                    ['2L',    1350, 1520, 1440,  30],
                ],
            ],
            [
                'cat' => 'Oils & Fats', 'name' => 'Sunflower Oil', 'name_si' => 'සූරියකාන්ත තෙල්',
                'sku' => 'OIL-SUN', 'unit' => 'L', 'base' => 1,
                'v' => [
                    ['500ml',  280,  320,  305,  50],
                    ['1L',     555,  630,  595,  70],
                    ['2L',    1100, 1250, 1180,  25],
                ],
            ],

            // Dhal & Pulses
            [
                'cat' => 'Dhal & Pulses', 'name' => 'Red Lentils (Dhal)', 'name_si' => 'රතු දාල්',
                'sku' => 'DAL-RED', 'unit' => 'kg', 'base' => 2,
                'v' => [
                    ['250g',    85,  100,   92,  80],
                    ['500g',   165,  195,  180, 100],
                    ['1kg',    325,  380,  355,  60],
                ],
            ],
            [
                'cat' => 'Dhal & Pulses', 'name' => 'Green Gram', 'name_si' => 'මුං ඇට',
                'sku' => 'DAL-GRN', 'unit' => 'kg', 'base' => 1,
                'v' => [
                    ['500g',   175,  205,  190,  80],
                    ['1kg',    340,  395,  370,  40],
                ],
            ],
            [
                'cat' => 'Dhal & Pulses', 'name' => 'Chickpeas', 'name_si' => 'කඩල',
                'sku' => 'PUL-CHK', 'unit' => 'kg', 'base' => 1,
                'v' => [
                    ['500g',   195,  225,  212,  50],
                    ['1kg',    380,  440,  415,  30],
                ],
            ],
            [
                'cat' => 'Dhal & Pulses', 'name' => 'Parippu (Yellow Lentils)', 'name_si' => 'පරිප්පු',
                'sku' => 'DAL-YLW', 'unit' => 'kg', 'base' => 1,
                'v' => [
                    ['250g',    80,   95,   88,  80],
                    ['500g',   155,  180,  168, 100],
                    ['1kg',    305,  355,  332,  60],
                ],
            ],
            [
                'cat' => 'Dhal & Pulses', 'name' => 'Soya Meat', 'name_si' => 'සෝයා මස්',
                'sku' => 'PUL-SOY', 'unit' => 'g', 'base' => 1,
                'v' => [
                    ['100g',   145,  170,  158,  60],
                    ['200g',   280,  325,  305,  60],
                    ['500g',   680,  790,  740,  30],
                ],
            ],

            // Spices
            [
                'cat' => 'Spices', 'name' => 'Chili Powder', 'name_si' => 'මිරිස් කුඩු',
                'sku' => 'SPC-CHI', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['100g',   110,  130,  120,  60],
                    ['200g',   215,  250,  235,  80],
                    ['500g',   520,  600,  565,  30],
                ],
            ],
            [
                'cat' => 'Spices', 'name' => 'Turmeric Powder', 'name_si' => 'කහ කුඩු',
                'sku' => 'SPC-TUR', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['100g',   145,  170,  158,  80],
                    ['200g',   280,  325,  305,  40],
                    ['500g',   680,  780,  735,  20],
                ],
            ],
            [
                'cat' => 'Spices', 'name' => 'Curry Powder', 'name_si' => 'කරි කුඩු',
                'sku' => 'SPC-CRP', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['100g',   165,  195,  182,  60],
                    ['200g',   320,  375,  350,  40],
                ],
            ],
            [
                'cat' => 'Spices', 'name' => 'Fenugreek', 'name_si' => 'උළු හාල්',
                'sku' => 'SPC-FEN', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['100g',   120,  145,  133,  40],
                    ['200g',   235,  275,  258,  30],
                ],
            ],
            [
                'cat' => 'Spices', 'name' => 'Mustard Seeds', 'name_si' => 'අබ ඇට',
                'sku' => 'SPC-MST', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['100g',   145,  170,  158,  40],
                    ['200g',   280,  325,  305,  30],
                ],
            ],
            [
                'cat' => 'Spices', 'name' => 'Dried Chili', 'name_si' => 'වියළි මිරිස්',
                'sku' => 'SPC-DRC', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['50g',     95,  115,  105,  40],
                    ['100g',   185,  220,  205,  30],
                ],
            ],
            [
                'cat' => 'Spices', 'name' => 'Goraka', 'name_si' => 'ගොරකා',
                'sku' => 'SPC-GRK', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['100g',   165,  195,  182,  30],
                    ['200g',   320,  375,  350,  20],
                ],
            ],
            [
                'cat' => 'Spices', 'name' => 'Maldive Fish', 'name_si' => 'උම්බලකඩ',
                'sku' => 'SPC-MLF', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['100g',   280,  325,  305,  40],
                    ['200g',   550,  635,  595,  25],
                ],
            ],
            [
                'cat' => 'Spices', 'name' => 'Black Pepper', 'name_si' => 'ගම්මිරිස්',
                'sku' => 'SPC-BPP', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['50g',    140,  165,  155,  30],
                    ['100g',   280,  325,  305,  40],
                ],
            ],
            [
                'cat' => 'Spices', 'name' => 'Cinnamon', 'name_si' => 'කුරුඳු',
                'sku' => 'SPC-CIN', 'unit' => 'g', 'base' => 0,
                'v' => [
                    ['50g',    195,  230,  215,  40],
                    ['100g',   380,  445,  415,  25],
                ],
            ],
        ];

        foreach ($withVariants as $p) {
            $base      = $p['v'][$p['base']];
            $baseCost  = $base[1];
            $basePrice = $base[2];
            $baseWs    = $base[3];
            $baseStock = $base[4];

            $pid = DB::table('products')->insertGetId([
                'category_id'     => $catIds[$p['cat']],
                'name'            => $p['name'],
                'name_si'         => $p['name_si'],
                'sku'             => $p['sku'],
                'unit'            => $p['unit'],
                'cost_price'      => $baseCost,
                'selling_price'   => $basePrice,
                'wholesale_price' => $baseWs,
                'stock_qty'       => $baseStock,
                'alert_qty'       => 5,
                'active'          => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);

            foreach ($p['v'] as [$label, $cost, $price, $ws, $stock]) {
                DB::table('product_variants')->insert([
                    'product_id'      => $pid,
                    'label'           => $label,
                    'barcode'         => null,
                    'cost_price'      => $cost,
                    'selling_price'   => $price,
                    'wholesale_price' => $ws,
                    'stock_qty'       => $stock,
                    'alert_qty'       => 10,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);
            }
        }
    }
}
