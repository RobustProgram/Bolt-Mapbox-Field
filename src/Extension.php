<?php

namespace Bolt\Extension\Robustprogram\MapboxField;

use Bolt\Extension\Robustprogram\MapboxField\Provider\FieldProvider;
use Bolt\Extension\SimpleExtension;

/**
 * The main extension class.
 *
 * @author Robustprogram
 */
class Extension extends SimpleExtension
{

    public function getServiceProviders()
    {
        return [
            $this,
            new FieldProvider()
        ];
    }

    protected function registerTwigPaths()
    {
        return [
            'templates/bolt' => ['position' => 'prepend', 'namespace'=>'bolt']
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerAssets()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [];
    }

}
