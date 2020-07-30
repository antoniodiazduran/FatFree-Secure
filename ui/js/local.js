  var areaFields = ["","Airfare","Hotel","Rental","Parking","Meals","Taxi","Marketing","Supplies","Miles"];
  var countryFields = ["USA","Canada","Mexico","Germany","France","England","Italy","China"];
  var stateFields = ["","Other","AL","AK","AS","AZ","AR","CA","CO","CT","DE","DC","FM","FL","GA","GU","HI","ID","IL","IN","IA","KS","KY","LA","ME","MH","MD","MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ","NM","NY","NC","ND","MP","OH","OK","OR","PW","PA","PR","RI","SC","SD","TN","TX","UT","VT","VI","VA","WA","WV","WI","WY"];
  var detailFields = ["","Kaizen","Training","Couching","Support","Analyzing","Expenses","Programming"];
  var statusFields = ["","not ready","sent","errors","paid"];

    // Used on every list.htm file to filter "dvdata" table object
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        // Columns to inspect
        //columns = {{ @columns }};
        filter = document.getElementById("search").value.toUpperCase();
        table = document.getElementById("dvData");
        tr = table.getElementsByTagName("tr");
        td = [];
        for (i = 1; i < tr.length; i++) {
        for (var j of columns) {
            td[j] = tr[i].getElementsByTagName("td")[j];
            if (td[j].innerText != '') {
                if (td[j].innerText.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
        
        }
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
        if (hh<10) { hh = "0"+hh; }
        if (ii<10) { ii = "0"+ii; }
        return yy+'/'+mm+'/'+dd+' '+hh+':'+ii+':'+ss;
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


