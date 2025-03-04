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
                'bootstrap-bg' => 'bg-dark',
                'text-class' => '',
                'done-bg' => 'bg-success-light',
                'active-bg' => 'bg-primary-lighter',
                'active-icon' => 'fa-solid fa-star-of-life fa-spin text-primary',
                'active-text' => 'text-primary',
            ],
            1 => [
                'bg-class' => 'bg-info',
                'bootstrap-bg' => 'bg-info',
                'text-class' => '',
                'active-bg' => 'bg-warning-light',
                'active-icon' => 'fa fa-sync fa-spin text-warning',
                'active-text' => 'text-warning',
            ],
            2 => [
                'bg-class' => 'bg-info',
                'bootstrap-bg' => 'bg-info',
                'text-class' => '',
                'active-bg' => 'bg-success-light',
                'active-icon' => 'fa fa-sync fa-check text-success',
                'active-text' => 'text-success',
            ],
            3 => [
                'bg-class' => 'bg-success',
                'bootstrap-bg' => 'bg-success',
                'text-class' => '',
                'active-bg' => 'bg-success-light',
                'active-icon' => 'fa fa-sync fa-check text-success',
                'active-text' => 'text-success',
            ],
            4 => [
                'bg-class' => 'bg-danger',
                'bootstrap-bg' => 'bg-success',
                'text-class' => '',
                'done-bg' => 'bg-body',
                'active-bg' => 'bg-danger-light',
                'active-icon' => 'fa fa-times text-danger',
                'active-text' => 'text-danger',
            ],
        ],
        'orders-per-page' => 20,
    ],

    'frontend' => [
        'products' => [
            'per-load' => 16,
            '4col-per-load' => 16
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
            'delivery-parcel-venipak' => [
                'title' => [
                    'lv' => 'Saņemt VENIPAK pakomātā',
                    'en' => 'Receive by parcel (VENIPAK)',
                ],
                'price' => 2.9,
            ],
            'delivery-courier' => [
                'title' => [
                    'lv' => 'Piegāde ar kurjeru (lielgabarīta precēm piegādes cena tiek aprēķināta individuāli)',
                    'en' => 'Delivery by courier (delivery price for bulky items is calculated individually)',
                ],
                'price' => 6,
            ],
        ]
    ],

    'banners' => [
        'templates' => [

            'top-image-slider' => [
                'title' => [
                    'lv' => 'Lielais slīdrādes attēls',
                    'en' => 'Big slider image',
                ],
                'description' => [
                    'lv' => 'Tiek attēlots galvenās lapas augšā',
                    'en' => 'Is shown in main page at a top',
                ],
                'color' => 'bg-primary',

                'params' => [
                    'url' => [
                        'type' => 'string',
                    ],
                    'image-main' => [
                        'width' => 1200,
                        'height' => 500,
                        'type' => 'image',
                    ],
                    'image-mobile' => [
                        'type' => 'image',
                        'width' => 568,
                        'height' => 1200,
                    ],
                ]
            ],



            'top-slider' => [
                'title' => [
                    'lv' => 'Lielais slīdrādes baneris',
                    'en' => 'Big slider banner',
                ],
                'description' => [
                    'lv' => 'Tiek attēlots galvenās lapas augšā',
                    'en' => 'Is shown in main page at a top',
                ],
                'color' => 'bg-primary',
                'width' => 324,
                'height' => 293,
                'params' => [
                    'icon-class' => [
                        'type' => 'select',
                        'special' => 'icons',
                        'list' => ['fa-solid fa-fire', 'fa-solid fa-tag', 'fa-solid fa-triangle-exclamation'],
                    ],
                    /*
                    'icon-bg-class' => [
                        'type' => 'select',
                        'special' => 'colors',
                        'list' => ['bg-success','bg-warning','bg-danger'],
                    ],
                    'icon-text-class' => [
                        'type' => 'select',
                        'special' => 'colors',
                        'list' => ['text-success','text-warning','text-danger'],
                    ],
                    */
                    'icon-text' => [
                        'type' => 'i18n',
                    ],
                    'main-text' => [
                        'type' => 'i18n',
                    ],
                    'main-text-size-px' => [
                        'type' => 'string',
                    ],
                    'main-text-mobile-size-px' => [
                        'type' => 'string',
                    ],
                    'url' => [
                        'type' => 'string',
                    ],
                    'url-text' => [
                        'type' => 'i18n',
                    ],
                    'image-main' => [
                        'type' => 'image',
                        'width' => '240',
                        'height' => '292',
                    ],
                    'bg-main' => [
                        'type' => 'image',
                    ],
                ]
            ],




            'top-product' => [
                'title' => [
                    'lv' => 'Preces baneris galvenē',
                    'en' => 'Product banner in header',
                ],
                'description' => [
                    'lv' => 'Tiek attēlots blakus slīdrādei',
                    'en' => 'Is shown in main page nead slider',
                ],
                'color' => 'bg-success',
                'width' => 125,
                'height' => 200,
                'params' => [
                    'product-code' => [
                        'type' => 'string',
                    ],
                ]
            ],


            'counter' => [
                'title' => [
                    'lv' => 'Baneris ar laika atskaiti',
                    'en' => 'Banner with time counter',
                ],
                'description' => [
                    'lv' => 'Rādās pirmajā lapā',
                    'en' => 'Is shown in main page',
                ],
                'color' => 'bg-warning',
                'params' => [
                    'icon-class' => [
                        'type' => 'select',
                        'special' => 'icons',
                        'list' => ['fa-solid fa-fire', 'fa-solid fa-tag', 'fa-solid fa-triangle-exclamation'],
                    ],
                    'icon-text' => [
                        'type' => 'i18n',
                    ],
                    'main-text' => [
                        'type' => 'i18n',
                    ],
                    'url' => [
                        'type' => 'string',
                    ],
                    'url-text' => [
                        'type' => 'i18n',
                    ],
                    'image-main' => [
                        'type' => 'image',
                        'width' => '452',
                        'height' => '502',
                    ],
                    'bg-main' => [
                        'type' => 'image',
                    ],
                ]
            ],



            'full-length' => [
                'title' => [
                    'lv' => 'Pilna platuma baneris',
                    'en' => 'Full width banner',
                ],
                'description' => [
                    'lv' => 'Tiek attēlots galvenās lapas saturā',
                    'en' => 'Is shown in main page',
                ],
                'color' => 'bg-dark',
                'params' => [
                    'url' => [
                        'type' => 'string',
                    ],
                    'image-main' => [
                        'type' => 'image',
                    ],
                    'image-mobile' => [
                        'type' => 'image',
                    ],
                ]
            ],






        ]
    ],


    'discounts' => [
        'templates' => [

            'category-discount' => [
                'title' => [
                    'lv' => 'Preču kategorijas atlaide',
                    'en' => 'Products category discount',
                ],
                'description' => [
                    'lv' => 'Ieplānot atlaidi visām precēm izvēlētajā preču kategorijā',
                    'en' => 'Schedule a discount for all products in the selected product category',
                ],
                'color' => 'bg-primary',

                'params' => [
                    'discount' => [
                        'type' => 'number',
                    ],
                    'category' => [
                        'array' => true,
                        'type' => 'category',
                    ],
                ]
            ],

            'promo-code' => [
                'title' => [
                    'lv' => 'Atlaižu kods',
                    'en' => 'Promo code',
                ],
                'description' => [
                    'lv' => 'Ieplānot atlaižu kodu',
                    'en' => 'Schedule a promo code',
                ],
                'color' => 'bg-success',

                'params' => [
                    'discount' => [
                        'type' => 'number',
                    ],
                    'category' => [
                        'array' => true,
                        'type' => 'category',
                    ],
                    'ignored' => [
                        'array' => true,
                        'type' => 'category',
                    ],
                ]
            ],



        ]
    ]



];



