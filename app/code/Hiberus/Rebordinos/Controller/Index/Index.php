<?php

namespace Hiberus\Rebordinos\Controller\Index;

use Hiberus\Rebordinos\Api\ExamRepositoryInterface;
use Hiberus\Rebordinos\Api\Data\ExamInterfaceFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Hiberus\Rebordinos\Model\ResourceModel\exam;

class Index implements HttpGetActionInterface
{

    protected \Magento\Framework\View\Result\PageFactory $pageFactory;
    protected ExamRepositoryInterface $examRepository;
    protected ExamInterfaceFactory $examInterfaceFactory;
    protected exam $examResource;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        ExamRepositoryInterface $examRepository,
        ExamInterfaceFactory $examInterfaceFactory,
        Exam $examResource

    ) {
        $this->pageFactory = $pageFactory;
        $this->examRepository = $examRepository;
        $this->examInterfaceFactory = $examInterfaceFactory;
        $this->examResource = $examResource;
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}
