<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_View
 * @subpackage Helper
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @version    $Id$
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

/** Zend_View_Helper_Abstract.php */
require_once 'Zend/View/Helper/Abstract.php';

/**
 * Helper for rendering output of a controller action
 *
 * @package    Zend_View
 * @subpackage Helper
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_View_Helper_Action extends Zend_View_Helper_Abstract
{
    /**
     * @var string
     */
    public $defaultModule;

    /**
     * @var Zend_Controller_Dispatcher_Interface
     */
    public $dispatcher;

    /**
     * @var Zend_Controller_Request_Abstract
     */
    public $request;

    /**
     * @var Zend_Controller_Response_Abstract
     */
    public $response;

    /**
     * Constructor
     *
     * Grab local copies of various MVC objects
     *
     * @return void
     */
    public function __construct()
    {
        $front   = Zend_Controller_Front::getInstance();
        $modules = $front->getControllerDirectory();
        if (empty($modules)) {
            require_once 'Zend/View/Exception.php';
            $e = new Zend_View_Exception('Action helper depends on valid front controller instance');
            $e->setView($this->view);
            throw $e;
        }

        $request  = $front->getRequest();
        $response = $front->getResponse();

        if (empty($request) || empty($response)) {
            require_once 'Zend/View/Exception.php';
            $e = new Zend_View_Exception('Action view helper requires both a registered request and response object in the front controller instance');
            $e->setView($this->view);
            throw $e;
        }

        $this->request       = clone $request;
        $this->response      = clone $response;
        $this->dispatcher    = clone $front->getDispatcher();
        $this->defaultModule = $front->getDefaultModule();
    }

    /**
     * Reset object states
     *
     * @return void
     */
    public function resetObjects()
    {
        $params = $this->request->getUserParams();
        foreach (array_keys($params) as $key) {
            $this->request->setParam($key, null);
        }

        $this->response