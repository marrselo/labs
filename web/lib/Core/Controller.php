<?php
/**
 * SmartKit
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @category   Core_Controller
 * @package    Core_Controller
 * @copyright  Copyright 2004-2010 HOOTO.COM
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 * @version    $Id: Core_Controller.php 856 2010-05-07 16:05:39Z evorui $
 */

/** ensure this file is being included by a parent file */
defined('SYS_ROOT') or die('Access Denied!');


require_once "Core/View.php";

class Core_Controller
{
    public $view    = NULL;
    
    public $reqs    = NULL;
	
	public function __construct($reqs = NULL)
    {
        $this->view = new Core_View();
        
        $this->reqs = $reqs;
    }
    
    public function router()
    {
        
    }
    
    public function dispatch()
    {
        $action = $this->reqs->act.'Action';
        
        if (method_exists($this, $action)) {
            $this->$action();
        }
    }
	
    public function render($name = NULL)
	{
	    if ($name === NULL) {
	        $name = SYS_ROOT."app/{$this->reqs->mod}/views/{$this->reqs->ctr}/index.php";
	    }
	    
    	print $this->view->render($name);
	}
}
