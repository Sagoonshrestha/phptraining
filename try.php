<?php
// phpinfo();
namespace MyNamespace\myclass;

class MyClass
{
    public function getNamespace(){
        echo __NAMESPACE__;
        echo "<br>";
        echo __CLASS__;
        echo "<br>";
        echo __METHOD__;
    }
}
$obj = new MyClass();
echo $obj->getNamespace()."<br>"; 
echo basename( dirname(__FILE__) ) ;
echo "<br>";
echo "The full path of this file is: " . __FILE__;
echo "<br>";
echo "The directory of this file is: " . __DIR__;
echo "<br>";
echo "Line number " . __LINE__ . "<br>";
function myFunction(){
    echo  "The function name is - " . __FUNCTION__;
}
myFunction();
echo "<br>";

$form ="sagun";
$form .= "shrestha";
var_export($form);
echo $form;
echo "<br>";
$a = crypt('sagun','xaol');
echo $a;
echo"<br>";
echo 1 <=> 5;
echo "<br>";
echo rand(1,100);
echo "<br>";
define("tryiskeyword", "hey IDGAF");
echo tryiskeyword;
echo"<br>";
echo "<a href='https://www.google.com' target='_parent'>google</a>";
echo "<br>";
echo "<br";
echo myclass::class;
;?>
<script type="text/javascript">
	var a= "<input tpye=\"text\"";
	console.log(a);
</script>
