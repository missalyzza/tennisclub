<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model as Model; 

class customer extends Model 
{ 
    public $table = "customer"; 
    public $timestamps = false;
    
    public function setFirstname($fn) 
    { 
        $this->attributes['firstname']=$fn;
    } 

    public function setSurname($sn) 
    { 
        $this->attributes['surname']=$sn; 
    } 
} 
?>