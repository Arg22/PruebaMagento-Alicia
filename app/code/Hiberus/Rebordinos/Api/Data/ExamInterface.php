<?php

namespace Hiberus\Rebordinos\Api\Data;

interface ExamInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const TABLE_NAME = "hiberus_exam";
    const COLUMN_ID = "id_exam";

    /**
     * @return int
     */
    public function getEntityId();

    /**
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * @return string
     */
    public function getFistname();

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFistname($firstname);

    /**
     * @return string
     */
    public function getLastname();

    /**
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname);

    /**
     * @return decimal
     */
    public function getMark();

    /**
     * @param decimal $mark
     * @return $this
     */
    public function setMark($mark);

}
