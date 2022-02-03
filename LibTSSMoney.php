<?php
class money{
    public $cent=0;
    private $err="";
    /*
    return the error info
    */
    public function error(){
        return $this->err;
    }
    /*
    return 1 if parameter is larger, -1 if smaller, 0 if equal 
    */
    public function plus($a){
        $this->cent+=$a->cent;
    }
    public function minus($a){
        $this->cent-=$a->cent;
    }
    public function times(float $a){
        $this->cent=round($a*$this->cent);
    }
    public function printMoney($withComma=false){
        $cent=abs($this->cent);
        $prefix=$this->cent<0?"-":"";
        if(!$withComma){
            return $prefix.intdiv($cent,100).sprintf(".%'.02d",$cent%100);
        }else{
            return $prefix.number_format(intdiv($cent,100)).sprintf(".%'.02d",$cent%100);
            
        }
    }
    public function setMoney(string $moneyStr,$isNegative=false){
        $arr=explode(".",$moneyStr);
        if(count($arr)==1){
            $this->cent+=(int)$arr[0]*100;
            if($isNegative){$this->cent*=-1;}
            return true;
        }
        if(count($arr)==2){
            $this->cent+=(int)$arr[0]*100;
            if(strlen($arr[1])==1){
                $this->cent+=((int)$arr[1])*10;
                if($isNegative){$this->cent*=-1;}
                return true;
            }
            if(strlen($arr[1])==2){
                $this->cent+=(int)$arr[1];
                if($isNegative){$this->cent*=-1;}
                return true;
            }
            if(strlen($arr[1])>2){
                $this->cent+=(int)str_split($arr[1],2)[0];
                $this->cent+=(int)str_split(str_split($arr[1],2)[1])[0]>4?1:0;
                if($isNegative){$this->cent*=-1;}
                return true;
            }
            $this->err="ERROR: NON-CLEAR DIGIT AFTER\".\".";
            return false;
        }
        $this->err="ERROR: NON-CLEAR \".\".";
        return false;
    }
}