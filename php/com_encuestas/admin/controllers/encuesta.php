<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controllerform');
 
class EncuestasControllerEncuesta extends JControllerForm
{
  public function __construct($config = array()) {
    $this->view_list = 'encuestas';
    parent::__construct($config);
  }
}
