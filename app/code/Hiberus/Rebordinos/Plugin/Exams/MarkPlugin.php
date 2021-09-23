<?php

namespace Hiberus\Rebordinos\Plugin\Exams;

use Hiberus\Rebordinos\Model\Exam;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class MarkPlugin
{
    /**
     * @var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConfig;
    protected Exam $exam;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param Exam $exam
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Exam $exam
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->exam = $exam;
    }

    /**
     * @param Exam $subject
     * @param $result
     * @return double
     */
    public function afterGetMark(
        Exam $subject,
             $result
    )
    {
        if ($subject->getData('mark') < 5.0) {
            $subject->setMark(4.9);
            $result = $subject->getData('mark');

        }
        return $result;
    }

}
