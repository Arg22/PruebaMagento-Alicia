<?php

namespace Hiberus\Rebordinos\Block;

use Hiberus\Rebordinos\Api\ExamRepositoryInterface;
use Hiberus\Rebordinos\Model\Exam;
use Hiberus\Rebordinos\Api\Data\ExamInterfaceFactory;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $registry;
    protected $exam;
    protected $examRepository;
    protected $examInterfaceFactory;
    protected $examResource;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        Exam $exam,
        ExamRepositoryInterface $examRepository,
        ExamInterfaceFactory $examInterfaceFactory,
        \Hiberus\Rebordinos\Model\ResourceModel\Exam $examResource,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->exam = $exam;
        $this->examRepository = $examRepository;
        $this->examInterfaceFactory = $examInterfaceFactory;
        $this->examResource = $examResource;
        parent::__construct($context, $data);
    }

    public function getExams() {

        $crearExam = $this->insertExam('Nombre', 'Apellido',9);
         return $this->examRepository->getById($crearExam);

    }

    public function insertExam($name, $lastname, $mark) {

        $exam = $this->examInterfaceFactory->create();
        $exam->setFirstname($name);
        $exam->setLastname($lastname);
        $exam->setMark($mark);
        $this->examResource->save($exam);
        return $exam->getEntityId();

    }

}
