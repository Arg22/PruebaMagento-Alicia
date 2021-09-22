<?php

namespace Hiberus\Curso\Plugin\Catalog;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Hiberus\Curso\Model\Author;

class ProductPlugin
{

    /**
     * @var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConging;
    protected Author $author;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Author               $author
    )
    {
        $this->scopeConging = $scopeConfig;
        $this->author = $author;
    }

    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    public function afterGetName(
        \Magento\Catalog\Model\Product $subject,
                                       $result
    )
    {

        $nombreGeneral = $this->scopeConging->getValue(
            'hiberus_nombre/general/nombre_general',
            ScopeInterface::SCOPE_STORE
        );

        $result = $result . " " . $this->author->getAuthorName();

        return $result;

    }

}
