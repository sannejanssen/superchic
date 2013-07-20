<div id="secondary_nav" class="contact">
	<ul class="helvetica">
		<li>
			<a href="<?php echo base_url();?>index.php/superchic/geschiedenis" class="geschiedenis <?php if( $this->uri->segment(2) == "geschiedenis" )  echo "active" ?>" target="_self">
				<?php echo $this->lang->line('superchic.geschiedenis');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/superchic/atelier" class="atelier <?php if( $this->uri->segment(2) == "atelier" )  echo "active" ?>" target="_self">
				<?php echo $this->lang->line('superchic.atelier');?>	
			</a>
		</li>
	</ul>
</div>

