<?php


namespace Tasar\SMS;


interface SMSInterface
{
    /**
     * @param string $message
     * @param array $numbers
     * @param string|null $from
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function send(string $message, array $numbers, string $from = null);

    /**
     * @param string $message
     * @param array $numbers
     * @param string $time
     * @param string|null $from
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendPeriod(string $message, array $numbers, string $time, string $from = null);

    /**
     * @param string $messageId
     * @return array
     */
    public function getMessageStatus(string $messageId): array;
}
