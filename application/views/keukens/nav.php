<div id="secondary_nav">
	<ul class="helvetica">
		<li>
			<a href="<?php echo base_url();?>index.php/keukens/modern" class="modern <?php if( $this->uri->segment(2) == "modern" )  echo "active" ?>" target="_self">
				<?php echo $this->lang->line('keukens.modern');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/keukens/design" class="design <?php if( $this->uri->segment(2) == "design" )  echo "active" ?>" target="_self">
				<?php echo $this->lang->line('keukens.design');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/keukens/landelijk" class="landelijk <?php if( $this->uri->segment(2) == "landelijk" )  echo "active" ?>" target="_self">
				<?php echo $this->lang->line('keukens.landelijk');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/keukens/inrichting" class="inrichting <?php if( $this->uri->segment(2) == "inrichting" )  echo "active" ?>" target="_self">
				<?php echo $this->lang->line('keukens.inrichting');?>
			</a>
		</li>
	</ul>
</div>

