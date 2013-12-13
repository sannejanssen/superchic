<?php $this->load->view('_includes/header'); ?>

<?php $this->load->view($navigation);?>

<?php

  if(isset($captcha) && is_array($captcha)) {
    $this->load->view($main_content, $captcha);
  }
  else {
    $this->load->view($main_content);
  }
?>

<?php $this->load->view('_includes/footer'); ?>


