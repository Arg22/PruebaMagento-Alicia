<?php

namespace Hiberus\Curso\Model;

use Hiberus\Curso\Api\Data\CursoInterface;
use Magento\Framework\Model\AbstractModel;

class Curso extends AbstractModel implements CursoInterface
{

    protected function _construct()
    {
        $this->_init(\Hiberus\Curso\Model\ResourceModel\Curso::class );
    }

    /**
     * @inheriDoc
     */
    public function getEntityId()
    {
       return $this->getData('entity_id');
    }

    /**
     * @inheriDoc
     */
    public function setEntityId($entityId)
    {
        return $this->setData('entity_id',$entityId);
    }

    /**
     * @inheriDoc
     */
    public function getNombre()
    {
        return $this->getData('nombre');
    }

    /**
     * @inheriDoc
     */
    public function setNombre($nombre)
    {
        return $this->setData('nombre',$nombre);
    }

    /**
     * @inheriDoc
     */
    public function getApellido()
    {
        return $this->getData('apellido');
    }

    /**
     * @inheriDoc
     */
    public function setApellido($apellido)
    {
        return $this->setData('apellido',$apellido);
    }

    /**
     * @inheriDoc
     */
    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }

    /**
     * @inheriDoc
     */
    public function setCreatedAt($createAt)
    {
        return $this->setData('created_at',$createAt);
    }
}
