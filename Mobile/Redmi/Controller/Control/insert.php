<?php

namespace Mobile\Redmi\Controller\Control;

class Insert extends \Magento\Framework\App\Action\Action
{
    protected $mobiledata;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Mobile\Redmi\Model\MobiledataFactory $mobileDataFactory
	)
	{
        $this->mobiledata = $mobileDataFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
        $postValue = $this->getRequest()->getPostValue();
		if(!empty($postValue)){
            $model = $this->mobiledata->create();
            $model->setData($postValue)->save();
        }
        return $this->_redirect('redmi/control/display');    
	}
}

