<?php
namespace Training\Afterplugin\Block;

class Beforeplugin extends \Magento\Framework\View\Element\Template
{
    public function getHelloWorldTxt()
    {
        return 'After Plugin in Magento 2';
    }
}
