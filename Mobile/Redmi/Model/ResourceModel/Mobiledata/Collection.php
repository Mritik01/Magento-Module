<?php
namespace Mobile\Redmi\Model\ResourceModel\Mobiledata;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'Mobile_Redmi_Mobiledata_collection';
	protected $_eventObject = 'Mobile_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Mobile\Redmi\Model\Mobiledata', 'Mobile\Redmi\Model\ResourceModel\Mobiledata');
	}

}