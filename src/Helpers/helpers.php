<?php

use Tasar\SMS\Facades\SMS;

if (!function_exists('tasarSendSms')) {
    function tasarSendSms(string $message, array $numbers, string $from = null)
    {
        return SMS::send($message, $numbers, $from);
    }
}

if (!function_exists('tasarSendPeriodSms')) {
    function tasarSendPeriodSms(string $message, array $numbers, string $time, string $from = null)
    {
        return SMS::sendPeriod($message, $numbers, $time, $from);
    }
}

if (!function_exists('tasarMessageStatus')) {
    function tasarMessageStatus(string $messageId)
    {
        return SMS::getMessageStatus($messageId);
    }
}
