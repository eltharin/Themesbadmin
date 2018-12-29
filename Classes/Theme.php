<?php

namespace Plugin\Themesbadmin\Classes;

class Theme
{
	static function init()
	{
		\config::set_template('Themesbadmin\\theme');
		\Core::$config->addElement('HTMLtemplate',new HTMLConfig());
	}
}