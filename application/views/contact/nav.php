<div id="secondary_nav" class="contact">
	<ul class="helvetica">
		<li>
			<a href="<?php echo base_url();?>index.php/contact/deerlijk" class="deerlijk <?php if( $this->uri->segment(2) == "deerlijk" || $this->uri->segment(2) == "deerlijk_submit" )  echo "active" ?>" target="_self">
				<?php echo $this->lang->line('contact_location.deerlijk');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/contact/gent" class="gent <?php if( $this->uri->segment(2) == "gent" || $this->uri->segment(2) == "gent_submit" )  echo "active" ?>" target="_self">
				<?php echo $this->lang->line('contact_location.gent');?>	
			</a>
		</li>
	</ul>
</div>

