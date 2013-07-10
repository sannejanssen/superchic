<?php
class Atelier_model extends CI_Model{

	function load_gallery($xml)
	{
		$atelier_xml = new DOMDocument();
		$filename = 'uploads/xml/'.$xml.'.xml';
		
		if( file_exists( $filename ) )
		{
    		
		
		$atelier_xml->load( 'uploads/xml/'.$xml.'.xml' );
		
		$categories = $atelier_xml->getElementsByTagName( "atelier" );
		
		$generated_html = "<div id='image_slider'>";
		
		foreach ($categories as $category) 
		{
		  
			$projects = $category->getElementsByTagName( "image" );
			foreach ($projects as $project) 
			{
			  $name_element = $project->getElementsByTagName( "src" );
			  
			  $source_element = $name_element->item(0)->nodeValue;
              $source = base_url() . 'uploads/' . $source_element;
			  $generated_html .= "<img src='$source' width='938' height='680' alt='alt' title='title' />";
			}
			
		}
		$generated_html .= "</div>";
	
		$script = base_url()."scripts/sliderman.1.3.6.js";
	
		$return = <<<GALLERY
<div id="slider_container" class="$xml">
	$generated_html
	<div class="clear"></div>
	<div id="image_nav"></div>
	<div class="clear"></div>
	<script type="text/javascript" src="$script"></script>
	<script type="text/javascript">
		effectsDemo2 = 'rain,stairs,fade';
		effects_sanne = 'fade';
		var demoSlider_2 = Sliderman.slider({container: 'image_slider', width: 938, height: 680, effects: effects_sanne,
			display: {
				autoplay: 5000,
				random: true,
				loading: {background: '#000000', opacity: 0.5, image: 'img/loading.gif'},
				buttons: {hide: false, opacity: 1, prev: {className: 'prev', label: ''}, next: {className: 'next', label: ''}},
				description: {hide: true, background: '#000000', opacity: 0.4, height: 50, position: 'bottom'},
				// navigation: {container: 'SliderNameNavigation_2', label: '<img src="img/clear.gif" />'}
				navigation: {container: 'image_nav', label: true}
			}
		});
	</script>
<div class="clear"></div>
</div>
GALLERY
;
		}
		else
		{
			return <<<GALLERY
<div id='image_slider'>

<div id="slider_container">
	Something went wrong, no images available!
<div class="clear"></div>
</div>


<div class="clear"></div>
</div>
GALLERY
;
		}
		
		
	return $return;	
	}
}
?>

