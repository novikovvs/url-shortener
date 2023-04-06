<?php

return [
    'token_length' => env('SHORTENER_TOKEN_LENGTH', 6),
    'generate_tries' => env('SHORTENER_GENERATE_TOKEN_TRIES', 15)
];
