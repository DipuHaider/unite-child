<?php 

add_shortcode( 'helloworld', 'torque_hello_world_shortcode' );

function torque_hello_world_shortcode( $atts ) {
   $a = shortcode_atts( array(
      'name' => 'world'
   ), $atts );
   return 'Hello ' . $a['name'] . '!';
}
?>