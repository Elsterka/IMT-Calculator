<?php
echo "<h1> Расчет индекса массы тела и идеального веса </h1>";
include_once 'form.html';
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
	public function Imtcalc();//содаем метод для внедрения в классы
}

class Ketle implements IMT {
	public $hight, $weight;
//создаем конструктор для задания величин	
	public function __construct($w, $h){
		$this->weight = $w;
                $this->hight = $h;		
	}
//подключаем метод с кодом-функционалом	
	public function Imtcalc() {
//прописываем код функционала
		$v = $this->weight;
                $r = $this->hight * $this->hight;
                return  @round (($v / $r) * 10000, 2);
        }
}
$k = new Ketle($v, $r);
$kk = $k->Imtcalc();
$number = $kk;
    $ms = ['Анорексия','Дефицит массы тела','Норма','Избыток веса','Ожирение 1 степени', 'Ожирение 2 степени', 'Ожирение 3 степени'];
    $rs = ['Высокий','Отсутствует','Отсутствует','Повышенный','Повышенный', 'Высокий', 'Чрезвычайно высокий'];
    $sv = ['Рекомендуется повышение веса и лечение анорексии','Рекомендуется небольшой набор веса','Похудение и набор веса не требуется','Рекомендуется похудение','Рекомендуется снижение массы тела', 'Настоятельно рекомендуется снижение массы тела', 'Необходимо немедленное снижение массы тела'];
    $qt = "Ваш индекс массы тела по Кетле: ";
    $yh = "У Вас: ";
    $rh = "Риск для здоровья: ";
    $rc = "Рекомендация: ";
    
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
    echo "Введите корректные данные!";
}
class Noorden implements IMT {
	public $hight, $weight;
//создаем конструктор для задания величин	
	public function __construct($h){
		//$this->weight = $w;
                $this->hight = $h;		
	}
//подключаем метод с кодом-функционалом	
	public function Imtcalc() {
//прописываем код функционала
		//$v = $this->weight;
                $r = $this->hight;
                return ($r*420)/1000;
        }
}
$n = new Noorden($r);
$nn = $n->Imtcalc();
echo  "<p>Ваш идеальный вес по индексу Ноордена: " .$nn." кг </p>";
}
else {
    echo "<h3>Введите данные для расчета!</h3>";
}
