<?php
namespace Training\Plugindemo\Block;

class Plugindemo extends \Magento\Framework\View\Element\Template
{
    public function getHelloWorldTxt()
    {
        return 'Around Plugin in Magento 2';
    }
}
