<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');
 
/**
 * Clase para la tabla Voto
 */
class EncuestasTableVoto extends JTable
{
  /**
   * Constructor
   *
   * @param object Database connector object
   */
  function __construct(&$db) 
  {
    // El primer parametro es el nombre de la tabla SQL.
    // El segundo parametro, el nombre del campo que es clave primaria.
    parent::__construct('#__votos', 'id', $db);
  }
}
