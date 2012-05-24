<?php

 class cTiempo{

  //constructor 
  function cTiempo(){
  }

function calcularTiempo($tiempo,$precision=2){
  $times=array( 365*24*60*60  => "año",
          30*24*60*60   => "mese",
          7*24*60*60    => "semana",
          24*60*60    => "día",
          60*60     => "hora",
          60        => "minuto",
          1       => "segundo");
  
  $passed=time()-$tiempo;
  
  if($passed<5)
  {
    $output='hace menos de 5 minutos';
  }
  else
  {
    $output=array();
    $exit=0;
    
    foreach($times as $period=>$name)
    {
      if($exit>=$precision || ($exit>0 && $period<60)) break;
      
      $result = floor($passed/$period);
      if($result>0)
      {
        $output[]=$result.' '.$name.($result==1?'':'s');
        $passed-=$result*$period;
        $exit++;
      }
      else if($exit>0) $exit++;
    }
        
    $output=implode(' y ',$output).' atrás';
  }
  
  return $output;
  }
}
?>
