<?php

class TPL{
	
	public $arrData = Array();
	
	function render($file,$data){

		global $path;

		$this->tpl_file = $path.'templates/' . $file . '.tpl';

		if(is_Array($data))
			$this->arrData = $data;

		if (!($this->fd = @fopen($this->tpl_file, 'r')))
		{		
			echo('Error open template ' . $this->tpl_file);
		}
		else{
			$this->template_file = fread($this->fd, filesize($this->tpl_file));
			fclose($this->fd);
			$this->html = $this->template_file;
			$this->html = str_replace ("'", "\'", $this->html);
			$this->html = preg_replace('#\{([a-z0-9\-_]*?)\}#is', "' . $\\1 . '", $this->html);
			reset ($this->arrData);
			while (list($key, $val) = each($this->arrData))
			{
				$$key = $val;
			}
			eval("\$this->html = '$this->html';");
			reset ($this->arrData);
			while (list($key, $val) = each($this->arrData))
			{
				unset($$key);
			}
			$this->html=str_replace ("\'", "'", $this->html);
			return $this->html;
		}
	}
}

?>