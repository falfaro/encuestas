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
		<legend>Detalles de la encuestas</legend>
		<ul class="adminformlist">
<?	foreach ($this->form->getFieldset() as $field) { ?>
			<li><?=$field->label?><?=$field->input?></li>
<?	} ?>
		</ul>
	</fieldset>
</form>

<?	if ($this->item->id) { ?>
<form action="index.php" method="post" name="elementosEncuestasForm" id="elementosEncuestasForm">
  <input type="hidden" name="option" value="<?=$option?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
  <input type="hidden" name="id_encuesta" value="<?=$this->item->id?>" />
  <?php echo JHtml::_('form.token'); ?>
	
  <fieldset class="adminform">
    <legend><?=JText::_( 'Lista de los elementos de la encuesta' ); ?></legend>

    <?=$this->elementosEncuestasToolBar?>
		
    <table class="adminlist">
      <thead>
        <tr>
          <th width="1%">
            <input type="checkbox" onclick="Joomla.checkAll(this)" title="<?=JText::_( 'JGLOBAL_CHECK_ALL' )?>" value="" name="checkall-toggle">
          </th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th><?=JText::_('JGLOBAL_FIELD_ID_LABEL'); ?></th>
        </tr>
      </thead>
      <tbody>
<?
	        $k = 0;
		$i = 0;
		foreach ($this->elementosEncuestas as &$row)
		{
			$checked = '<input type="checkbox" id="cb' . $i . '" name="cid[]" value="' . $row->id
				. '" onclick="Joomla.isChecked(this.checked, document.elementosEncuestasForm);" title="' . JText::sprintf('JGRID_CHECKBOX_ROW_N', ($i + 1)) . '" />';
			$i++;
			$link = JRoute::_( 'index.php?option=' . $option . '&task=task.edit&id=' . $row->id );
?>
				<tr class="row<?=$k?>">
					<td><?=$checked?></td>
					<td>
						<a href="<?=$link?>">
							<?=$row->nombre?>
						</a>
					</td>
					<td>
						<a href="<?=$link?>">
							<?=$row->descripcion?>
						</a>
					</td>
					<td>
						<a href="<?=$link?>">
							<?=$row->id?>
						</a>
					</td>
				</tr>
<?
			$k = 1 - $k;
		}
?>
			</tbody>
		</table>
	</fieldset>
</form>
<?	} ?>