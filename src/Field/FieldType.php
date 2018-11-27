<?php

namespace Bolt\Extension\Robustprogram\RPMapboxField\Field;

use Bolt\Extension\Robustprogram\RPMapboxField\Value\Url;
use Bolt\Storage\EntityManager;
use Bolt\Storage\Field\Type\FieldTypeBase;
use Bolt\Storage\QuerySet;

class RPMapboxFieldType extends FieldTypeBase
{

    public function persist(QuerySet $queries, $entity, EntityManager $em = null)
    {
        $key = $this->mapping['fieldname'];
        $qb = $queries->getPrimary();
        $value = $entity->get($key);
        if (!$value instanceof Url) {
            $value = Url::fromNative($value);
        }
        $qb->setValue($key, ':' . $key);
        $qb->set($key, ':' . $key);
        $qb->setParameter($key, (string)$value);
    }
    public function hydrate($data, $entity)
    {
        $key = $this->mapping['fieldname'];
        $val = isset($data[$key]) ? $data[$key] : null;
        if ($val !== null) {
            $value = Url::fromNative($val);
            $this->set($entity, $value);
        }
    }

    public function getName()
    {
        return 'RPMapboxField';
    }

    public function getStorageType()
    {
        return 'string';
    }

    public function getStorageOptions()
    {
        return [
          'default' => ''
        ];
    }

}
