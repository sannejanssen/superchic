
		
		<div class="form-block">
			<p class="form-label">Name *</p>
			<?php echo form_input('name', set_value('name'), "class='form-input'")?>
			<?php echo form_error('name', "<p class='error'>"); ?>
		</div>
		<div class="form-block">
			<p class="form-label">Emailaddress *</p>
			<?php echo form_input('email', set_value('email'), "class='form-input'")?>
			<?php echo form_error('email', "<p class='error'>"); ?>
		</div>
		<div class="form-block">
			<p class="form-label">Phone *</p>
			<?php echo form_input('phone', set_value('phone'), "class='form-input'")?>
			<?php echo form_error('phone', "<p class='error'>"); ?>
		</div>
		<div class="form-block">
			<p class="form-label">Organisation</p>
			<?php echo form_input('organisation', set_value('organisation'), "class='form-input'")?>
			<?php echo form_error('organisation', "<p class='error'>"); ?>
		</div>
		<div class="form-block textarea">
				<p class="form-label">Message *</p>
				<?php 
					$data = array(
						'name'		=> 'message',
						'class'		=> 'form-textarea',
						'rows'		=> '8'
				);
					echo form_textarea($data);
					?>
					<?php echo form_error('message', "<p class='error'>"); ?>		
			</div>
			<div class="form-block">
				<?php echo form_submit("verzenden", "", "class='form-submit'"); ?>
			</div>
		</div>	
		

