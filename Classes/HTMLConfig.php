<?php

namespace Plugin\Themesbadmin\Classes;

class HtmlConfig extends \Core\App\Config\HTMLTemplate
{
	public function getMenu()
	{
		$ret = '';
		if($this->hasMenu())
		{
			$ret .= '<ul class="sidebar navbar-nav">';
			$i=0;
			foreach($this->menu as $menuElement)
			{
				if(isset($menuElement['submenu']))
				{
					$ret .= '<li class="nav-item dropdown">
							<a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="'.$menuElement['class'].'"></i>
								<span>'.$menuElement['label'].'</span>
							</a>
							<div class="dropdown-menu" >';
					
					foreach($menuElement['submenu'] as $elem)
					{
						$ret .= '<a class="dropdown-item" href="'.$elem['href'].'">
									<i class="'.$elem['class'].'"></i>
									<span>'.$elem['label'].'</span>
								</a>';
					}
				
					$ret .= '</div></li>';
		
					$i++;					
				}
				else
				{
					$ret .= '<li class="nav-item ">
							<a class="nav-link" href="'.$menuElement['href'].'">
								<i class="'.$menuElement['class'].'"></i>
								<span>'.$menuElement['label'].'</span>
							</a>
						</li>';
				}
			}
			
			$ret .= '</ul>';
		}
		
		return $ret;
	}
}