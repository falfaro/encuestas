<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

 
/*
 * Vista Voto
 */
class EncuestasViewVoto extends JView
{
  // Atributos utilizados por la vista y las plantillas relacionadas.
  protected $canDo;
  protected $form;
  protected $items;

  /*
   * Metodo display() de la vista Votos
   * @param   string  $tpl  Nombre del archivo de plantilla; busca
   *                        automaticamente en todos los directorios de
   *                        plantillas.
   *
   * @return  mixed         Una cadena, o un objeto JError en caso de error.
   */
  public function display($tpl = null) {
    // Almacena el nivel de acceso que el usuario actual tiene sobre este
    // componente
    $this->canDo = EncuestasHelper::getActions();

    // Obtiene datos acerca del modelo
    $form = $this->get('Form');
    $item = $this->get('Item');
 
    // Comprueba si han habido errores
    if (count($errors = $this->get('Errors'))) {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }

    // Asigna datos a la vista
    $this->form = $form;
    $this->item = $item;
  
    // Configura la barra de herramientas
    $this->addToolBar();
 
    // Muestra la plantilla
    parent::display($tpl);
  }
 
   /*
   * Configura la barra de herramientas
   */
  protected function addToolBar() {
    // Deshabilita el menu principal
    JRequest::setVar('hidemainmenu', true);
   
    $isNew = ($this->item->id < 1);

    JToolBarHelper::title($isNew ? 'Nuevo voto' : 'Editar voto', 'generic.png');

    // Configura las acciones de la barra de herramientas anidada, asociada a
    // los elementos de la encuesta
    if ($this->canDo->get('core.edit')) {
      JToolBarHelper::apply('voto.apply');
      JToolBarHelper::save('voto.save');
      JToolBarHelper::cancel('voto.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }
    if ($this->canDo->get('core.admin')) {
      JToolBarHelper::divider();
      JToolBarHelper::preferences('com_encuestas');
    }
  }
}
