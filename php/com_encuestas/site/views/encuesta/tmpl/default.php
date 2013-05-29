<?php
defined('_JEXEC') or die('Restricted access');

if(JDEBUG) {
  echo var_dump($this->poll) . "<br/>";
  echo "ID sesion: " . JFactory::getSession()->getId() . "<br/>";
}
?>

<h1>Encuesta <?php echo $this->poll->nombre; ?></h1>

<?php if($this->poll->votoPropio):?>
  <!-- No se puede votar: ya se ha votado con anterioridad. -->
  <table>
      <tr>
        <th>Nombre</th>
        <th># votos</th>
      </tr>
    <?php foreach($this->poll->votos as $voto):?>
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
    <input type="hidden" name="id" value="<?php echo $this->poll->id;?>"/>
    <fieldset>
      <legend><strong><?php echo $this->poll->descripcion;?></strong></legend>
      <?php foreach($this->poll->elementos as $elemento):?>
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

<p>La encuesta <?php echo $this->poll->nombre;?> fue creada el dia <?php echo $this->poll->fecha_inicio;?>
<?php if($this->poll->fecha_fin):?>
 y su plazo de vigencia terminara el dia <?php echo $this->poll->fecha_fin;?>
<?php endif;?>
.</p>
