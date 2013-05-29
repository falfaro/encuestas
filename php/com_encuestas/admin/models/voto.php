<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modeladmin');
 
/**
 * Modelo Voto
 */
class EncuestasModelVoto extends JModelAdmin
{
  /*
   * Devuelve una referencia a un nuevo objeto Table.
   *
   * @param       type    El tipo de tabla que instanciar. Opcional.
   * @param       string  Un prefijo para el nombre de la clase Table. Opcional.
   * @param       array   Array de configuracion para el modelo. Opcional.
   * @return      JTable  Un objeto Table.
   * @since       2.5
   */
  public function getTable($type = 'Voto', $prefix = 'EncuestasTable', $config = array()) {
    return JTable::getInstance($type, $prefix, $config);
  }

  /*
   * Metodo para obtener el formulario.
   *
   * @param       array   $data           Datos para el formulario.
   * @param       boolean $loadData       True if the form is to load its own data (default case), false if not.
   * @return      mixed   A JForm object on success, false on failure
   * @since       2.5
   */
  public function getForm($data = array(), $loadData = true) {
    // Get the form.
    $form = $this->loadForm('com_encuestas.voto', 'voto',
			    array('control' => 'jform', 'load_data' => $loadData));
    if (empty($form)) {
      return false;
    }
    return $form;
  }

  /*
   * Metodo para obtener los datos que deben inyectarse en el formulario.
   *
   * @return      mixed   Los datos del formulario.
   * @since       2.5
   */
  protected function loadFormData() {
    // Check the session for previously entered form data.
    $data = JFactory::getApplication()->getUserState('com_encuestas.edit.voto.data', array());
    if (empty($data)) {
      $data = $this->getItem();
    }
    return $data;
  }
}
