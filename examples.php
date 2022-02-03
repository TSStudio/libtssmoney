<?php 
include "LibTSSMoney.php";
$money=new money();
$money2=new money();
$money3=new money();
$money4=new money();
$money5=new money();
$money->setMoney("1000000.01"); //1000000.01
$money2->setMoney("1000000.00",true); //-1000000.00
$money3->setMoney("1000");//1000.00
$money->plus($money2);//1000000.01+(-1000000.00)=0.01
$money3->times(0.13);//1000.00*0.13=130.00
$money4->setMoney("0.024");//0.02
$money5->setMoney("0.025");//0.03
echo $money->printMoney()."<br>";//0.01
echo $money2->printMoney()."<br>";//-1000000.00
echo $money2->printMoney(true)."<br>";//-1,000,000.00
echo $money3->printMoney()."<br>";//130.00
echo $money4->printMoney()."<br>";//0.02
echo $money5->printMoney()."<br>";//0.03