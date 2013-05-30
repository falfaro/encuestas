<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1>Encuesta <?php echo $this->encuesta->nombre; ?></h1>

<?php if($this->encuesta->votoPropio):?>
  <!-- No se puede votar: ya se ha votado con anterioridad. -->
  <table class="category">
      <tr>
        <th>Nombre</th>
        <th># votos</th>
      </tr>
    <?php foreach($this->encuesta->votos as $voto):?>
      <tr>
        <td><?php echo $voto->nombre;?></td>
        <td><?php echo $voto->numero;?></td>
      </tr>
    <?php endforeach;?>
  </table>

<?php else:?>

  <form action="<?php echo JRoute::_('index.php'); ?>" method="post" name="formulario_encuesta">
    <input type="hidden" name="option" value="com_encuestas"/>
    <input type="hidden" name="task" value="votar"/>
    <input type="hidden" name="id" value="<?php echo $this->encuesta->id;?>"/>
    <fieldset>
      <legend><strong><?php echo $this->encuesta->descripcion;?></strong></legend>
      <?php foreach($this->encuesta->elementos as $elemento):?>
        <input type = "radio"
               name = "id_voto"
               id = "<?php echo $elemento->id;?>"
               value = "<?php echo $elemento->id;?>" />
        <?php echo $elemento->nombre;?>
        <br/>
      <?php endforeach;?>
      <p/>
      <div style="padding:2px; text-align:left;">
        <input type="submit" name="task_button" class="button" value="Votar" />
      </div>
    </fieldset>
    <?php echo JHTML::_('form.token'); ?>
  </form>

<?php endif;?>

<p>La encuesta <?php echo $this->encuesta->nombre;?> fue creada el dia <?php echo $this->encuesta->fecha_inicio;?>
<?php if($this->encuesta->fecha_fin):?>
 y su plazo de vigencia terminara el dia <?php echo $this->encuesta->fecha_fin;?>
<?php endif;?>
.</p>
