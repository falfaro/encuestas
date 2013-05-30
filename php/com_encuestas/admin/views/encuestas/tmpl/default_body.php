<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->encuestas as $i => $encuesta): ?>
  <tr class="row<?php echo $i % 2; ?>">
    <td><?php echo $encuesta->id; ?></td>
    <td><?php echo JHtml::_('grid.id', $i, $encuesta->id); ?></td>
    <td><?php echo $encuesta->nombre; ?></td>
    <td><?php echo $encuesta->descripcion; ?></td>
    <td><?php echo $encuesta->fecha_inicio; ?></td>
    <td><?php echo $encuesta->fecha_fin; ?></td>
  </tr>
<?php endforeach; ?>
