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
   * @var string msg
   */
  protected $msg;
 
  /**
   * Get the message
   * @return string The message to be displayed to the user
   */
  public function getMsg() 
  {
    if (!isset($this->msg)) 
      {
	$this->msg = 'Lista de encuestas disponibles actualmente';
      }
    return $this->msg;
  }

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
    $db->setQuery((string)$query);
    $poll_names = $db->loadObjectList();
    return $poll_names;
  }
}
