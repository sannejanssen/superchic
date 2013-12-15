<?php 
$this->lang->load('superchic_nl', 'dutch');
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php 
	$extra = "";
	
	if($this->uri->segment(1) )
	{
		$extra = " | ";
		switch ($this->uri->segment(1)){
	    case "nieuws":
	        $extra .= "Nieuws";
	    	break;
	    case "keukens":
	        $extra .= "Keukens";
	        break;
	    case "superchic":
	        $extra .= "Over SuperChic";
	        break;
		case "contact":
	        $extra .= "Contact";
	        break;
      case "service":
          $extra .= "Service";
          break;
		}
	}
	?>
		
	<title>SuperChic<?php echo $extra?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<link rel="stylesheet" href="<?php echo base_url();?>styles/css/supersized.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>styles/css/sliderman.css" />
	
	<link rel="stylesheet" href="<?php echo base_url();?>styles/css/base.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>styles/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>styles/css/work.css">
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>
<body>
<div id="balk">
	<header>
		<div id="logo">
			<a href="<?php echo base_url();?>index.php/keukens/modern" title="SuperChic">
				<img width="190" height="96" alt="SuperChic" src="<?php echo base_url();?>styles/css/img/logo_superchic.png">
			</a>
		</div>
		<div id="main_nav">
			<ul class="helvetica">
				<li>
					<a class="<?php if( $this->uri->segment(1) == "nieuws" )  echo "active" ?>" href="<?php echo base_url();?>index.php/nieuws" class="active" target="_self"><?php echo $this->lang->line('main_nav.nieuws');?></a>
				</li>
				<li>
					<a class="<?php if( $this->uri->segment(1) == "keukens" )  echo "active" ?>" href="<?php echo base_url();?>index.php/keukens" target="_self"><?php echo $this->lang->line('main_nav.keukens');?></a>
				</li>
				<li>
					<a class="<?php if( $this->uri->segment(1) == "superchic" )  echo "active" ?>" href="<?php echo base_url();?>index.php/superchic" target="_self"><?php echo $this->lang->line('main_nav.superchic');?></a>
				</li>
				<li>
					<a class="<?php if( $this->uri->segment(1) == "service" )  echo "active" ?>" href="<?php echo base_url();?>index.php/service" target="_self"><?php echo $this->lang->line('main_nav.service');?></a>
				</li>
				<li>
					<a class="<?php if( $this->uri->segment(1) == "contact" )  echo "active" ?>" href="<?php echo base_url();?>index.php/contact" target="_self"><?php echo $this->lang->line('main_nav.contact');?></a>
				</li>
			</ul>
		</div>
	</header>
</div>
<div id="container">



