<?php

namespace Hiberus\Rebordinos\Model;

use Hiberus\Rebordinos\Api\Data\ExamInterfaceFactory;
use Hiberus\Rebordinos\Api\ExamRepositoryInterface;
use Hiberus\Rebordinos\Api\Data\ExamInterface;
use Magento\Framework\Exception\CouldNotSaveException;

class ExamRepository implements ExamRepositoryInterface
{

    protected ResourceModel\Exam $resourceExam;
    protected \Hiberus\Rebordinos\Api\Data\ExamInterfaceFactory $ExamInterfaceFactory;

    /**
     * @param ResourceModel\Exam $resourceExam
     * @param ExamInterfaceFactory $ExamInterfaceFactory
     */
    public function __construct(
        \Hiberus\Rebordinos\Model\ResourceModel\Exam $resourceExam,
        ExamInterfaceFactory $ExamInterfaceFactory
    ) {
        $this->resourceExam = $resourceExam;
        $this->ExamInterfaceFactory = $ExamInterfaceFactory;
    }

    /**
     * @param ExamInterface $exam
     * @return ExamInterface
     * @throws CouldNotSaveException
     */
    public function save(
        ExamInterface $exam
    ) {

        try {
            $this->resourceExam->save($exam);
        } catch(\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $exam;
    }

    /**
     * @param $entityId
     * @return mixed
     */
    public function getById($entityId)
    {
        try {
            $exam = $this->ExamInterfaceFactory->create();
            $exam->setEntityId($entityId);
            $this->resourceExam->load($exam, $entityId);
        } catch (\Exception $e) {
            $exam = $this->ExamInterfaceFactory->create();
        }

        return $exam;
    }

    /**
     * @param ExamInterface $exam
     * @return bool
     */
    public function delete(ExamInterface $exam)
    {
        try {
            $this->resourceExam->delete($exam);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * @param int $entityId
     * @return bool
     */
    public function deleteById($entityId)
    {
        return $this->delete($this->getById($entityId));
    }

}
