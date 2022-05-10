<?php
namespace Bluethink\Crud\Controller\Sample;
class Insert extends \Magento\Framework\App\Action\Action
{
    protected $employeeFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Bluethink\Crud\Model\EmployeeFactory $employeeFactory
	)
	{
        $this->employeeFactory = $employeeFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
        $postValue = $this->getRequest()->getPostValue();
		if(!empty($postValue)){
            $name  = $postValue['name']; 
            $email = $postValue['email'];
            $model = $this->employeeFactory->create();
            $model->setData($postValue)->save();
            // echo  "hello";
            // Also can Save the Values using setName()
            // $this->employee->setName($name);
	        // $this->employee->setEmail($email);
	        // $this->employee->save();
        }  
        return $this->_redirect('crud/sample/display');    
	}
}



  



