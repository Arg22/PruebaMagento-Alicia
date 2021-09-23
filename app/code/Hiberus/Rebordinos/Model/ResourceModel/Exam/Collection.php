<?php

namespace Hiberus\Rebordinos\Model\ResourceModel\Exam;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Hiberus\Rebordinos\Model\Exam', 'Hiberus\Rebordinos\Model\ResourceModel\Exam');
    }

}

