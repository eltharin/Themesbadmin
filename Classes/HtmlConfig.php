<?php

namespace Plugin\Themesbadmin\Classes;

class HtmlConfig extends \Core\App\Config\ConfigAbstract
{
	private $menu = [];
	
	function hasMenu()
	{
		return !empty($this->menu);
	}
	
	function addMenu(array $arr)
	{
		$this->menu[] = $arr;
	}
	
	function getMenu()
	{
		$ret = '';
		if($this->hasMenu())
		{
			$ret .= '<ul class="sidebar navbar-nav">';
			
			foreach($this->menu as $menuElement)
			{
				$ret .= '<li class="nav-item">
          <a class="nav-link" href="'.$menuElement['href'].'">
            <i class="'.$menuElement['class'].'"></i>
            <span>'.$menuElement['label'].'</span>
          </a>
        </li>';
			}
			
			$ret .= '</ul>';
        
        /*<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item active" href="blank.html">Blank Page</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
      ';*/
		}
		
		return $ret;
	}
}