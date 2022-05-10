<?php
namespace Bluethink\Crud\Model\ResourceModel\Employee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'bluethink_crud_employee_collection';
	protected $_eventObject = 'employee_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Bluethink\Crud\Model\Employee', 'Bluethink\Crud\Model\ResourceModel\Employee');
	}

}