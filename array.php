<?php
function sanitize_text_or_array_field($array_or_string) {
    if( is_string($array_or_string) ){
        $array_or_string = $array_or_string."con";
    }elseif( is_array($array_or_string) ){
        foreach ( $array_or_string as $key => &$value ) {
            if ( is_array( $value ) ) {
                $value = sanitize_text_or_array_field($value);
            }
            else {
                $value = $value."con";
            }
        }
    }

    return $array_or_string;
}
$array=array("hello",array("guys",array("ldgaf","door")),"lolo");
$display=sanitize_text_or_array_field($array);
print_r($display);