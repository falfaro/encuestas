<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');
 
/**
 * Modelo para los detalles de una encuesta
 */
class EncuestasModelEncuesta extends JModelItem
{
  /**
   * Metodo para recuperar los detalles de una encuesta.
   */
  public function getPoll()
  {
    // Carga los detalles de la encuesta.
    $pollId = JRequest::getVar('pollId',  1);
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__encuestas');
    $query->where('id=' . $pollId);
    $db->setQuery($query);
    $poll = $db->loadObject();

    // Carga los elementos que conforman la encuesta.
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__elementos_encuestas');
    $query->where('id_encuesta=' . $pollId);
    $db->setQuery($query);
    $poll->elementos = $db->loadObjectList();

    return $poll;
  }
}
