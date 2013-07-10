<?php
class News_model extends CI_Model{
  
  function load_messages($xml)
  {
    $news = new DOMDocument();
    $filename = 'uploads/xml/'.$xml.'.xml';
    
    $return_value = '';
    
    if( file_exists( $filename ) )
    {
      $news->load($filename);
      $berichten_all = $news->getElementsByTagName( "berichten" );
      
      $generated_html = "";
      
      $c = 1; 
      foreach ( $berichten_all as $berichten )
      {
        $bericht = $berichten->getElementsByTagName( "bericht" );
        
        foreach ( $bericht as $b )
        {
          $title_element = $b->getElementsByTagName( "title" );
          $title_element = $title_element->item(0)->nodeValue;
          
          $message_element = $b->getElementsByTagName( "message" );
          $message_element = $message_element->item(0)->nodeValue;
          
          $generated_html .= <<<ITEMS
          <h2>$title_element</h2>
          <p>$message_element</p>
ITEMS
;          
        }
      }
    }
    else
    {
      $generated_html = <<<ITEMS
          <p>Momenteel zijn er geen nieuwsberichten</p>
ITEMS
;          
    }
    return $generated_html;
  }
}

