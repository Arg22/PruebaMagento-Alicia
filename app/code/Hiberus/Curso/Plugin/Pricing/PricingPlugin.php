<?php

namespace Hiberus\Curso\Plugin\Pricing;

class PricingPlugin
{
    public function afterFormatCurrency(
        \Magento\Framework\Pricing\Render\Amount $subject,
                                       $result
    ){
        $result .= "/ud";

        return  $result;
    }
}
