<?php

namespace Hiberus\Rebordinos\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Class Index
 */
class Index implements HttpGetActionInterface
{

    protected \Magento\Framework\View\Result\PageFactory $pageFactory;
    protected \Hiberus\Rebordinos\Model\ExamFactory $examFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context      $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Hiberus\Rebordinos\Model\ExamFactory $examFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->ExamFactory = $examFactory;


    }

    /**
     * @inheritdoc
     */
    public function execute()
    {

        $exam = $this->ExamFactory->create();
        $collection=$exam->getCollection();

        foreach($collection as $item){
            echo $item->getData();
        }

        return $this->pageFactory->create();
    }
}
