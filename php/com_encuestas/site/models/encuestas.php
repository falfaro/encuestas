<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * Encuestas Model
 */
class EncuestasModelEncuestas extends JModelItem
{
  /**
   * Metodo para recuperar los nombres de las encuestas que existen
   * en el sistema.
   */
  public function getEncuestas()
  {
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('id,nombre');
    $query->from('#__encuestas');
    $db->setQuery($query);
    return $db->loadObjectList();
  }
}
