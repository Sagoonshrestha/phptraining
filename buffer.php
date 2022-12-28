<?php
  // Turn on output buffering
  // There will be no output until you "flush" or echo the buffer's contents
  ob_start();
  
  // Set some variables unrelated to buffering
  $name = "Lara";
  $food = "cashews";
?> 
<!-- Remember, none of this HTML will be sent to the browser, yet! -->

<h1>Hi, my name is <?php echo $name; ?>.</h1>
<p>I like <?php echo $food; ?>.</p> 
<?php
  // Put all of the above ouptut into a variable
  // This has to be before you "clean" the buffer
  $content = ob_get_contents();
  
  // Erase the buffer in case we want to use it for something else later
  ob_end_clean();

  // All of the data that was in the buffer is now in $content
  echo $content;
?>
