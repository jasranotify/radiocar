<html>
<head>
<link rel="stylesheet" href="include/zoom/multizoom.css" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

<script type="text/javascript" src="include/zoom/multizoom.js">

// Featured Image Zoomer (w/ optional multizoom and adjustable power)- By Dynamic Drive DHTML code library (www.dynamicdrive.com)
// Multi-Zoom code (c)2012 John Davenport Scheuer
// as first seen in http://www.dynamicdrive.com/forums/
// username: jscheuer1 - This Notice Must Remain for Legal Use
// Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more

</script>

<script type="text/javascript">

jQuery(document).ready(function($){

$('#image1').addimagezoom({ // single image zoom
zoomrange: [3, 10],
magnifiersize: [300,300],
magnifierpos: 'right',
cursorshade: true,
largeimage: 'hayden.jpg' //<-- No comma after last option!
})


$('#image2').addimagezoom() // single image zoom with default options

$('#multizoom1').addimagezoom({ // multi-zoom: options same as for previous Featured Image Zoomer's addimagezoom unless noted as '- new'
descArea: '#description', // description selector (optional - but required if descriptions are used) - new
speed: 1500, // duration of fade in for new zoomable images (in milliseconds, optional) - new
descpos: true, // if set to true - description position follows image position at a set distance, defaults to false (optional) - new
imagevertcenter: true, // zoomable image centers vertically in its container (optional) - new
magvertcenter: true, // magnified area centers vertically in relation to the zoomable image (optional) - new
zoomrange: [3, 10],
magnifiersize: [300,300],
magnifierpos: 'right',
cursorshade: true //<-- No comma after last option!
});

$('#multizoom2').addimagezoom({ // multi-zoom: options same as for previous Featured Image Zoomer's addimagezoom unless noted as '- new'
descArea: '#description2', // description selector (optional - but required if descriptions are used) - new
disablewheel: true // even without variable zoom, mousewheel will not shift image position while mouse is over image (optional) - new
//^-- No comma after last option! 
});

})

</script>
</head>

<body>


<div>

<h3>Demo 3:</h3>

<div class="targetarea" style="border:1px solid #eee"><img id="multizoom1" width="300" height="200" alt="zoomable" title="" src="samplepics/milla.jpg"/></div>
<div id="description">Milla Jojovitch</div>
<div class="multizoom1 thumbs">
</div>




</div>
<img id="image1" src="millasmall.jpg" style="width:300px; height:200px" />

</body>
</html>