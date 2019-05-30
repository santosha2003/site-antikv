<?
namespace Bitrix\Sale\Delivery\Restrictions;

use Bitrix\Sale\Internals\ServiceRestrictionTable;

class Manager extends \Bitrix\Sale\Services\Base\RestrictionManager
{
	protected static $classNames = null;

	protected static function getServiceType()
	{
		return self::SERVICE_TYPE_SHIPMENT;
	}

	public static function getBuildInRestrictions()
	{
		return  array(
			'\Bitrix\Sale\Delivery\Restrictions\BySite' => 'lib/delivery/restrictions/bysite.php',
			'\Bitrix\Sale\Delivery\Restrictions\ByPrice' => 'lib/delivery/restrictions/byprice.php',
			'\Bitrix\Sale\Delivery\Restrictions\ByWeight' => 'lib/delivery/restrictions/byweight.php',
			'\Bitrix\Sale\Delivery\Restrictions\ByMaxSize' => 'lib/delivery/restrictions/bymaxsize.php',
			'\Bitrix\Sale\Delivery\Restrictions\ByLocation' => 'lib/delivery/restrictions/bylocation.php',
			'\Bitrix\Sale\Delivery\Restrictions\PersonType' => 'lib/delivery/restrictions/bypersontype.php',
			'\Bitrix\Sale\Delivery\Restrictions\ByPaySystem' => 'lib/delivery/restrictions/bypaysystem.php',
			'\Bitrix\Sale\Delivery\Restrictions\ByDimensions' => 'lib/delivery/restrictions/bydimensions.php',
			'\Bitrix\Sale\Delivery\Restrictions\ByPublicMode' => 'lib/delivery/restrictions/bypublicmode.php',
			'\Bitrix\Sale\Delivery\Restrictions\ByProductCategory' => 'lib/delivery/restrictions/byproductcategory.php'
		);
	}

	public static function getEventName()
	{
		return 'onSaleDeliveryRestrictionsClassNamesBuildList';
	}

	public static function deleteByDeliveryIdClassName($deliveryId, $className)
	{
		$con = \Bitrix\Main\Application::getConnection();
		$sqlHelper = $con->getSqlHelper();
		$strSql = "DELETE FROM ".ServiceRestrictionTable::getTableName().
			" WHERE SERVICE_ID=".$sqlHelper->forSql($deliveryId).
			" AND SERVICE_TYPE=".$sqlHelper->forSql(Manager::SERVICE_TYPE_SHIPMENT).
			" AND CLASS_NAME='".$sqlHelper->forSql($className)."'";

		$con->queryExecute($strSql);
	}
}