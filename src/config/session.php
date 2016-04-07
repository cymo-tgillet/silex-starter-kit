<?php

return [
    'session.storage.options' => [
        'cookie_lifetime' => 2629743, // 1 mois
        'gc_maxlifetime' => 2629743, // 1 mois
        'gc_probability' => 1,
        'gc_divisor' => 100,
        'cookie_httponly' => true
    ],

    'session.storage.save_path' => __DIR__.'/../../var/sessions/',
];
