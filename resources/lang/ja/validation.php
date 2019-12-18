<?php

return [
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'email' => [
            'required' => ':attributeを入力してください',
        ],
        'password' => [
            'required' => ':attributeを入力してください',
        ],

        /*
        |--------------------------------------------------------------------------
        | Custom Validation Attributes
        |--------------------------------------------------------------------------
        |
        | The following language lines are used to swap attribute place-holders
        | with something more reader friendly such as E-Mail Address instead
        | of "email". This simply helps us make messages a little cleaner.
        |
        */

        'attributes' => [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ],
    ]
];
