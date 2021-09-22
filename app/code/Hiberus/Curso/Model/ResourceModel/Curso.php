<?php

namespace Hiberus\Curso\Model\ResourceModel;

use Hiberus\Curso\Api\Data\CursoInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Curso extends AbstractDb
{

    /**
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\EntityManager\MetadataPool $metadataPool
     * @param \Magento\Framework\EntityManager\EntityManager $entityManager
     * @param null $connectionName
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\EntityManager\MetadataPool $metadataPool,
        \Magento\Framework\EntityManager\EntityManager $entityManager,
        $connectionName = null
    ) {
        $this->metadataPool =$metadataPool;
        $this->entityManager =$entityManager;
        parent::__construct($context,$connectionName);
    }


    /**
     * @inerhitDoc
     */
    protected function _construct()
    {
        $this->_inir(CursoInterface::TABLE_NAME,CursoInterface::COLUMN_ID);
    }

    /**
     * @param AbstractModel $object
     * @return $this|AbstractDb
     * @throws \Exception
     */
    public function save(AbstractModel $object)
    {
        $this->entityManager->save($object);
        return $this;

    }

    /**
     * @param AbstractModel $object
     * @param mixed $value
     * @param null $field
     * @return AbstractDb|mixed
     */
    public function load(AbstractModel $object, $value, $field = null)
    {
        return  $this->entityManager->load($object, $value);
    }

    /**
     * @param AbstractModel $object
     * @return AbstractDb|void
     * @throws \Exception
     */
    public function delete(AbstractModel $object)
    {
        $this->entityManager->delete($object);

    }
}
