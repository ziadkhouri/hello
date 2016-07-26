<?php

return array(

    'helloIOS'     => array(
        'environment' =>'development',
        'certificate' =>'/home/vagrant/cert.pem',
        'passPhrase'  =>'password',
        'service'     =>'apns'
    ),
    'helloAndroid' => array(
        'environment' =>'production',
        'apiKey'      =>'yourAPIKey',
        'service'     =>'gcm'
    )

);