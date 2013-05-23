<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');
 
/**
 * Modelo para los detalles de una encuesta
 */
class EncuestasModelEncuesta extends JModelItem
{
  public function getPoll()
  {
    $pollId = JRequest::getVar('pollId',  1);
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__encuestas');
    $query->where('id=' . $pollId);
    $db->setQuery($query);
    return $db->loadObject();
  }
}
