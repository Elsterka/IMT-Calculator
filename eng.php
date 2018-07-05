<?php
echo "<h1> Calculation of Body Mass Index and Healthy Weight </h1>";
include_once 'form_eng.html';
$v = "";
$r = "";
$n = "";
$nn = "";
$k = "";
$kk = "";
$number = "";
$ms = "";
$rs = "";
$sv = "";
if(isset($_REQUEST['submit'])){
$v = $_REQUEST ['v'];
$r = $_REQUEST ['r'];

interface IMT {
	public function Imtcalc();
}

class Ketle implements IMT {
	public $hight, $weight;
	
	public function __construct($w, $h){
		$this->weight = $w;
                $this->hight = $h;		
	}

	public function Imtcalc() {

		$v = $this->weight;
                $r = $this->hight * $this->hight;
                return  @round (($v / $r) * 10000, 2);
        }
}
$k = new Ketle($v, $r);
$kk = $k->Imtcalc();
$number = $kk;
    $ms = ['Severely underweight','Underweight','Normal weight','Overweight','Obese Class I', 'Obese Class II', 'Obese Class III'];
    $rs = ['High risk','No risk','No risk','Moderate risk','Increased risk', 'High risk', 'Severely high risk'];
    $sv = ['You should gain weight immediately','You should gain weight a little bit','You need no weight loss and gain','You should lose weight','You should lose weight', 'It is highly recommended to lose weight', 'You should start immediately to lose weight'];
    $qt = "Your Body Mass Index under Quetelet index is: ";
    $yh = "You have: ";
    $rh = "Risk for health: ";
    $rc = "Recommendation: ";
    
    switch ($number) {
    case ($number <= 16):
   	print '<body class="gr0">';
 	echo "<h3>".$qt.$number."</h3><h4>".$yh.$ms[0]."</br>". $rh.$rs[0]."</br>".$rc.$sv[0]."</h4>";
        break;
    case ($number <= 18.5):
	print '<body class="gr1">';
 	echo "<h3>".$qt.$number."</h3><h4>".$yh.$ms[1]."</br>". $rh.$rs[1]."</br>".$rc.$sv[1]."</h4>";
        break;
    case ($number <= 24.99):
  	print '<body class="gr2">';
 	echo "<h3>".$qt.$number."</h3><h4>".$yh.$ms[2]."</br>". $rh.$rs[2]."</br>".$rc.$sv[2]."</h4>";
        break;
    case ($number <= 30):
 	print '<body class="gr3">';
 	echo "<h3>".$qt.$number."</h3><h4>".$yh.$ms[3]."</br>". $rh.$rs[3]."</br>".$rc.$sv[3]."</h4>";
        break;
    case ($number <= 35):
 	print '<body class="gr4">';
 	echo "<h3>".$qt.$number."</h3><h4>".$yh.$ms[4]."</br>". $rh.$rs[4]."</br>".$rc.$sv[4]."</h4>";
        break;  
     case ($number <= 39.99):
 	print '<body class="gr5">';
 	echo "<h3>".$qt.$number."</h3><h4>".$yh.$ms[5]."</br>". $rh.$rs[5]."</br>".$rc.$sv[5]."</h4>";
        break;
    case ($number >= 40):
        print '<body class="gr6">';
 	echo "<h3>".$qt.$number."</h3><h4>".$yh.$ms[6]."</br>". $rh.$rs[6]."</br>".$rc.$sv[6]."</h4>";
        break;
    default :
        echo "Enter correct metric measurements!";
}
class Noorden implements IMT {
	public $hight, $weight;
	
	public function __construct($h){
		//$this->weight = $w;
                $this->hight = $h;		
	}

	public function Imtcalc() {

		//$v = $this->weight;
                $r = $this->hight;
                return ($r*420)/1000;
        }
}
$n = new Noorden($r);
$nn = $n->Imtcalc();
echo  "<p>Your healthy weight under Noorden index: " .$nn." kg </p>";
}
else {
    echo "<h3>Enter your metric measurements for calculation!</h3>";
}
