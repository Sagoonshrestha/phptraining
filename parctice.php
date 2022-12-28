<?php
	function generate_random_string($length) {
            $string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random_string = '';
            for ( $i = 1; $i <= $length; $i++ ) {
                $random_string .= ($string[ rand(0, 61) ]);
                echo $random_string."<br>";
                // echo "<br>";
            }
            return $random_string;
        }
        echo(generate_random_string(5));
?>