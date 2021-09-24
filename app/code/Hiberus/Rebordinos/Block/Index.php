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

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;
    /**
     * @var Exam
     */
    protected $exam;
    /**
     * @var ExamRepositoryInterface
     */
    protected $examRepository;
    /**
     * @var ExamInterfaceFactory
     */
    protected $examInterfaceFactory;
    /**
     * @var \Hiberus\Rebordinos\Model\ResourceModel\Exam
     */
    protected $examResource;
    /**
     * @var ScopeConfigInterface
     */
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


    /**
     * @return float|int
     */
    public function getAverageMark(){
        $exams = $this->getExams();
        $marks=[];
        foreach ($exams as $item){
            $marks[]=$item->getMark();
        }
        return array_sum($marks)/count($exams);
    }

    /**
     * @return array
     */
    public function getMaxMarks()
    {
        $exams = $this->getExams();
        $marks=[];
        foreach ($exams as $item){
            $marks[]=$item->getMark();
        }
        rsort($marks);
        return array_slice($marks,0,3);
    }

    /**
     * @return int|mixed
     */
    public function getPassNote(){
        $data= $this->scopeConfig->getValue( 'hiberus_nombre/general/notaMinima', ScopeInterface::SCOPE_STORE);
        return  $data?:5;
    }

    /**
     * @return int|mixed|void
     */
    public function getSize(){
        $data= $this->scopeConfig->getValue( 'hiberus_nombre/general/cantidad', ScopeInterface::SCOPE_STORE);
        $exams = $this->getExams();
        return  $data?:count($exams);
    }


    /**
     *Logger method
     */
    public function writeLog(){
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/mylogger.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Se van a mostrar '.$this->getSize().
            ' alumnos y la nota media de todos es '.$this->getAverageMark());
    }
}
