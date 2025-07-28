function activity()  {
	/* line chart */
	
	
	var myCanvas = document.getElementById("activity");
	myCanvas.height="110";
	
    var myChart = new Chart( myCanvas, {
		type: 'bar',
		data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            type: 'bar',
            datasets: [ {
				label: 'In Progress',
				data: [50, 70, 30, 120, 40, 141, 60],
				backgroundColor: myVarVal,
				borderColor: myVarVal,
				pointBackgroundColor: myVarVal,
				pointHoverBackgroundColor:myVarVal,
				pointBorderColor : myVarVal,
				pointHoverBorderColor :myVarVal,
				borderWidth: 2,
				borderRadius: 5,
            }, {
				label: "Completed",
				data: [30, 50, 70, 40, 80, 79, 50],
				backgroundColor: 'rgba(239, 80, 80, 1)',
				borderColor: '#ef5050',
				pointBackgroundColor:'#ef5050',
				pointHoverBackgroundColor:'rgba(239, 80, 80, 1)',
				pointBorderColor :'#ef5050',
				pointHoverBorderColor :'rgba(239, 80, 80, 1)',
				borderWidth: 2,
				borderRadius: 5,
			}
			]
        },
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				cornerRadius: 3,
				intersect: false,
			},
			legend: {
				display: true,
				labels: {
					usePointStyle: false,
				},
			},
			scales: {
				xAxes: [{
					barPercentage: 0.6,
					ticks: {
						fontColor: "#605e7e",
					 },
					display: true,
					gridLines: {
						display: true,
						color:'rgba(96, 94, 126, 0.1)',
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'Month',
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#605e7e",
					 },
					display: true,
					gridLines: {
						display: true,
						color:'rgba(96, 94, 126, 0.1)',
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'sales',
						fontColor: 'transparent'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
} 

function viewers()  {
	$(".viewers").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {
		type: 'line',
		height: '100',
		width: '300',
		lineColor: myVarVal,
		fillColor: hexToRgba(myVarVal, 0.1),
		lineWidth: 1,
		spotColor: myVarVal,
		minSpotColor: myVarVal
	});
}


$('.data-table-example').DataTable();
