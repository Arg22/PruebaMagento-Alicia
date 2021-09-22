<?php
namespace Hiberus\Rebordinos\Plugin\Catalog;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ProductPlugin{

    /**
     * @var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConfing;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ){
        $this->scopeConfing=$scopeConfig;

    }

    public function afterLoad(
        \Magento\Catalog\Model\Product $subject,
        $result
    ){
        $description=$result->getDescription();
        $descriptionShort=$result->getShortDescription();

        $textoGeneral=  $this->scopeConfing->getValue(
            'rebordinos_nombre/general/texto_general',
            ScopeInterface::SCOPE_STORE
        );

        $numeroGeneral=  $this->scopeConfing->getValue(
            'rebordinos_nombre/general/numero_general',
            ScopeInterface::SCOPE_STORE
        );

        $description .= " ". $textoGeneral." ".  $numeroGeneral;
        $descriptionShort.= " ". $textoGeneral." ".  $numeroGeneral;
        $result->setDescription($description);
        $result->setShortDescription($descriptionShort);
        return $result;

    }

}
