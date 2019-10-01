<?php
/**
 * Class CCatalogMeasureAdminResult
 */
class CCatalogMeasureAdminResult extends CAdminResult
{
 public function __construct() {
     CCatalogMeasureResult::fetch();
 }
	/**
	 * @return array
	 */
	function Fetch()
	{
		return CCatalogMeasureResult::fetch();
	}
}
