<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );

$option = JRequest::getCmd('option');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

?>
<form action="index.php" method="post" name="adminForm" id="encuesta-admin-form" class="form-validate">
  <input type="hidden" name="option" value="<?=$option?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="id" value="<?=$this->item->id?>" />
  <?php echo JHtml::_('form.token'); ?>
	
  <fieldset class="adminform">
    <legend>Detalles del elemento de la encuesta</legend>
    <ul class="adminformlist">
<?  foreach ($this->form->getFieldset() as $field): ?>
      <li><?=$field->label?><?=$field->input?></li>
<?  endforeach; ?>
    </ul>
  </fieldset>
</form>
