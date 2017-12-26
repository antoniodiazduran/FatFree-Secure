<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $site ?></title>
        <!-- Bootstrap -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
		#transdate {
			border: 1px solid #dfdfdf;
			font-family: Roboto, Arial, Helvetica;
			font-size: 14px;
			color: #404040;
        }
        #transdate_icon {
			vertical-align: middle;
			cursor: pointer;   
		}
	</style>

	<script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject({input: "transdate", button: "calendar_icon"});
            myCalendar.setDateFormat("%Y-%m-%d");
		}
	</script>

    </head>

    <body onload="doOnLoad()">

<div class="container-fluid">
