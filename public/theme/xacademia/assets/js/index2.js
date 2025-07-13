function salessummary() {

 /* Chartjs (#sales-summary) */
 var myCanvas = document.getElementById("sales-summary");
 myCanvas.height="400";
 var myChart = new Chart( myCanvas, {
	 type: 'bar',
	 data: {
		 labels: ["Jan", "Feb", "Mar", "Apr", "May", "June" ,"July", "Aug", "Sep", "Oct", "Nov", "Dec"],
		 datasets: [{
			 label: 'This Month',
			 data: [28, 17, 28, 23, 15, 19, 28, 22, 15, 28, 21, 28],
			 backgroundColor: myVarVal,
			 borderWidth: 1,
			 hoverBackgroundColor: myVarVal,
			 hoverBorderWidth: 0,
			 borderColor: myVarVal,
			 hoverBorderColor: myVarVal,
		 }, {

			 label: 'Last Month',
			 data: [45, 25, 40, 31, 22, 33, 48, 29, 25, 40, 32, 40],
			 backgroundColor: '#ef5050',
			 borderWidth: 1,
			 hoverBackgroundColor: '#ef5050',
			 hoverBorderWidth: 0,
			 borderColor: '#ef5050',
			 hoverBorderColor: '#ef5050',
		 },
		 {
			 data: [50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50],
			 backgroundColor: '#eff0ff',
			 borderWidth: 1,
			 hoverBackgroundColor: '#eff0ff',
			 hoverBorderWidth: 0,
			 borderColor:'#eff0ff',
			 hoverBorderColor: '#eff0ff',
		 }
	   ]
	 },
	 options: {
		 responsive: true,
		 maintainAspectRatio: false,
		 layout: {
			 padding: {
				 left: 0,
				 right: 0,
				 top: 0,
				 bottom: 0
			 }
		 },
		 tooltips: {
			 enabled: false,
		 },
		 scales: {
			 yAxes: [{
				 gridLines: {
					 display: true,
					 drawBorder: false,
					 zeroLineColor: 'rgba(142, 156, 173,0.1)',
					 color: "rgba(142, 156, 173,0.1)",
				 },
				 scaleLabel: {
					 display: false,
				 },
				 ticks: {
					 beginAtZero: true,
					 stepSize: 10,
					 max: 50,
					 fontColor: "#8492a6",
					 fontFamily: 'Poppins',
				 },
			 }],
			 xAxes: [{
				 barPercentage: 0.15,
				 barValueSpacing :3,
				 barDatasetSpacing : 3,
				 barRadius: 5,
				 stacked: true,
				 ticks: {
					 beginAtZero: true,
					 fontColor: "#8492a6",
					 fontFamily: 'Poppins',
				 },
				 gridLines: {
					 color: "rgba(142, 156, 173,0.1)",
					 display: false
				 },

			 }]
		 },
		 legend: {
            display: true,
          	position: 'top',
            labels: {
                fontColor: '#333',
            },
			padding :{
				top:5,
				bottom:5,
			},
        },
		 elements: {
			 point: {
				 radius: 0
			 }
		 }
	 }
 });
 /* Chartjs (#sales-summary) closed */


}

const ps11 = new PerfectScrollbar('#stud-scroll', {
	useBothWheelAxes:true,
	suppressScrollX:true,
});

$('.data-table-example').DataTable();
