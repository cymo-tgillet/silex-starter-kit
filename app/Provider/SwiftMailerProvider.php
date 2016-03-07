<?php

namespace Mooc\Provider;

use Johndodev\Component\Config\ConfigBag;
use Johndodev\Provider\AbstractProvider;
use Pimple\Container;

class SwiftMailerProvider extends AbstractProvider
{
    public function register(Container $container)
    {
        /** @var ConfigBag $config */
        $config = $container['config'];

        $container['swiftmailer.options'] = [
            'host' => $config->get('email.smtp_host'),
            'port' => $config->get('email.smtp_port'),
            'username' => $config->get('email.smtp_user'),
            'password' => $config->get('email.smtp_pass'),
            'encryption' => $config->get('email.encryption'),
            'auth_mode' => null
        ];
    }
}
