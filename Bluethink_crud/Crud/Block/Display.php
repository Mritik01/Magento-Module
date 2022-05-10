<?php
namespace Bluethink\Crud\Block;
 
use Magento\Framework\App\Filesystem\DirectoryList;
 
class Display extends \Magento\Framework\View\Element\Template
{
    protected $employeeCollection;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \Bluethink\Crud\Model\ResourceModel\Employee\Collection $employeeCollection
          )
     {
        $this->employeeCollection = $employeeCollection;
        parent::__construct($context);
     }
     
     
     public function getResult()
     {
        return $this->employeeCollection->getData();  
     }
}

?>
