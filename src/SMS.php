<?php

namespace Tasar\SMS;

class SMS
{
    public function send(string $message, array $numbers, string $from = null)
    {
        return 'sending...';
        $from = is_null($from) ? config('SMS::tasarsms.default_number') : $from;
    }
}