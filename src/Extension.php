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

    protected function registerAssets()
    {
        return [
            Stylesheet::create('extension.css')->setZone(Zone::BACKEND),
            JavaScript::create('extension.js')->setZone(Zone::BACKEND)
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [];
    }

}
