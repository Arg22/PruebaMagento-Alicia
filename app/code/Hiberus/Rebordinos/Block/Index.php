<?php

namespace Hiberus\Rebordinos\Block;

use Hiberus\Rebordinos\Api\ExamRepositoryInterface;
use Hiberus\Rebordinos\Model\Exam;
use Hiberus\Rebordinos\Api\Data\ExamInterfaceFactory;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $registry;
    protected $exam;
    protected $examRepository;
    protected $examInterfaceFactory;
    protected $examResource;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param Exam $exam
     * @param ExamRepositoryInterface $examRepository
     * @param ExamInterfaceFactory $examInterfaceFactory
     * @param \Hiberus\Rebordinos\Model\ResourceModel\Exam $examResource
     * @param array $data
     */
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

    /**
     * @return AbstractDb|AbstractCollection|null
     */
    public function getExams() {
        $resultPage = $this->examInterfaceFactory->create();
        return $resultPage->getCollection();
    }

}
