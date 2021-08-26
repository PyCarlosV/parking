<?php

 function validation($lista,$datos,$a=0)
 {
     $ut=0;
    if ($a!=1){
    for ($i = 0; $i <= (count($lista['data']) - 1); $i++) {
        if ($lista['data'][$i][5] == $datos['email'] and $lista['data'][$i][6] == $datos['password']) :
          $ut = 1;
        endif;
      }
    }else{
      for ($i = 0; $i <= (count($lista['data']) - 1); $i++) {
        if ($lista['data'][$i][5] == $datos['email']) :
          $ut = $lista['data'][$i][6];
        endif;
      }
    }

    return $ut;
 };
 function cfecha($lista,$datos)
 {
     $p=0;

     $a=$datos['tiesal'].":00";
     $b=$lista['fecsal'].":00";
     $limite=4;
     $limite2=2;
     $s1=substr($lista['fecent'], 8, $limite2)."-".substr($lista['fecent'], 5, $limite2)."-".substr($lista['fecent'], 0, $limite);
     $s2=substr($datos['tieent'], 8, $limite2)."-".substr($datos['tieent'], 5, $limite2)."-".substr($datos['tieent'], 0, $limite);
     $fecha_entrada= strtotime($s1." ".$b);
     $fecha_actual= strtotime($s2." ".$a);
     $p = [0=>0,1=>$fecha_actual."<".$fecha_entrada ];
        if ( $fecha_actual > $fecha_entrada ) :
          $p = [0=>1,1=>$fecha_actual.">".$fecha_entrada ];
        endif;
    return $p;
 }
 function fechayhora()
 {
    $hoy = getdate();
    #print_r($hoy);
    if (strlen($hoy['mon'])==2)
    {
        $b=$hoy['mon'];
    }else{
        $b='0'.$hoy['mon'];
    }
    if (strlen($hoy['mday'])==2)
    {
        $c=$hoy['mday'];
    }else{
        $c='0'.$hoy['mday'];
    }
    if (strlen($hoy['hours'])==2)
    {
        $d=$hoy['hours'];
    }else{
        $d='0'.$hoy['hours'];
    }
    if (strlen($hoy['minutes'])==2)
    {
        $a=$hoy['minutes'];
    }else{
        $a='0'.$hoy['minutes'];
    }
    $fyh=[
        'fecha'=> $hoy['year']."-".$b."-".$c,
        #'fechaf'=> $c."-".$b."-".$hoy['year'],
        'hora'=> $d.":".$a
    ];
    return $fyh;

 }
/*   class emp {
    protected $id;

    public function __construct()
    {
        $this->id=5;
    }

    public function idget ($var)
    {
        $this->id=$var;
    }
    public function idset ()
    {
        return $this->id;
    }

    public function habla()
    {
       return 'de una'; 
    }
 }

$ars=array();

function adar(emp $var)
{
    array_push($ars,$var);
}

function elog ($l,$sel=$ars) {
    $ars.idset($l);
 } */

?>