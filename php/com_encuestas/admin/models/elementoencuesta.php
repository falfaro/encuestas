<?php
defined('_JEXEC') or die();
jimport( 'joomla.application.component.modeladmin' );


class EncuestasModelElementoEncuesta extends JModelAdmin
{	

  public function getForm($data = array(), $loadData = true)
  {
    // Get the form
    $form = $this->loadForm('com_encuestas.elementoencuesta', 'elementoencuesta', array('control' => 'jform', 'load_data' => $loadData));

    if (!$form) {
      return false;
    } else {
      return $form;
    }
  }

  public function loadFormData()
  {
    // Load form data
    $data = $this->getItem();
		
    // Set value for id_encuesta (insert)
    if (!$data->id_encuesta)
      {
	$app = JFactory::getApplication();
	$context = "$this->option.edit.elementoencuesta";

	$data->id_encuesta = $app->getUserState($context . '.id_encuesta');
      }

    return $data;
  }
}
