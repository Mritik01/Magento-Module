<?php
namespace Mobile\Redmi\Controller\Control;

class Update extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $mobiledata;
    protected $_messageManager;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Mobile\Redmi\Model\Mobiledata $mobiledata,
        \Magento\Framework\Message\ManagerInterface $messageManager
		)
	{
		$this->mobiledata = $mobiledata;
        $this->_messageManager = $messageManager;
		return parent::__construct($context);
	}

	public function execute()
	{   
		$postValue = $this->getRequest()->getPostValue();
        $id = $this->_request->getParam('id');
    	$this->mobiledata->load($id);
		$name  = $postValue['mobile_name']; 
		$email = $postValue['model'];
		$this->mobiledata->setMobile_name($name);
		$this->mobiledata->setModel($email);
		$this->mobiledata->save();
        $this->_messageManager->addSuccess('Record Updated Successfully');
		return $this->_redirect('redmi/control/display');
	}
}