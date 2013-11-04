<?php

class Form{
	
	public function __construct(Request $peticion){
		
	}
	
	public function button($texto='Enviar',$class='positive',$img=false,$name='guardar',$type='submit'){
				
		echo '<button type="'.$type.'" class="'.$class.'" name="'.$name.'">';
		echo	'<div class="value">';
		if($img)
        	echo '<img class="icon" src="'.BASE_URL.'public/img/icons/'.$img.'.png" alt="Aplicar" width="20"/>';
        echo $texto.'</div>';
    	echo '</button>';
		
	}

	public function select($array,$value,$select,$id='select',$first='Seleccione uno'){
		if(isset($array)){
			echo '<select name="'.$select.'" id="'.$id.'">';
			echo '<option value="false">'.$first.'</option>';
			foreach ($array as $arr){
				echo '<option value='.$arr[$value].'>'.$arr[$select].'</option>';
			}		
			echo '</select>';
		}
	}
}


?>