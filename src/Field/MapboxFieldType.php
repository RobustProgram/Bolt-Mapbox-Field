<?php
namespace Bolt\Extension\Robustprogram\MapboxField\Field;

use Doctrine\DBAL\Types\Type;
use Bolt\Storage\EntityManager;
use Bolt\Storage\Field\Type\FieldTypeBase;
use Bolt\Storage\QuerySet;

/**
 * This class extends the base field type and looks after serializing and hydrating the field
 * on save and load.
 *
 */
class MapboxFieldType extends FieldTypeBase
{
    public function getName()
    {
        return 'RPMapboxField';
    }

    /**
     * {@inheritdoc}
     */
    public function getStorageType()
    {
        return Type::getType('json');
    }

    public function getStorageOptions()
    {
        return [
          'default' => ''
        ];
    }

}
