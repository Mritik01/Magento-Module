<?php
namespace Mobile\Redmi\Controller\Control;

class Delete extends \Magento\Framework\App\Action\Action
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
        $id = $this->_request->getParam('id');			 
		$postData = $this->mobiledata->create();
		$result =$postData->setId($id);
		$result = $result->delete();
		return $this->_redirect('redmi/control/display');
	}			
}