<?php
/**
 * Class CCatalogMeasureAdminResult
 */
class CCatalogMeasureAdminResult extends CAdminResult
{
<<<<<<< HEAD
 public function __construct() {
     CCatalogMeasureResult::fetch();
 }
	/**
	 * @return array
	 */
	function Fetch()
	{
		return CCatalogMeasureResult::fetch();
=======
	protected $measureResult;

	public function __construct($res, $table_id)
	{
		parent::__construct($res, $table_id);
		$this->measureResult = new CCatalogMeasureResult($this);
	}

	/**
	 * @return array
	 */
	public function Fetch()
	{
		return $this->measureResult->Fetch();
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
	}
}
