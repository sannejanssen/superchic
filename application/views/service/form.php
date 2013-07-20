<?php

/* Set messages (multi-language) */
$error_message = $this->lang->line('contact.error');

$function = "service/service_submit";

?>
<div id="main_content" class="superchic service helvetica">
  <div id="content">
    <h2>Onze service</h2>
    <p class="intro">
      Service staat bij Keukens SuperChic reeds decennia lang hoog in het vaandel. Wij streven dan ook naar een optimale dienstverlening aan al onze klanten.
      Heeft u een vraag of opmerking over uw SuperChic keuken of over één van uw toestellen, vul dan het onderstaand formulier zo volledig mogelijk in zodat wij u de beste service kunnen verlenen.
    </p>
    <div id="contact_form">
    <?php echo form_open($function); ?>
      <div class="section one">
        <div class="form-block">
          <p class="form-label"><?php echo $this->lang->line('service.naam');?></p>
          <?php echo form_input('naam', set_value('naam'), "class='form-input helvetica' id='naam'")?>
          <input type="email" name="emailaddr" value="" class="magic" id="emailaddr">
        </div>
        <div class="form-block">
          <p class="form-label"><?php echo $this->lang->line('service.telefoon');?></p>
          <?php echo form_input('telefoon', set_value('telefoon'), "class='form-input helvetica' id='telefoon'")?>
        </div>
        <div class="form-block">
          <p class="form-label"><?php echo $this->lang->line('service.aankoop');?></p>
          <?php echo form_input('aankoop', set_value('aankoop'), "class='form-input helvetica' id='aankoop'")?>
        </div>
      </div>
      <div class="section two">
        <div class="form-block">
          <p class="form-label"><?php echo $this->lang->line('service.email');?></p>
          <?php echo form_input('email', set_value('email'), "class='form-input helvetica' id='email'")?>
        </div>
        <div class="form-block">
          <p class="form-label"><?php echo $this->lang->line('service.adres');?></p>
          <?php echo form_input('adres', set_value('adres'), "class='form-input helvetica' id='adres'")?>
        </div>
        <div class="form-block postal">
          <p class="form-label"><?php echo $this->lang->line('service.postcode');?></p>
          <?php echo form_input('postcode', set_value('postcode'), "class='form-input helvetica' id='postcode'")?>
        </div>
        <div class="form-block city">
          <p class="form-label"><?php echo $this->lang->line('service.woonplaats');?></p>
          <?php echo form_input('woonplaats', set_value('woonplaats'), "class='form-input helvetica' id='woonplaats'")?>
        </div>
      </div>
      <div class="section checkbox checkbox1">
        <div class="form-block">
          <p class="form-label"><?php echo $this->lang->line('service.probleem');?></p>
          <?php 
          $data = array(
            'name'        => 'keukenmeubel-probleem-check',
            'id'          => 'keukenmeubel-probleem-check',
            'value'       => '1',
            'checked'     => FALSE,
            'class'       => 'closed form-input helvetica',
          );
          echo form_checkbox($data); ?>
        </div>
      </div>
      <div class="section extra keukenmeubel">
        <div class="form-block textarea">
          <p class="form-label"><?php echo $this->lang->line('service.probleem_label');?></p>
          <?php 
            $data = array(
              'name'    => 'keukenmeubel',
              'class'   => 'form-textarea helvetica',
              'id'    => 'keukenmeubel',
              'placeholder' =>  'Graag hier een duidelijke omschrijving van het probleem.',
              
          );
            echo form_textarea($data, set_value('keukenmeubel'));
          ?>
        </div>
      </div>
      <div class="section checkbox">
        <div class="form-block">
          <p class="form-label"><?php echo $this->lang->line('service.probleem_2');?></p>
          
          <?php 
          $data = array(
            'name'        => 'toestel-probleem-check',
            'id'          => 'toestel-probleem-check',
            'value'       => '1',
            'checked'     => FALSE,
            'class'       => 'closed form-input helvetica',
          );
          echo form_checkbox($data); ?>
        </div>
      </div>
      <div class="section extra keukentoestel">
        <div class="section one">
          <div class="form-block select">
          <p class="form-label"><?php echo $this->lang->line('service.toestel');?></p>
          <?php
            $options = array(
              '1'  => '(stoom)oven',
              '2'  => '(combi-)microgolf',
              '3'  => 'kookplaat',
              '4'  => '(wijn)koelkast',
              '5'  => 'tepan yaki',
              '6'  => 'friteuse',
              '7'  => 'fornuis',
              '8'  => 'vaatwasser',
              '9'  => 'dampkap',
              '10' => 'spoeltafel',
              '11' => 'kraan',
              '12' => 'andere',
            );
            echo form_dropdown('keukentoestel', $options);
            ?>
          </div>
          <div class="form-block">
            <p class="form-label">Merk</p>
            <?php echo form_input('merk', set_value('merk'), "class='form-input helvetica' id='merk'")?>
          </div>
          <div class="form-block">
            <p class="form-label">Type</p>
            <?php echo form_input('type', set_value('type'), "class='form-input helvetica' id='type'")?>
          </div>
        </div>
        <div class="section two">
          <div class="form-block textarea">
          <p class="form-label"><?php echo $this->lang->line('service.probleem_label');?></p>
          <?php 
            $data = array(
              'name'    => 'toestel',
              'class'   => 'form-textarea helvetica',
              'id'    => 'toestel',
              'placeholder' =>  'Graag hier een duidelijke omschrijving van het probleem.'
            );
            echo form_textarea($data, set_value('bericht'));
          ?>
          </div>
        </div>
      </div>



      
      <div class="section three">
          <div class="form-block">
            <p id="error_message"><?php echo $error_message; ?></p>
            <?php echo form_submit("submit", $this->lang->line('contact.verzenden'), "class='helvetica form-submit' onclick='controle_service(this.form); return false;'"); ?>
          </div>
        </div>
      <div class="clear"></div>
    <?php echo form_close(); ?>
    <div class="clear"></div>
  </div> 

    
  </div>
  <div class="clear"></div>
</div>

<?php 
function map_deerlijk($send_text, $submit, $verzonden)
{
	$submit_html = "<div id='form_button' class='closed'>$send_text</div>";
	$gent_url = base_url() . "index.php/contact/gent";
	$toonzaal_gent = <<<GENT
	<a href="$gent_url" id='location'>toonzaal Gent</a>
GENT
;
	if( $submit )
	{
		$submit_html = "<div id='verzonden'>".$verzonden."</div>";
		$toonzaal_gent = '';
	}
	
	
	return <<<DEERLIJK
<div id="content" class="deerlijk helvetica">
	<div id="details">
		<br />
		$submit_html
		$toonzaal_gent
		<div class="clear"></div>
	</div>
</div>
DEERLIJK
;
}


