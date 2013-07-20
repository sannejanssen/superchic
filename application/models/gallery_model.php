<?php
class Gallery_model extends CI_Model{

	function load_gallery($xml)
	{
		$collection = new DOMDocument();
		$filename = 'uploads/xml/'.$xml.'.xml';
		
		if( file_exists( $filename ) )
		{
    		
		
		$collection->load( 'uploads/xml/'.$xml.'.xml' );
		
		$categories = $collection->getElementsByTagName( "category" );
		
		$generated_html = "<div id='image_slider'>";
		
		$proj_counter = 0;
		$image_counter = 0;
		
		foreach ($categories as $category) 
		{
		    $projects = $category->getElementsByTagName( "project" );
			
		    
			foreach ($projects as $project) 
			{
			  $proj_counter++;
			  
			    $name_element = $project->getElementsByTagName( "name_nl" );
				if( $this->session->userdata('language') ){
					if( $this->session->userdata('language') == "fr" ){
						// FRANS
						$name_element = $project->getElementsByTagName( "name_fr" );
					}
				}
				
				$project_name = ucwords($name_element->item(0)->nodeValue);
				
				$image_elemens = $project->getElementsByTagName( "image" );
				$counter = 1;
				foreach ($image_elemens as $image) 
				{
					if( $proj_counter == 1 )
					{
					  $image_counter++;
					}
				  
				    $source_element = $image->getElementsByTagName( "src" );
					$source = base_url() . 'uploads/keukens/' . $xml .'/' . $source_element->item(0)->nodeValue;
					$generated_html .= "<img src='$source' width='938' height='680' alt='alt' title='title' />";
					if( $counter == 1 )
					{
						$generated_html .= "<div class='category'>$project_name</div>";	
					}
					$counter++;
				}	
			}
		}
		$page = $this->uri->segment(2);
		$start = 0;
		if( $page == "modern" )
		{
		  $start = 0;
		}
		
		// echo "images: " . $image_counter;
		
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
				// autostart: false,
				// random: true,
				loading: {background: '#000000', opacity: 0.5, image: '/styles/css/img/loading.gif'},
				buttons: {hide: false, opacity: 1, prev: {className: 'prev', label: ''}, next: {className: 'next', label: ''}},
				description: {hide: true, background: '#000000', opacity: 0.4, height: 50, position: 'bottom'},
				// navigation: {container: 'SliderNameNavigation_2', label: '<img src="img/clear.gif" />'}
				navigation: {container: 'image_nav', label: true}
			}
		});
		demoSlider_2.go($start);
		// demoSlider_2.play();
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

