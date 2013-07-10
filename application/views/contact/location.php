<?php 
$send_message_text = $this->lang->line('contact.formulier');
$verzonden = $this->lang->line('contact.verzonden');
$error_message = $this->lang->line('contact.error');

$submit_message = false;
if( $this->uri->segment(3) == "sent" )
{
	$submit_message = true;
}
$map = $map = map_deerlijk($send_message_text, $submit_message, $verzonden);
if( $this->uri->segment(2) == "gent" || $this->uri->segment(2) == "gent_submit" )
{
	$map = $map = map_gent($send_message_text, $submit_message, $verzonden);		
}




?>
<div id="main_content" class="contact helvetica">
	<?php echo $map; ?>
	<?php
	$function = "contact/deerlijk_submit";
	$class = "deerlijk";
	if( $this->uri->segment(2) == "gent" || $this->uri->segment(2) == "gent_submit" )
	{
		$function = "contact/gent_submit";
		$class = "gent";
	}	
	
	?>
	
	<div id="contact_form" class="<?php echo $class; ?>"  style="display: <?php if($this->uri->segment(2) == "deerlijk_submit" || $this->uri->segment(2) == "gent_submit") echo 'block'; else echo 'none'; ?>">
	
		<?php echo form_open($function); ?>
			<div class="section one">
				<div class="form-block">
					<p class="form-label"><?php echo $this->lang->line('contact.voornaam');?></p>
					<?php echo form_input('voornaam', set_value('voornaam'), "class='form-input helvetica' id='voornaam'")?>
				</div>
				<div class="form-block">
					<p class="form-label"><?php echo $this->lang->line('contact.naam');?></p>
					<?php echo form_input('naam', set_value('naam'), "class='form-input helvetica' id='naam'")?>
				</div>
				<div class="form-block">
					<p class="form-label"><?php echo $this->lang->line('contact.telefoon');?></p>
					<?php echo form_input('telefoon', set_value('telefoon'), "class='form-input helvetica' id='telefoon'")?>
				</div>
				<div class="form-block">
					<p class="form-label"><?php echo $this->lang->line('contact.email');?></p>
					<?php echo form_input('email', set_value('email'), "class='form-input helvetica' id='email'")?>
				</div>
			</div>
			<div class="section two">
				<div class="form-block">
					<p class="form-label"><?php echo $this->lang->line('contact.onderwerp');?></p>
					<?php echo form_input('onderwerp', set_value('onderwerp'), "class='form-input helvetica' id='onderwerp'")?>
				</div>
				<div class="form-block textarea">
					<p class="form-label"><?php echo $this->lang->line('contact.bericht');?></p>
					<?php 
						$data = array(
							'name'		=> 'bericht',
							'class'		=> 'form-textarea helvetica',
							'id'		=> 'bericht'
					);
						echo form_textarea($data, set_value('bericht'));
					?>
				</div>
			</div>
			<div class="section three">
				<div class="form-block">
					<p id="error_message"><?php echo $error_message; ?></p>
					<?php echo form_submit("submit", $this->lang->line('contact.verzenden'), "class='helvetica form-submit' onclick='controle_contact(this.form); return false;'"); ?>
				</div>
			</div>
			<div class="clear"></div>	
		
		
		
		<?php echo form_close(); ?>	
		<div class="clear"></div>
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
	<iframe width="938" height="402" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=keukens+Super+Chic,+Heestertsesteenweg+2A,,+8540+Deerlijk,+Belgi%C3%AB&amp;aq=0&amp;oq=superchi&amp;sll=50.910662,3.237668&amp;sspn=0.042321,0.077076&amp;vpsrc=6&amp;ie=UTF8&amp;hq=keukens+Super+Chic,+Heestertsesteenweg+2A,,&amp;hnear=Deerlijk,+West-Vlaanderen,+Vlaams+Gewest,+Belgi%C3%AB&amp;t=m&amp;ll=50.840636,3.377953&amp;spn=0.087154,0.322037&amp;z=12&amp;iwloc=A&amp;output=embed"></iframe>
	<div id="details">
		<p>
			<strong>SuperChic</strong>
			<br />
			Heestertsesteenweg 2A
			<br />
			8540 Deerlijk
		</p>
		<p>
			<span>T</span> 056 77 76 81
			<br />
			<span>F</span> 056 77 41 81
		</p>
		<p>
			info@superchic.be
		</p>
		<table>
			<tr>
				<td colspan="3"><strong>Openingsuren</strong></td>
			</tr>
			<tr>
				<td class="tbl_1">di - vr</td>
				<td class="tbl_2">10.00 - 12.00</td>
				<td class="tbl_3">13.30 - 18.30</td>
			</tr>
			<tr>
				<td class="tbl_1">za</td>
				<td class="tbl_2">10.00 - 12.00</td>
				<td class="tbl_3">13.30 - 17.00</td>
			</tr>
			<tr>
				<td class="tbl_1">zo - ma</td>
				<td colspan="2" class="tbl_2">gesloten</td>
			</tr>
		</table>
		<br />
		$submit_html
		$toonzaal_gent
		<div class="clear"></div>
	</div>
</div>
DEERLIJK
;
}
function map_gent($send_text, $submit, $verzonden)
{
	$submit_html = "<div id='form_button' class='closed'>$send_text</div>";
	$deerlijk_url = base_url() . "index.php/contact/deerlijk";
	$toonzaal_deerlijk = <<<DEERLIJK
	<a href="$deerlijk_url" id='location'>toonzaal Deerlijk</a>
DEERLIJK
;
	if( $submit )
	{
		$submit_html = "<div id='verzonden'>".$verzonden."</div>";
		$toonzaal_deerlijk = '';
	}
	
	return <<<GENT
<div id="content" class="gent helvetica">
	<iframe width="938" height="402" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.be/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=Roobrouck+%26+Zonen,+Rooigemlaan,+Gent&amp;aq=2&amp;oq=roobrou&amp;g=Rooigemlaan+235,+9000+Gent&amp;ie=UTF8&amp;hq=Roobrouck+%26+Zonen,&amp;hnear=Rooigemlaan,+9000+Gent,+Oost-Vlaanderen,+Vlaams+Gewest&amp;t=m&amp;vpsrc=6&amp;cid=13837939371807716291&amp;ll=51.059415,3.695247&amp;spn=0.005422,0.020106&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>
	<div id="details">
		<p>
			<strong>SuperChic</strong>
			<br />
			Rooigemlaan 235
			<br />
			9000 Gent
		</p>
		<p>
			<span>T</span> 09 227 49 96
		</p>
		<p>
			info@superchic.be
		</p>
		<table>
			<tr>
				<td colspan="3"><strong>Openingsuren</strong></td>
			</tr>
			<tr>
				<td class="tbl_1">di - vr</td>
				<td class="tbl_2">10.00 - 12.00</td>
				<td class="tbl_3">13.30 - 18.30</td>
			</tr>
			<tr>
				<td class="tbl_1">za</td>
				<td class="tbl_2">10.00 - 12.00</td>
				<td class="tbl_3">13.30 - 17.00</td>
			</tr>
			<tr>
				<td class="tbl_1">zo - ma</td>
				<td colspan="2" class="tbl_2">gesloten</td>
			</tr>
		</table>
		<br />
		$submit_html
		$toonzaal_deerlijk
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>	
GENT
;
}

