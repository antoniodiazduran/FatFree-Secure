// Define an array for every area
    var mfg = ["","Material","Paint","Cutting","Dimension","Routing"];
    var assy = ["","Parts","Drawing","Tools","Man Power"];
    var sub = ["","Parts","Specs","Drawing","Routing","Tools"];
    var hwt = ["","Parts","Drawing","Tools","Man Power"];

    // Generic array for shifts and types
    var shif = ["","1","2","3"];
    var type = ["","Scrap","Rework","Waiting","Trials"];

    // Generic array for what is wrong
    var what = ["","Broken","Scratch","Tolerance","Missing","Wrong","Equipment","Wrong","Lost","Mislabeled"];

    // One dimmension array with variables separated by ":" 
    var why = ["PartsToolsDrawingMan Power: ","PartsToolsSpecsRoutingDimension:Missing","Parts:Scratch","PartsDrawingSpecsPaintDimension:Wrong","PartsTools:Lost","Man PowerPaint:Lack Of","Drawing:Tolerance","DrawingDimension:Design Error","DrawingRouting:Incomplete","Drawng:Out of Date","ToolsSpecsDimension:Inadecuate","Man Power:Not trained","Parts:Spec"];
    
    $("#type").change(function(){
        if ($("#type").val() == "Waiting") 
        { 
            $("#units").val("minutes"); 
        } 
        else 
        { 
            $("#units").val("pieces"); 
        } 
    });

    $("#area").change(function(){
       $('#what').empty();
        if ($("#area").val().search("Station")!=-1) {
            $.each(assy, function(index,value) {
		        $('#what').append($('<option>').text(value).attr('value',value));
            });
	    }
        if ($("#area").val().search("Machine Shop")!=-1) {
            $.each(mfg, function(index,value) {
		        $('#what').append($('<option>').text(value).attr('value',value));
            });
	    }
        if ($("#area").val().search("Sub")!=-1) {
            $.each(sub, function(index,value) {
		        $('#what').append($('<option>').text(value).attr('value',value));
            });
	    }
        if ($("#area").val().search("Test")!=-1) {
            $.each(hwt, function(index,value) {
		        $('#what').append($('<option>').text(value).attr('value',value));
            });
	    }

    });

    $("#what").change(function(){
        $("#reason").empty();
	    $.each(why, function(index,value) {
            // $('#reason').append($('<option>').text(value).attr('value',value));
	        var x = $("#what").val();
                if ( value.search(x)!=-1 ) {
                    var arr = value.split(":");
   	                $("#reason").append($('<option>').text(arr[1]).attr('value',arr[1]));
                }
        });
    });

    function fillType() {
            $.each(type, function(index,value) {
		        $('#type').append($('<option>').text(value).attr('value',value));
            });
    }

    function fillShift() {
            $.each(shif, function(index,value) {
		        $('#shift').append($('<option>').text(value).attr('value',value));
            });
    }

    function fillWhat() {
            $.each(what, function(index,value) {
		        $('#what').append($('<option>').text(value).attr('value',value));
            });
    }

    function formatNow(){
        var yy = new Date().getFullYear();
        var mm = new Date().getMonth()+1;
        var dd = new Date().getDate();
        var ii = new Date().getMinutes();
        var hh = new Date().getHours();
        var ss = new Date().getSeconds();
        if (mm<10) { mm = "0"+mm; }
        if (dd<10) { dd = "0"+dd; }
        return yy+'-'+mm+'-'+dd+' '+hh+':'+ii+':'+ss;
    }

    function formatDates(){
        var yy = new Date().getFullYear();
        var mm = new Date().getMonth()+1;
        var dd = new Date().getDate();
        if (mm<10) { mm = "0"+mm; }
        if (dd<10) { dd = "0"+dd; }
        return yy+'-'+mm+'-'+dd;
    }

