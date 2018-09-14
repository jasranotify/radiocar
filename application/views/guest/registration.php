<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base."include/form_registration/"; ?>view.css" media="all">
<script type="text/javascript" src="<?php echo $base."include/form_registration/"; ?>view.js"></script>
<script type="text/javascript" src="<?php echo $base."include/form_registration/"; ?>calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="<?php echo $base."include/form_registration/"; ?>top.png" alt="">
	<div id="form_container">
	
		<h1><a>Registratiocn</a></h1>
		<form id="form_1090" class="appnitro" enctype="multipart/form-data" method="post" action="">
		<h2><a>Registration Form</a></h2>								
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Name *</label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Ic *</label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Gender </label>
		<span>
			<input id="element_5_1" name="element_5" class="element radio" type="radio" value="1" />
<label class="choice" for="element_5_1">Male</label>
<input id="element_5_2" name="element_5" class="element radio" type="radio" value="2" />
<label class="choice" for="element_5_2">Female</label>

		</span> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Address *</label>
		<div>
			<textarea id="element_3" name="element_3" class="element textarea medium"></textarea> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Phone *</label>
		<div>
			<input id="element_6" name="element_6" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Email *</label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<?php /*?><li id="li_9" >
		<label class="description" for="element_9">Drop Down </label>
		<div>
		<select class="element select medium" id="element_9" name="element_9"> 
			<option value="" selected="selected"></option>
<option value="1" >First option</option>
<option value="2" >Second option</option>
<option value="3" >Third option</option>

		</select>
		</div> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Checkboxes </label>
		<span>
			<input id="element_10_1" name="element_10_1" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_10_1">First option</label>
<input id="element_10_2" name="element_10_2" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_10_2">Second option</label>
<input id="element_10_3" name="element_10_3" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_10_3">Third option</label>

		</span> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Date </label>
		<span>
			<input id="element_7_1" name="element_7_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_7_1">MM</label>
		</span>
		<span>
			<input id="element_7_2" name="element_7_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_7_2">DD</label>
		</span>
		<span>
	 		<input id="element_7_3" name="element_7_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_7_3">YYYY</label>
		</span>
	
		<span id="calendar_7">
			<img id="cal_img_7" class="datepicker" src="<?php echo $base."include/form_registration/"; ?>calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_7_3",
			baseField    : "element_7",
			displayArea  : "calendar_7",
			button		 : "cal_img_7",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Upload a File </label>
		<div>
			<input id="element_8" name="element_8" class="element file" type="file"/> 
		</div>  
		</li><?php */?>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1090" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			Back To  <a href="<?php echo $base; ?>">Home</a>
		</div>
	</div>
	<img id="bottom" src="<?php echo $base."include/form_registration/"; ?>bottom.png" alt="">
	</body>
</html>