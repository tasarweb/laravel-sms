<?php

namespace Tasar\SMS;

use GuzzleHttp\Client;

class SMS
{
    protected $client;
    protected $panel;

    public function __construct()
    {
        $this->client = new Client();
        $this->panel = config('tasarsms.panel');
    }

    public function __call($name, $arguments)
    {
        $class = __NAMESPACE__ . '\\Sender\\' . ucfirst(strtolower(config('tasarsms.panel')));
        if (!method_exists($class, $name))
            throw new \BadMethodCallException();

        return call_user_func([new $class, $name], ...$arguments);
    }
}
