<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');
 
/**
 * Clase para la tabla Votos
 */
class EncuestasTableVotos extends JTable
{
  /**
   * Constructor
   *
   * @param object Database connector object
   */
  function __construct(&$db) 
  {
    parent::__construct('#__votos', 'id', $db);
  }
}
