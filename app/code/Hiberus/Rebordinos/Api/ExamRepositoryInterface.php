<?php

namespace Hiberus\Rebordinos\Api;

use Hiberus\Rebordinos\Api\Data\ExamInterface;

interface ExamRepositoryInterface
{
    /**
     * @param int $entityId
     * @return ExamInterface
     */
    public function getById(int $entityId);

    /**
     * @param ExamInterface $exam
     * @return ExamInterface
     */
    public function save(ExamInterface $exam);

    /**
     * @param ExamInterface $exam
     * @return void
     */
    public function delete(ExamInterface $exam);

    /**
     * @param int $entityId
     * @return ExamInterface
     */
    public function deleteById(int $entityId);
}

