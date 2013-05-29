<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->votos as $i => $voto): ?>
  <tr class="row<?php echo $i % 2; ?>">
    <td><?php echo $voto->id; ?></td>
    <td><?php echo JHtml::_('grid.id', $i, $voto->id); ?></td>
    <td><?php echo $voto->id_encuesta; ?></td>
    <td><?php echo $voto->id_elemento_encuesta; ?></td>
    <td><?php echo $voto->id_sesion; ?></td>
    <td><?php echo $voto->fecha; ?></td>
  </tr>
<?php endforeach; ?>
