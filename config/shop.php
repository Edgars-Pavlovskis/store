<?php

return [
    'languages' => [
        'default' => 'lv',
        'list' => ['lv', 'en'],
        'lv' => [
            'title' => 'Latviešu'
        ],
        'en' => [
            'title' => 'English'
        ]
    ],


    'backend' => [
        'order-statuses' => [
            0 => [
                'bg-class' => 'bg-gray-dark',
                'text-class' => '',
            ],
            1 => [
                'bg-class' => 'bg-info',
                'text-class' => '',
            ],
            2 => [
                'bg-class' => 'bg-success',
                'text-class' => '',
            ],
            3 => [
                'bg-class' => 'bg-danger',
                'text-class' => '',
            ],
        ],
    ],

    'frontend' => [
        'products' => [
            'per-load' => 9
        ],
        'delivery-options' => [
            'delivery-rezekne' => [
                'title' => [
                    'lv' => 'Piegāde Rēzeknē',
                    'en' => 'Delivery in Rezekne',
                ],
                'price' => 3,
                'freeontotal' => 10
            ],
            'takeon-rezekne' => [
                'title' => [
                    'lv' => 'Saņemt "Biroja pasaule Alba" Br.Skrindu ielā 17, Rēzeknē',
                    'en' => 'Receive at "Biroja pasaule Alba" Br. Skrindu street 17, Rēzekne',
                ],
            ],
            'takeon-vilani' => [
                'title' => [
                    'lv' => 'Saņemt "Mājturības preces ALBA" Raiņa 23K-1, Viļāni',
                    'en' => 'Receive at "Mājturības preces ALBA" Raina street 23K-1, Viļāni',
                ],
            ],
            'takeon-daugavpils' => [
                'title' => [
                    'lv' => 'Saņemt "Mājturības un kancelejas preces ALBA" Cietokšņa ielā 60, Daugavpilī',
                    'en' => 'Receive at "Mājturības un kancelejas preces ALBA" Cietokšņa street 60, Daugavpils',
                ],
            ],
            'takeon-kraslava' => [
                'title' => [
                    'lv' => 'Saņemt "Mājturības preces ALBA" Rīgas ielā 28, Krāslava',
                    'en' => 'Receive at "Mājturības preces ALBA" Rīgas street 28, Krāslava',
                ],
            ],
            'delivery-parcel' => [
                'title' => [
                    'lv' => 'Saņemt DPD pakomātā',
                    'en' => 'Receive by parcel (DPD)',
                ],
                'price' => 4,
            ],
            'delivery-courier' => [
                'title' => [
                    'lv' => 'Piegāde ar kurjeru (lielgabarīta precēm piegādes cena tiek aprēķināta individuāli)',
                    'en' => 'Delivery by courier (delivery price for bulky items is calculated individually)',
                ],
                'price' => 6,
            ],
        ]
    ]
];



