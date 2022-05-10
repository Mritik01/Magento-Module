<?php
namespace Mobile\Redmi\Block;

class Edit extends \Magento\Framework\View\Element\Template
{
    protected $_pageFactory;
    protected $_coreRegistry;
    protected $_contactLoader;
    protected $_request;
   
    public function __construct(
        \Magento\Framework\App\Request\Http $request,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Mobile\Redmi\Model\MobiledataFactory $contactLoader,
        array $data = []
    ) {
        $this->_request = $request;
        $this->_pageFactory = $pageFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_contactLoader = $contactLoader;
        return parent::__construct($context, $data);
    }

    public function getEditData()
    {
        $id = $this->_request->getParam('id');
        $postData = $this->_contactLoader->create();
        $result = $postData->load($id);
        $result = $result->getData();
        return $result;
    }
}
