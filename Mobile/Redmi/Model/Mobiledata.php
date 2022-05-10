<?php
namespace Mobile\Redmi\Model;
class Mobiledata extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'mobile_redmi_mobiledata';
	protected $_cacheTag = 'mobile_redmi_mobiledata';
	protected $_eventPrefix = 'mobile_redmi_mobiledata';

	protected function _construct()
	{
		$this->_init('Mobile\Redmi\Model\ResourceModel\Mobiledata');
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