<?php
/*********************************
 * @Author  WebSlide Studio
 * @Site    http://www.webslide.hu 
 * @Date    2012-11-05
 * @Version 0.1a
 *  
 * Open source project
 ********************************/
 
 
     
header('Content-Type: text/html; charset=utf-8');
	
require_once('setup.php');
	 
$functions = array();
$functions_error = array();
$hasProblem = false;
$fileList = array();
	

	
function buildErrorArray()
{
	global $deprecated_functions,$functions,$functions_error;
	
	$i = 0;
	foreach ($deprecated_functions AS $key => $value)
	{
		$functions[$i] = $key.'(';
		$functions_error[$i] = $value;
		$i++;
		$functions[$i] = $key.' (';
		$functions_error[$i] = $value;
		$i++; 
	}
}	


function readFileCheck($file)
{
	global $functions,$functions_error;

	$handle = @fopen($file, "r");

	if ($handle) 
	{
		$i = 0;
		$stop = 0;
		while (!feof($handle))
		{
			$i++;
			$buffer = fgets($handle, 4096); 
			$originalbuffer[$i] = $buffer;
			if ($i>3)
			{
				unset($originalbuffer[$i-3]);
			}
				if (str_replace('/*','',$buffer)!=$buffer)
					$stop = 1;
				if (str_replace('*/','',$buffer)!=$buffer)
				{
					$buffer = explode('*/',$buffer);
					$buffer = $buffer[count($buffer)-1];
				        $stop = 0;
				}
				if ($stop==0)
				{
					if (str_replace('//','',$buffer)!=$buffer)
					{
						$buffer = explode('//',$buffer);
						$buffer = $buffer[0];
					}
					if (str_replace('##','',$buffer)!=$buffer)
					{
						$buffer = explode('//',$buffer);
						$buffer = $buffer[0];
					}
					
					foreach ($functions AS $key => $value)
					{
						$check = preg_replace('/[\s]+'.$value.'[\s]*\()/',"<span style=\"color: #FF99FF; background-color: #666;\">$0</span>",$buffer);
						if ($check!=$buffer)
						{
							$save = $originalbuffer[$i];
							$originalbuffer[$i] = $check;
							$error[$i] = array($functions_error[$key],$originalbuffer);
							$originalbuffer[$i] = $save;
						} 
					}	
					
														
				}
		}
		fclose($handle);                  
	}
	if (isset($error))
		writeProblem($file,$error);
}


function writeProblem($file,$error)
{
	global $hasProblem;
	$hasProblem = true;
	$file = str_replace('//','/',$file);
	echo '<div  title="Toggle infos" class="item">'.$file.'</div>';
	echo '<div class="infos">';
	foreach ($error AS $key => $value)
	{
		echo '<div title="Toggle php source" class="errorInfo">Line '.$key.': '.$value[0]."</div>\r\n<pre>";
		echo '<table>';
		$i = 2;
		foreach ($value[1] AS $kk => $kvalue)
		{
			echo '<tr><td valign="top" style="background-color: #999;">'.($key-$i).'</td><td valign="top">'.$kvalue.'</td></tr>';
			$i--;
		}
		echo '</table>';
		echo '</pre>';
	}
	echo '</div>';
}



function listFiles($directory)
{
	
	if (realpath($directory)== str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']))
		return ;

	if(is_dir($directory))
	{
		$direc = opendir($directory);
        	while(false !== ($file = readdir($direc)))
		{
           
            		if($file !="." && $file != "..")
			{
                		if(is_file($directory."/".$file))
				{
					if (substr($file,-4)=='.php')
					{
						outAjax($directory.'/'.$file);
					}
				}
                		else if(is_dir($directory."/".$file))
				{
                    			listFiles($directory."/".$file);
                		}
                	}
            	}
    	}
	closedir($direc);
    	return ;
}


function outAjax($file)
{
	global $fileList;
	$fileList[] = $file;
}
 



if (!isset($_GET['ajax']))
{       
	listFiles(DIRPATH);
	require_once('template.php');
}
else
{
	buildErrorArray();
	if (isset($_GET['file1']))
		readFileCheck($_GET['file1']);
	if (isset($_GET['file2']))
		readFileCheck($_GET['file2']);
	if (isset($_GET['file3']))
		readFileCheck($_GET['file3']);
	if (isset($_GET['file4']))
		readFileCheck($_GET['file4']);
	if (isset($_GET['file5']))
		readFileCheck($_GET['file5']);
}	

?>
