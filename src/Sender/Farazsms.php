<?php

namespace Tasar\SMS\Sender;

use Tasar\SMS\SMS;
use Tasar\SMS\SMSInterface;

class Farazsms extends SMS implements SMSInterface
{
    /**
     * @param string $message
     * @param array $numbers
     * @param string|null $from
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function send(string $message, array $numbers, string $from = null)
    {
        $from = is_null($from) ? config("tasarsms.farazsms.default_number") : $from;

        return $this->sendPost([
            'from' => $from,
            'message' => $message,
            'to' => json_encode($numbers),
            'op' => 'send'
        ]);
    }

    /**
     * @param string $messageId
     * @return array
     */
    public function getMessageStatus(string $messageId): array
    {
        $result = $this->sendPost([
            'messageid' => $messageId,
            'op' => 'checkmessage'
        ])->getBody()->getContents();

        return json_decode($result, true);
    }

    /**
     * @param string $message
     * @param array $numbers
     * @param string $time
     * @param string|null $from
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendPeriod(string $message, array $numbers, string $time, string $from = null)
    {
        $from = is_null($from) ? config("tasarsms.{$this->panel}.default_number") : $from;

        return $this->sendPost([
            'from' => $from,
            'message' => $message,
            'to' => json_encode($numbers),
            'time' => $time,
            'op' => 'send'
        ]);
    }

    /**
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function sendPost(array $params)
    {
        $defaultParams = [
            'form_params' => [
                'uname' => config("tasarsms.farazsms.username"),
                'pass' => config("tasarsms.farazsms.password"),
            ]
        ];
        $mergedParams = array_merge($defaultParams['form_params'], $params);
        $finalParams['form_params'] = $mergedParams;

        return $this->client->post(config("tasarsms.farazsms.url"), $finalParams);
    }
}
