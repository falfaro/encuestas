<?php
defined('_JEXEC') or die('Restricted access');
 
class TableEncuesta extends JTable
{
  function __construct( &$db ) {
    parent::__construct('#__encuestas', 'id', $db);
  }
}
