            const days = ['Su','Mo','Tu','We','Th','Fr','Sa'];
            const months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            var offset = 0;

            function getDay() {
                var now = new Date();
                return now.getDay();
            }
            function getMonth() {
                var rnow = new Date();
                var now = new Date(rnow.getFullYear(),rnow.getMonth()+offset,rnow.getDate());
                return months[now.getMonth()] + " " + now.getFullYear();
            }
            function getToday() {
                var rnow = new Date();
                var now = new Date(rnow.getFullYear(),rnow.getMonth()+offset,rnow.getDate());
                return now.getDate()+1;
            }
            function getLastDay() {
                var now = new Date();
                var lsday = new Date(now.getFullYear(),now.getMonth()+1+offset,0);
                return lsday.getDate();
            }
            function getFirstDay() {
                var now = new Date();
                var fsday = new Date(now.getFullYear(),now.getMonth()+offset,1);
                return fsday.getDay();
            }
            function offsetMonth(s,elem) {
                if(s == "0") {
                    offset--;
                } else {
                    offset++;
                }
                constCalendar(elem);
            }
            function getWeekNumber(d) {
                // Copy date so don't modify original
                d = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
                // Set to nearest Thursday: current date + 4 - current day number
                // Make Sunday's day number 7
                d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
                // Get first day of year
                var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
                // Calculate full weeks to nearest Thursday
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
                // Return array of year and week number
                return [d.getUTCFullYear(), weekNo];
            }
            function addTabletoDiv(elem) {
                // Creating table element under div
                var divcalendar = document.getElementById(elem+'calendar');
                var table = document.createElement('table');
                // Adding ID to table element
                table.setAttribute('id',elem+'table');
                //  Adding table to div
                if ( !document.getElementById(elem+'calendar').contains(document.getElementById(elem+'table')) ) {
                    divcalendar.appendChild(table);
                }
            }

            function constCalendar(elem) {
                // Calling funtion to create table element on div
                addTabletoDiv(elem);
                var table = document.getElementById(elem+'table');
                // Clearing table
                table.innerHTML = '';
                // Adding rows for header
                var mon = table.insertRow(0);
                var mcell = mon.insertCell(0);
                mcell.innerHTML = "<button class='days' onClick=offsetMonth(0,'"+elem+"');><</button>";
                var ncell = mon.insertCell(1);
                ncell.colSpan = 5;
                ncell.innerHTML = getMonth();
                var ocell = mon.insertCell(2);
                ocell.innerHTML = "<button class='days' onClick=offsetMonth(1,'"+elem+"');>></button>";
                // Adding names for days
                var row = table.insertRow(1);
                for(i=0; i<7; i++) {
                    var cell = row.insertCell(i);
                    cell.classList.add('th');
                    cell.innerHTML = days[i];
                }
                k=2;
                stt = getFirstDay();
                today = getToday();
                // Adding rows for month days
                for(x=1; x<=getLastDay(); x++) {
                    var rowx = table.insertRow(k);
                    for (y=0; y<7; y++) {
                        if(x<=getLastDay()){
                            var cellx = rowx.insertCell(y);
                            if(y>=stt) {
                                cellx.innerHTML = "<button class='days' onClick=clickCell("+x+",'"+elem+"')> " + x + "</button>";
                                x++;
                            } else {
                                cellx.innerHTML = "";
                            }
                            if( x==today && offset == 0 ){
                                cellx.classList.add('today');
                            }
                        }
                    }
                    k++;
                    x--;
                    stt = 0;
                }
            }
            function clickCell(x,elem) {
                document.getElementById(elem).value = getDateFormatted(x,new Date());
                toggleElement(elem+'calendar');
            }
            function getDateFormatted(x,tmp) {
                var st = new Date(tmp.getFullYear(),tmp.getMonth()+1+offset,tmp.getDate());
                return (st.getMonth()<10?"0"+st.getMonth():st.getMonth()) + "/" + (x<10?"0"+x:x) + "/" +  st.getFullYear();
            }
            function divcalendar(elem) {
                //toggleElement(elem+'calendar');
                toggleElement(elem+'calendar');
                constCalendar(elem);
            }
            function toggleElement(elem) {
                var x = document.getElementById(elem);
                    if (x.style.display != "block") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
            }
