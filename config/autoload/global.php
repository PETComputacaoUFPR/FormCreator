<?php

$dbParams = array(
		'database'  => 'test3',
		'username'  => 'root',
		'password'  => 'repede',
		'hostname'  => 'localhost',
);

return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => function ($sm) use ($dbParams) {
                return new Zend\Db\Adapter\Adapter(array(
                     'driver' => 'Pdo_Sqlite',
                    'database' => '/home/ubuntu/workspace/Zend-Form/data/sqlite.db'
                ));
            },
        ),
    ),
);