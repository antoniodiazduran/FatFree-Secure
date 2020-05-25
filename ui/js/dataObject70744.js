var dataObject = [
	{
	Id:'70744',
	What:['Body','Paint','Chassis','Final','Rework'],
	Body:['Scratch','Hole','bent','wavy'],
	Paint:['Drip','Scratch','Hole','Color'],
	Trim:['Missing','Broken','Mismatch'],
	Chassis:['Wrong','Malfnction','Missing','Part'],
	Final:['Missing','Malfuction','Incomplete'],
	Rework:['Bad','Missing','Poor'],
	},
	{
	Id:'29466',
	What:['Frame','Back','Undercarriage','Cabin','Visual','Computers','Test'],
	Frame:['Scratch','Hole','bent','wavy'],
	Back:['Drip','Scratch','Hole','Color'],
	Undercarriage:['Missing','Broken','Mismatch'],
	Cabin:['Wrong','Malfnction','Missing','Part'],
	Visual:['Missing','Malfuction','Incomplete'],
	Computers:['Bad','Missing','Poor'],
        },
];

dataObject.forEach( function (v,i,a){
	console.log("id:"+v.Id);
	v.What.forEach( function(y) { 
		console.log(y);	
		if (v[y]) {
		 v[y].forEach( function(h) {console.log("\t"+h)});
		}
	});
});

//console.log(Object.keys(dataObject[1].what));

