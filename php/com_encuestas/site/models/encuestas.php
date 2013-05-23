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
   * Metodo para recuperar los nombres de las encuestas que estan
   * actualmente abiertas para votar.
   */
  public function getOpenPolls()
  {
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('id,nombre');
    $query->from('#__encuestas');
    $db->setQuery($query);
    return $db->loadObjectList();
  }

  public function getPoll()
  {
    $pollId = JRequest::getVar('pollId',  1);
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    //    $query->select('id,nombre');
    $query->from('#__encuestas');
    $query->where('id=' . $pollId);
    $db->setQuery($query);
    return $db->loadObject();
  }
}
