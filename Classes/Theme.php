<?php

namespace Plugin\Themesbadmin\Classes;

class Theme
{
	static function init()
	{
		\Core::$config->addElement('HTMLtemplate',new HTMLConfig());
		\Core::add_middleware('\\Core\\App\\Middleware\\Templater');
		\Core::$config->HTMLtemplate->set_template('Themesbadmin\\theme');
	}
}