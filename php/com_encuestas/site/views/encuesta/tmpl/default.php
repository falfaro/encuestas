<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>

<style type="text/css">
  table {
    border-collapse:separate;
    border-spacing: 5px;
  }
  th, td { padding: 5px; }
</style>

<h2>Detalles de la encuesta</h2>

<?php if(JDEBUG): ?>
<p><?php var_dump($this->poll); ?></p>
<?php endif; ?>

<table>
  <tr>
    <td>ID</td>
    <td><?php echo $this->poll->id; ?></td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td><?php echo $this->poll->nombre; ?></td>
  </tr>
  <tr>
    <td>Descripcion</td>
    <td><?php echo $this->poll->descripcion; ?></td>
  </tr>
  <tr>
    <td>Fecha inicio</td>
    <td><?php echo $this->poll->fecha_inicio; ?></td>
  </tr>
<?php if($this->poll->fecha_fin): ?>
  <tr>
    <td>Fecha fin</td>
    <td><?php echo $this->poll->fecha_fin; ?></td>
  </tr>
<?php endif; ?>
</table>
