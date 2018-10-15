<?php
// libraryComposer/MyTestClass
namespace libraryComposer\MyTestClass;
use Exception;

class MyTestClass
{

    private $reg = "/[^\(\)]/";
    private $string = "";
    private $left = array();
    private $right = array();
    private $rightElements = array();
    private $enotherElements = array();

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function check() {
        //       $out = preg_replace($this->reg,"",$string);

        $string = $this->string;
        $str = str_split($string);

        foreach ($str as $i){

            if($i == ")"){
                $this->right[] = $i;
                unset($str[$i]);
            }elseif($i == "("){
                $this->left[] = $i;
            }elseif ($i == "\n" || $i == "\t" || $i == "\r" ){
                $this->rightElements[] = $i;
            }

        }

            $vowels = array("+", "-", "x", "÷","0","1","2","3","4","5","6","7","8","9","–",")","("," ","\r","\t","\n");
            $this->enotherElements = str_replace($vowels, "", $this->string);

            $str = str_split($this->enotherElements);


        if(count($this->left) == count($this->right))
        {
            echo "Все скобочьки на месте ";
            echo '<br/>';
        }else{
            echo 'Не хватает скобочьки';
            echo '<br/>';
        }


        try {
            if(!$str[0] == ''){
                throw new Exception('InvalidArgumentException.');
            }
        } catch (Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }

    }
}

//$obj = new MyTestClass("(27 + 38\) - (77 – 69 x (54 x (26 - 3))) x (11 x 12 – 17 + 18) – 36 ÷ (32 – 10 x 4)");
//$obj->check();

