<?php

namespace Bolt\Extension\Robustprogram\RPMapboxField\Provider;

use Bolt\Extension\Robustprogram\RPMapboxField\Field\RPMapboxFieldType;
use Bolt\Storage\FieldManager;
use Silex\Application;
use Silex\ServiceProviderInterface;

class FieldProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['storage.typemap'] = array_merge(
            $app['storage.typemap'],
            [
                'RPMapbox' => RPMapboxFieldType::class
            ]
        );

        $app['storage.field_manager'] = $app->share(
            $app->extend(
                'storage.field_manager',
                function (FieldManager $manager) {
                    $manager->addFieldType('RPMapbox', new RPMapboxFieldType());

                    return $manager;
                }
            )
        );

    }

    public function boot(Application $app)
    {
    }
}
