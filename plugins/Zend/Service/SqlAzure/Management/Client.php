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
 * @package    Zend_Service_WindowsAzure
 * @subpackage Management
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * @see Zend_Http_Client
 */
 require_once 'Zend/Http/Client.php';
 
 /**
 * @see Zend_Service_WindowsAzure_RetryPolicy_RetryPolicyAbstract
 */
 require_once 'Zend/Service/WindowsAzure/RetryPolicy/RetryPolicyAbstract.php';
 
 /**
 * @see Zend_Service_SqlAzure_Management_ServerInstance
 */
 require_once 'Zend/Service/SqlAzure/Management/ServerInstance.php';
 
 /**
 * @see Zend_Service_SqlAzure_Management_FirewallRuleInstance
 */
 require_once 'Zend/Service/SqlAzure/Management/FirewallRuleInstance.php';

 /** @see Zend_Xml_Security */
 require_once 'Zend/Xml/Security.php';

/**
 * @category   Zend
 * @package    Zend_Service_SqlAzure
 * @subpackage Management
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Service_SqlAzure_Management_Client
{
	/**
	 * Management service URL
	 */
	const URL_MANAGEMENT        = "https://management.database.windows.net:8443";
	
	/**
	 * Operations
	 */
	const OP_OPERATIONS                = "operations";
	const OP_SERVERS                   = "servers";
	const OP_FIREWALLRULES             = "firewallrules";

	/**
	 * Current API version
	 * 
	 * @var string
	 */
	protected $_apiVersion = '1.0';
	
	/**
	 * Subscription ID
	 *
	 * @var string
	 */
	protected $_subscriptionId = '';
	
	/**
	 * Management certificate path (.PEM)
	 *
	 * @var string
	 */
	protected $_certificatePath = '';
	
	/**
	 * Management certificate passphrase
	 *
	 * @var string
	 */
	protected $_certificatePassphrase = '';
	
	/**
	 * Zend_Http_Client channel used for communication with REST services
	 * 
	 * @var Zend_Http_Client
	 */
	protected $_httpClientChannel = null;	

	/**
	 * Zend_Service_WindowsAzure_RetryPolicy_RetryPolicyAbstract instance
	 * 
	 * @var Zend_Service_WindowsAzure_RetryPolicy_RetryPolicyAbstract
	 */
	protected $_retryPolicy = null;
	
	/**
	 * Returns the last request ID
	 * 
	 * @var string
	 */
	protected $_lastRequestId = null;
	
	/**
	 * Creates a new Zend_Service_SqlAzure_Management instance
	 * 
	 * @param string $subscriptionId Subscription ID
	 * @param string $certificatePath Mana