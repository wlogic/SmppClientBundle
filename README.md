SmppClientBundle
================

PHP 5 based SMPP client bundle for Symfony2. Forked from https://github.com/onlinecity/php-smpp

For now, it only sends messages.. trasmitter mode

Installation
------------
Add to composer.json

    "kronas/smpp-client-bundle": "1.0.0-dev"

Add to AppKernel.php

    public function registerBundles()
        {
            $bundles = array(
                ...
                new Kronas\SmppClientBundle\KronasSmppClientBundle(),
                ...
            );
        return $bundles;
    }

Add to config.yml

    kronas_smpp_client:
        host: %smpp_host%
        port: %smpp_port%
        login: %smpp_login%
        password: %smpp_password%
        signature: %smpp_sigranure%

Usage
-----

    $smpp = $this->get('kronas_smpp_client.transmitter');

    $smpp->send($phone_number, $message);

*Phone number must be in international format without "+"

** Function "send" return a message ID