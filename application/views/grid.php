<?php

/*
 * This is a script to simplify dojo grid
* all You need to do is pass array to this view and you will get grid for that data
*
* Pass data under variable $data['gridData'] in controller , under $gridData
* */
?>
<link
	rel="stylesheet"
	href="//ajax.googleapis.com/ajax/libs/dojo/1.8.3/dojo/resources/dojo.css">
<!-- <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.8.3/dijit/themes/claro/claro.css" />
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.8.3/dojox/grid/resources/Grid.css" />
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.8.3/dojox/grid/resources/claroGrid.css" /> -->
<link
	rel="stylesheet" href="//localhost:8080/sandeep/public/claro.css" />
<link
	rel="stylesheet" href="//localhost:8080/sandeep/public/claro.css" />

<script
	src="http://dojofoundation.org/packages/dgrid/js/dojo/dojo.js"></script>

<script>
		var dojoConfig;
		(function(){
			var baseUrl = location.pathname.replace(/\/[^/]+$/, "/../../../js/");
			dojoConfig = {
				async: 1,
				cacheBust: "1.8.3-0.3.6",
				// Load dgrid and its dependencies from a local copy.
				// If we were loading everything locally, this would not
				// be necessary, since Dojo would automatically pick up
				// dgrid, xstyle, and put-selector as siblings of the dojo folder.
				packages: [
					{ name: "dgrid", location: baseUrl + "dgrid" },
					{ name: "xstyle", location: baseUrl + "xstyle" },
					{ name: "put-selector", location: baseUrl + "put-selector" }
				]
			};
		}());
	</script>

<script>
	require(["dgrid/Grid", "dojo/domReady!"], function(Grid) {
	var data = <?php echo json_encode($gridData); ?>;
		
	
	var grid = new Grid({
	columns : {
		<?php
			$colomn = (array_keys((array)$gridData[0]));
			
			$colomn = str_replace('@',"",$colomn);
			
			foreach ($colomn as $key) {
				echo $key . ":\"" . $key . "\",";
			}
		?>
		}
		}, "grid");
		grid.renderArray(data);
		});
	</script>
<div class ='claro' id="grid"></div>




