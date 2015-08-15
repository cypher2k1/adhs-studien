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
 * @package    Zend_Search_Lucene
 * @subpackage Index
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/** Zend_Search_Lucene_Index_TermsStream_Interface */
require_once 'Zend/Search/Lucene/Index/TermsStream/Interface.php';


/**
 * @category   Zend
 * @package    Zend_Search_Lucene
 * @subpackage Index
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Search_Lucene_TermStreamsPriorityQueue implements Zend_Search_Lucene_Index_TermsStream_Interface
{
    /**
     * Array of term streams (Zend_Search_Lucene_Index_TermsStream_Interface objects)
     *
     * @var array
     */
    protected $_termStreams;

    /**
     * Terms stream queue
     *
     * @var Zend_Search_Lucene_Index_TermsPriorityQueue
     */
    protected $_termsStreamQueue = null;

    /**
     * Last Term in a terms stream
     *
     * @var Zend_Search_Lucene_Index_Term
     */
    protected $_lastTerm = null;


    /**
     * Object constructor
     *
     * @param array $termStreams  array of term streams (Zend_Search_Lucene_Index_TermsStream_Interface objects)
     */
    public function __construct(array $termStreams)
    {
        $this->_termStreams = $termStreams;

        $this->resetTermsStream();
    }

    /**
     * Reset terms stream.
     */
    public function resetTermsStream()
    {
        /** Zend_Search_Lucene_Index_TermsPriorityQueue */
        require_once 'Zend/Search/Lucene/Index/TermsPriorityQueue.php';

        $this->_termsStreamQueue = new Zend_Search_Lucene_Index_TermsPriorityQueue();

        foreach ($this->_termStreams as $termStream) {
            $termStream->resetTermsStream();

            // Skip "empty" containers
            if ($termStream->currentTerm() !== null) {
                $this->_termsStreamQueue->put($termStream);
            }
        }

        $this->nextTerm();
    }

    /**
     * Skip terms stream up to the specified term preffix.
     *
     * Prefix contains fully specified field info and portion of searched term
     *
     * @param Zend_Search_Lucene_Index_Term $prefix
     */
    public function skipTo(Zend_Search_Lucene_Index_Term $prefix)
    {
        $this->_termsStreamQueue = new Zend_Search_L