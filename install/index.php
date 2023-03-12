<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);


class kuvalkin_example extends CModule
{
	var $MODULE_ID = 'kuvalkin.example';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	function __construct()
	{
		$arModuleVersion = [];

		include(__DIR__ . '/version.php');

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = 'example';
		$this->MODULE_DESCRIPTION = 'Simple example project with single endpoint';
		$this->PARTNER_NAME = 'Kuvalkin';
		$this->PARTNER_URI = 'https://kuvalkin.com';
	}


	function InstallDB($install_wizard = true)
	{
		RegisterModule('kuvalkin.example');

		return true;
	}

	function UnInstallDB($arParams = [])
	{
		UnRegisterModule('kuvalkin.example');

		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles()
	{
		return true;
	}

	function InstallPublic()
	{
	}

	function UnInstallFiles()
	{
		return true;
	}

	function DoInstall()
	{
		global $APPLICATION, $step;

		$this->InstallFiles();
		$this->InstallDB();
		$this->InstallEvents();
		$this->InstallPublic();

		return true;
	}

	function DoUninstall()
	{
		$this->UnInstallDB();
		$this->UnInstallFiles();
		$this->UnInstallEvents();

		return true;
	}
}
