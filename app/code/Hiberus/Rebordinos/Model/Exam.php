<?php

namespace Hiberus\Rebordinos\Model;

use Hiberus\Rebordinos\Api\Data\ExamInterface;
use Magento\Framework\Model\AbstractModel;

class Exam extends AbstractModel implements ExamInterface
{

    protected function _construct()
    {
        $this->_init(\Hiberus\Rebordinos\Model\ResourceModel\Exam::class );
    }

    /**
     * @inheriDoc
     */
    public function getEntityId()
    {
        return $this->getData('id_exam');
    }

    /**
     * @inheriDoc
     */
    public function setEntityId($entityId)
    {
        return $this->setData('id_exam',$entityId);
    }

    /**
     * @inheriDoc
     */
    public function getFirstname()
    {
        return $this->getData('firstname');
    }

    /**
     * @inheriDoc
     */
    public function setFirstname($firstname)
    {
        return $this->setData('firstname',$firstname);
    }

    /**
     * @inheriDoc
     */
    public function getLastname()
    {
        return $this->getData('lastname');
    }

    /**
     * @inheriDoc
     */
    public function setLastname($lastname)
    {
        return $this->setData('lastname',$lastname);
    }

    /**
     * @inheriDoc
     */
    public function getMark()
    {
        return $this->getData('mark');
    }

    /**
     * @inheriDoc
     */
    public function setMark($mark)
    {
        return $this->setData('mark',$mark);
    }
}
