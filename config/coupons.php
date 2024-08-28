<?php

return [
    'list' => [
        'KONKURSS2024' => [
            'title' => ['lv'=>'-20% atlaide iepērkoties birojamunskolai.lv (neattiecas uz pārtikas precēm)'],
            'badge-class' => 'text-bg-warning',
            'discount'=> [
                'amount' => 20,
                'ignored'=> ['partikas-preces'],
            ],
            'datestart' => '2024-08-01', // YYYY-MM-DD format
            'dateend' => '2024-09-30',   // YYYY-MM-DD format
        ],
        'PIRKUMS20' => [
            'title' => ['lv'=>'-20% atlaide iepērkoties birojamunskolai.lv'],
            'badge-class' => 'text-bg-warning',
            'discount'=> [
                'amount' => 20,
                'ignored'=> [],
            ],
            'datestart' => '2024-08-28', // YYYY-MM-DD format
            'dateend' => '2024-10-15',   // YYYY-MM-DD format
        ],
    ]
];



