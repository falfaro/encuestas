<?php
defined('_JEXEC') or die('Restricted access');
 
class TableElementoEncuesta extends JTable
{
  function __construct( &$db ) {
    parent::__construct('#__elementos_encuestas', 'id', $db);
  }
}
