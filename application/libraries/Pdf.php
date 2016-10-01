<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 30/09/2016
 * Time: 10:13
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}
