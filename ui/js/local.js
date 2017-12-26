    // Define an array for every area
    var mfg = ["","Forming","Cutting","Sanding","Testing"];
    var assy = ["","Cap","Hose","Clamp","Sensor"];
    var test = ["","Water","Pressure","Drop"];

    // Generic array for shifts and types
    var shif = ["","1","2","3"];
    var type = ["","Scrap","Rework","Downtime","Trials"];

    // Generic array for what is wrong
    var what = ["","Broken","Scratch","Tolerance","Missing","Wrong","Equipment"];

    // One dimmension array with variables separated by ":" 
    var why = ["","Broken:Tools","Missing:Spec","Wrong:Color","Scratch:Surface","Tolerance:Out","Missing:Dimension","WrongMissing:Drawing","BrokenWrongMissingScratch:Component"];
    
            
    $("#area").change(function(){
       $('#station').empty();
        if ($("#area").val() == "Manufacturing") {
            $.each(mfg, function(index,value) {
		$('#station').append($('<option>').text(value).attr('value',value));
            });
	}
        if ($("#area").val() == "Assembly") {
            $.each(assy, function(index,value) {
		$('#station').append($('<option>').text(value).attr('value',value));
            });
	}
        if ($("#area").val() == "Test") {
            $.each(test, function(index,value) {
		$('#station').append($('<option>').text(value).attr('value',value));
            });
	}
    });

    $("#what").change(function(){
        $("#why").empty();
	$.each(why, function(index,value) {
	   var x = $("#what").val();
            if ( value.includes(x) ) {
              var arr = value.split(":");
   	      $("#why").append($('<option>').text(arr[1]).attr('value',arr[1]));
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

