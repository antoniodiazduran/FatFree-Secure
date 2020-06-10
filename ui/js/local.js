  var areaFields = ["","Airfare","Hotel","Rental","Parking","Meals","Taxi","Marketing","Supplies","Miles"];
  var countryFields = ["USA","Canada","Mexico","Germany","France","England","Italy","China"];
  var detailFields = ["","Kaizen","Training","Couching","Support","Analyzing","Expenses","Programming"];

    function formatNow(){
        var yy = new Date().getFullYear();
        var mm = new Date().getMonth()+1;
        var dd = new Date().getDate();
        var ii = new Date().getMinutes();
        var hh = new Date().getHours();
        if (mm<10) { mm = "0"+mm; }
        if (dd<10) { dd = "0"+dd; }
        if (hh<10) { hh = "0"+hh; }
        if (ii<10) { ii = "0"+ii; }
        return yy+'/'+mm+'/'+dd+' '+hh+':'+ii;
    }

    function formatDBDate(clockdate) {
	var yy = clockdate.substr(0,4);
	var mm = clockdate.substr(5,2);
	var dd = clockdate.substr(8,2);
	var hh = clockdate.substr(11,2);
	var ii = clockdate.substr(14,2);
	var ss = clockdate.substr(17,2);
	return yy+'/'+mm+'/'+dd+' '+hh+':'+ii;
    }

    function formatDates(){
        var yy = new Date().getFullYear();
        var mm = new Date().getMonth()+1;
        var dd = new Date().getDate();
        if (mm<10) { mm = "0"+mm; }
        if (dd<10) { dd = "0"+dd; }
        return yy+'/'+mm+'/'+dd;
    }


