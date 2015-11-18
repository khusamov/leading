Install
=======

Main Install
------------

1. Add the following statement to the requirements-block of your composer.json: "zf2book/zf-deals": "dev-master","dlu/dlutwbootstrap": "dev-master"
2. Run a composer update to download the libraries needed.
3. Add "ZfDeals" and "DluTwBootstrap" to the list of active modules in `application.config.php`
4. Import the SQL schema located in `/vendor/zf2book/zf-deals/data/structure.sql`
5. Copy `/vendor/zf2book/zf-deals/data/public/zf-deals` to the public folder of your application.

Post Install
------------

1. If you do not already have a valid Zend\Db\Adapter\Adapter in your service
   manager configuration, put the following in `/config/autoload/db.local.php`:

        <?php

        $dbParams = array(
            'database'  => 'changeme',
            'username'  => 'changeme',
            'password'  => 'changeme',
            'hostname'  => 'changeme',
        );

        return array(
            'service_manager' => array(
                'factories' => array(
                    'Zend\Db\Adapter\Adapter' => function ($sm) use ($dbParams) {
                        return new Zend\Db\Adapter\Adapter(array(
                            'driver'    => 'pdo',
                            'dsn'       => 'mysql:dbname='.$dbParams['database'].';host='.$dbParams['hostname'],
                            'database'  => $dbParams['database'],
                            'username'  => $dbParams['username'],
                            'password'  => $dbParams['password'],
                            'hostname'  => $dbParams['hostname'],
                        ));
                    },
                ),
            ),
        );

2. Navigate to http://yourproject/deals or http://yourproject/deals/admin
