<?php

namespace Hiberus\Rebordinos\Block;

use Hiberus\Rebordinos\Api\ExamRepositoryInterface;
use Hiberus\Rebordinos\Model\Exam;
use Hiberus\Rebordinos\Api\Data\ExamInterfaceFactory;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $registry;
    protected $exam;
    protected $examRepository;
    protected $examInterfaceFactory;
    protected $examResource;
    protected ScopeConfigInterface $scopeConfig;

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
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->exam = $exam;
        $this->examRepository = $examRepository;
        $this->examInterfaceFactory = $examInterfaceFactory;
        $this->examResource = $examResource;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * @return AbstractDb|AbstractCollection|null
     */
    public function getExams() {
        $resultPage = $this->examInterfaceFactory->create();
        return $resultPage->getCollection();
    }


    public function getAverageMark(){
        $exams = $this->getExams();
        $marks=[];
        foreach ($exams as $item){
            $marks[]=$item->getMark();
        }
        return array_sum($marks)/count($exams);
    }

    public function getMaxMarks(){
        $total=$this->getExams();
        $marks=[];
        $maxMarks=[];
        $notaMax=0;
        foreach ($total as $item){
            $marks[]=$item->getMark();
        }
        $max=max($marks);
        foreach ($marks as $mark){
            $nota=$mark;
            if($nota<=$max && count($maxMarks)<3){
                $notaMax=$nota;
                $maxMarks[]=$notaMax;
            }
        }
        return $maxMarks;
    }

    public function getPassNote(){
        $data= $this->scopeConfig->getValue( 'hiberus_nombre/general/notaMinima', ScopeInterface::SCOPE_STORE);
        return  $data?:5;
    }

    public function getSize(){
        $data= $this->scopeConfig->getValue( 'hiberus_nombre/general/cantidad', ScopeInterface::SCOPE_STORE);
        $exams = $this->getExams();
        return  $data?:count($exams);
    }
}
