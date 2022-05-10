<?php
namespace Bluethink\Crud\Model;
class Employee extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'bluethink_crud_employee';

	protected $_cacheTag = 'bluethink_crud_employee';

	protected $_eventPrefix = 'bluethink_crud_employee';

	protected function _construct()
	{
		$this->_init('Bluethink\Crud\Model\ResourceModel\Employee');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}