<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_encuestas&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="voto-form">
  <fieldset class="adminform">
    <legend>Detalles del voto</legend>
    <ul class="adminformlist">
    <?php foreach($this->form->getFieldset() as $field): ?>
      <li><?php echo $field->label; echo $field->input;?></li>
    <?php endforeach; ?>
    </ul>
  </fieldset>
  <div>
    <input type="hidden" name="task" value="voto.edit" />
    <?php echo JHtml::_('form.token'); ?>
  </div>
</form>
