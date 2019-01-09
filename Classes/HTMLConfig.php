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
			
			/*$ret .= '                      <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-home"></i>
                    Home
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-briefcase"></i>
                    About
                </a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Pages
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>';
			*/
			$ret .= '</ul>';
       
		/*$ret.='<ul class="list-unstyled components">
           
        </ul>';*/
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