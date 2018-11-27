<?php

namespace Bolt\Extension\Robustprogram\MapboxField\Provider;

use Bolt\Extension\Robustprogram\MapboxField\Field\MapboxFieldType;
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
                'RPMapboxField' => MapboxFieldType::class
            ]
        );

        $app['storage.field_manager'] = $app->share(
            $app->extend(
                'storage.field_manager',
                function (FieldManager $manager) {
                    $manager->addFieldType('RPMapboxField', new MapboxFieldType());

                    return $manager;
                }
            )
        );

    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }
}
