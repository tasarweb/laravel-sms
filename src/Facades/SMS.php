<?php
namespace Tasar\SMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Psr\Http\Message\ResponseInterface send(string $message, array $numbers, string $from = null)
 * @method static \Psr\Http\Message\ResponseInterface sendPeriod(string $message, array $numbers, string $time, string $from = null)
 * @method static array getMessageStatus(string $messageId)
 *
 */
class SMS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tasar-sms';
    }
}
