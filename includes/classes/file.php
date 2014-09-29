<?php


class File{
	public static function exists($file)
	{
		 return file_exists($file);
	}

	public static function size($file)
	{
		return filesize($file);
	}

	public static function name($file)
	{
		return pathinfo($file,PATHINFO_FILENAME);
	}

	public static function extentsion($file)
	{
		return pathinfo($file,PATHINFO_EXTENSION);
	}
	
	public static function delete($file)
	{
		return unlink($file);
	}

	public static function last_updated($file)
	{
		return filemtime($file);
	}

	public static function get($file, $default = null)
	{
		return static::exists($file)
			? file_get_contents($file)
			: $default;
	}

	public static function append($file, $default = null)
	{
		return static::put($file,$data,true);
	}

	public static function put($file, $data, $append = false)
	{
		if ($append)
		{
			return file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
		}
		return file_put_contents($file, $data, LOCK_EX);
	}

	public static function truncate($file)
	{
		if( static::exists($file))
		{
			$fp = fopen($file, 'w');
			fclose($fp);
		}
	}

	public static function newFile($file,$content = "")
	{
		$fp = fopen($file, "w") or die("Unable to open file!");
		fwrite($fp,$content);
		fclose($fp);
	}

	public static function random(){
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); 
	    $length = 10;
	    $alphaLength = strlen($alphabet) - 1; 
	    for ($i = 0; $i < $length; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	
	}


}