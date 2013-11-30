<?php
    
class Cache{
    
    public $buffer;
    public $folder;
    public $limit;
    public $request;
        
	public function __construct(){
                $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
                $this->request = $this->normalize($url);
		$this->buffer = '';
                $this->folder = ROOT . 'cache' . DS;
                $this->limit = 10;
                
	}
            
        
	public function isCached(){
            $this->checkIndex();
            if(@$this->buffer = file_get_contents($this->folder.$this->request))
                return true;
            return false;
	}
            
	public function response($buffer){
            echo $buffer;
	}
        
        public function checkIndex(){
            if($this->request == '' || $this->request == '/')
                $this->request = 'portada';
        }
            
        public function set($buffer){            
            $this->checkIndex();
            $cacheFile = $this->folder.$this->request;
            $dir = opendir($this->folder);
            //Si supero el máximo de archivos permitidos, elimino el más viejo
            if($this->countFiles() >= $this->limit){
               if($this->deleteOldest())
                    if(file_put_contents($this->folder.$this->request, $buffer));
                        return true;
            }
            else{
                if(file_put_contents($this->folder.$this->request, $buffer));
                        return true;
            }
                        
            return false;
	}	
            
            
            
        public function normalize($url){
            
            $url = str_replace('/','', $url);
            $url = str_replace(':','', $url);
            $url = str_replace('*','', $url);
            $url = str_replace('"','', $url);
            $url = str_replace('?','', $url);
            $url = str_replace('<','', $url);
            $url = str_replace('>','', $url);
            $url = str_replace('.','', $url);
            $url = str_replace('|','', $url);
                
            return $url;            
	}
            
        function countFiles(){
            $dh  = opendir($this->folder); 
                        

            while (false !== ($nombre_archivo = readdir($dh))) 
               $archivos[] = $nombre_archivo; 
            
            $total_archivos = count($archivos); 
            $total = $total_archivos-2;  
            
            closedir();
            
            return $total;
            
            
        }
        
        function deleteOldest(){

            $dir = opendir($this->folder);
           
                while($file=readdir($dir)){
                    if(!is_dir($file)){
                        $data[] = array($file, date("Y-m-d H:i:s",filemtime($this->folder.$file)));
                        $files[] = $file;
                        $dates[] = date("Y-m-d H:i:s",filemtime($this->folder.$file));
                    }
                }
                closedir($dir); 

                array_multisort($dates, SORT_DESC, $data);
                $oldest = $data[0];
                $oldest = $oldest[0];
                
                if(unlink($this->folder.$oldest))
                        return true;
                return false;
                
        }
}
    
    
?>