<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tailwind CSS Utility Classes
    |--------------------------------------------------------------------------
    |
    | Utilities are simple HTML classes typically scoped to a single CSS property,
    | like border-style or background-color . Utilities can be used additively to
    | style an object from scratch or to override a style defined in component CSS.
    |
     */

    'null' => '',

    'label' => 'text-gray-700 form-label',

    'input' => 'block w-full mt-1 text-sm focus:border-gray-400 focus:outline-none form-input',

    'checkbox' => 'text-red-600 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-checkbox',

    'btn' => [
        'main' => 'block w-full mt-4 text-sm font-medium leading-5 rounded-md :btn-login',

        'oauth' => 'flex items-center justify-center w-full text-sm font-medium leading-5 transition-colors duration-150 border rounded-md active:bg-transparent focus:outline-none button-oauth',
    ],

    'nav-link' => 'text-sm font-medium hover:underline',
];
