<?php
 $this->Xls->setHeader('text_'.date('Y_m_d').'.xls'); 

// XLS Data Cell 
$this->Xls->BOF(); 
$this->Xls->writeLabel(1,0,"Student Register"); 
$this->Xls->writeLabel(2,0,"COURSENO : "); 
$this->Xls->writeLabel(2,1,"123"); 
$this->Xls->writeLabel(3,0,"TITLE : "); 
$this->Xls->writeLabel(3,0,"BlaBlaBla"); 
$this->Xls->writeLabel(4,0,"SETION : "); 
$this->Xls->writeLabel(6,0,"NO"); 
$this->Xls->writeLabel(6,1,"ID"); 
$this->Xls->writeLabel(6,2,"Gender"); 
$this->Xls->writeLabel(6,3,"Name"); 
$this->Xls->writeLabel(6,4,"Lastname"); 
$this->Xls->EOF(); 
exit(); 

?>