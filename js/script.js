/*********************************
 * @Author  WebSlide Studio
 * @Site    http://www.webslide.hu 
 * @Date    2012-11-05
 * @Version 0.1a
 *  
 * Open source project
 ********************************/
 
var i = 0;

var infos = true;
var files = true;

/**
 * Get files problem with ajax.
 */ 
function getErrors()
{
	if (i<=fileList.length)
	{
		$.get("index.php", { file1: fileList[i],file2: fileList[i+1], file3: fileList[i+2], file4: fileList[i+3], file5: fileList[i+4], ajax: true },
			function(data){
				$('#ittjar').html(i);
				$('#list').append(data);
				progressBar(i);
				if (files!=true) { $('.infos').hide(); }
				if (infos!=true) { $('pre').hide(); }
				i = i+5;
				getErrors();
				return true;
		}).error(function() { 
			if ($('#error').hasClass('empty'))
			{
				$('#error').append('<h2>Error:</h2>');
				$('#error').removeClass('empty');
			}
			if (fileList[i])
				$('#error').append(fileList[i]+'<br>');
			if (fileList[i+1])
				$('#error').append(fileList[i+1]+'<br>');
			if (fileList[i+2])
				$('#error').append(fileList[i+2]+'<br>');
			if (fileList[i+3])
				$('#error').append(fileList[i+3]+'<br>');												
			if (fileList[i+4])
				$('#error').append(fileList[i+4]+'<br>');				
			i = i+5;
			getErrors();
			 
		});
	}                                                        
	else
	{
		$('#progressbar').css('width',500);
		$('#ellenorzes').html('Finish!');
	}
}	


/**
 * Draw progressbar status
 */ 
function progressBar(ittjar)
{
	var width = ((ittjar/fileList.length)*100)*5; 
	$('#progressbar').css('width',width); 

}


/**
 * Run
 */ 
$(document).ready(function()
{
	$('#ennyibol').html(fileList.length);
	
	if (confirm('I\\\'m going to send '+Math.round(fileList.length/5)+' queries to the server. Do you want to continue?'))
	{
		getErrors();
	}
	else
	{
		$('html').html('Aborted!');
	}
	
	
	$('.item').live('click',function(){
		if (files==true) 
		{ 
			files = false; $('.infos').hide(); 
		} 
		else 
		{ 
			files = true; $('.infos').show(); 
		}
	});
	
	$('.errorInfo').live('click',function(){
		if (infos==true) 
		{ 
			infos = false; $('pre').hide(); 
		} 
		else 
		{ 
			infos = true; $('pre').show(); 
		} 
	});			
});	
