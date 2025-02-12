<?php

return [
    'banners' => [
        'type' => 'Nav izvēlēts banera veids',
    ],
    'contacts' => [
        'name' => 'Nav ievadīts Jūsu vārds',
        'email' => 'E-pasta adreses formāts ir nekorekts',
        'message' => 'Nav ievadīts ziņojuma teksts',
    ],
    'password' => [
        'required' => 'Nav ievadīta aktuālā parole',
        'current_password' => 'Aktuālā parole ir nepareiza',
        'new_password' => [
            'min' => 'Parolei ir jābūt minimāli 8 simboli garai',
            'required' => 'Nav ievadīta jaunā parole',
            'confirmed' => 'Jaunā parole nesakrīt ar paroles apstiprinājumu',
        ]
    ],
    'name' => [
        'min' => 'Minimāli 3 simboli',
        'max' => 'Minimāli 30 simboli',
        'required' => 'Nav ievadīts jaunais vārds / nosaukums',
        'regex' => 'Atļauts izmantot tikai burtus un tukšumzīmes',
    ],



    'custom' => [
        'email' => [
            'unique' => 'Šāda e-pasta adrese jau ir reģistrēta',
        ],
        'password' => [
            'min' => 'Parolei ir jābūt minimāli 8 simboli garai',
            'required' => 'Nav ievadīta parole',
            'current_password' => 'Aktuālā parole ir nepareiza',
            'confirmed' => 'Paroles nesakrīt',
        ],
    ],




    'custom' => [
        'name' => [
            'min' => 'Minimāli 3 simboli',
            'max' => 'Minimāli 30 simboli',
            'required' => 'Nav ievadīts jaunais vārds / nosaukums',
            'regex' => 'Atļauts izmantot tikai burtus un tukšumzīmes', // Ensure this is within 'custom' array
        ],
    ],



    'xxxaxaxax' => 'The :attribute field must match :other.'
];
