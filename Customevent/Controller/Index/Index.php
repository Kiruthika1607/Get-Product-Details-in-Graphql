<?php

namespace Training\Customevent\Controller\Index;
use Magento\Framework\DataObject;
use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $blogData = new DataObject(['blog_id' => '1', 'blog_title' => 'Blog Title']);
        $this->_eventManager->dispatch('training_customevent_event_blog',
            [
                'blog' => $blogData
            ]
        );
        echo "Custom Event";exit;
    }
}
