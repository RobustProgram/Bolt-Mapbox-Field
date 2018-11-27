<?php

namespace Bolt\Extension\Robustprogram\RPMapboxField;

use Bolt\Extension\Robustprogram\RPMapboxField\Provider\FieldProvider;
use Bolt\Extension\SimpleExtension;

/**
 * RPMapboxField extension class.
 *
 * @author Robustprogram
 */
class Extension extends SimpleExtension
{
    public function getServiceProvider()
    {
        return [
            $this,
            new FieldProvider()
        ];
    }

    protected function registerTwigPaths()
    {
        return[
            'templates/bolt' => ['position' => 'prepend', 'namespace'=>'bolt']
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultConfig()
    {
        return [
            'mapbox_api_key' => '',
        ];
    }
}
