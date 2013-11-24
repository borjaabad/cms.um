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
        
        //Form::setSelect($this->_posiciones,'pos_portada','pos_portada',$first='Posición portada',$this->_noticia['pos_portada'],'form-control');exit;
        public function setSelect($array,$name='',$id='',$first='Seleccione uno',$selected=false,$class=''){
		if(isset($array)){
			echo '<select name="'.$name.'" id="'.$id.'" class="'.$class.'">';

			echo '<option value="">'.$first.'</option>';
			foreach ($array as $key => $value){
                           //echo $selected.'--'.$arr[$value].'<br>'; 
                            if($selected == $value)
				echo '<option value="'.$value.'" selected="selected">'.$key.'</option>';
                            else 
				echo '<option value="'.$value.'">'.$key.'</option>';
                            
                            
                        }		
			echo '</select>';
		}
	}
        
	public function select($array,$value,$select,$id='select',$first='Seleccione uno',$selected=false,$class=''){
		if(isset($array)){
			echo '<select name="'.$select.'" id="'.$id.'" class="'.$class.'">';

			echo '<option value="">'.$first.'</option>';
			foreach ($array as $arr){
                           //echo $selected.'--'.$arr[$value].'<br>'; 
                            if($selected == $arr[$value])
				echo '<option value="'.$arr[$value].'" selected="selected">'.$arr[$select].'</option>';
                            else 
				echo '<option value="'.$arr[$value].'">'.$arr[$select].'</option>';
                            
                            
                        }		
			echo '</select>';
		}
	}
}


?>