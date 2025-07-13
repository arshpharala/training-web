
	
function purchase() {
/* chartjs (#purchase) */
	var myCanvas = document.getElementById("purchase");
	myCanvas.height="260";

	var myCanvasContext = myCanvas.getContext("2d");
	var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 380);
	gradientStroke1.addColorStop(0, 'rgba(0, 0, 0, 0)');
	
	var gradientStroke2 = myCanvasContext.createLinearGradient(0, 0, 0, 280);
	gradientStroke2.addColorStop(0, 'rgba(0, 0, 0, 0)');
	
    var myChart = new Chart( myCanvas, {
		type: 'line',
		data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            type: 'line',
            datasets: [ {
				label: 'In Progress',
				data: [12, 25, 12, 35, 12, 38 ,20],
				backgroundColor: gradientStroke1,
				borderColor: hexToRgba(myVarVal, 0.15),
				pointBackgroundColor:hexToRgba(myVarVal, 0.15),
				pointHoverBackgroundColor:gradientStroke1,
				pointBorderColor :hexToRgba(myVarVal, 0.15),
				pointHoverBorderColor :gradientStroke1,
				pointBorderWidth :0,
				pointRadius :0,
				pointHoverRadius :0,
				borderWidth: 3
            }, {
				label: "Completed",
				data: [ 8, 12, 28, 10, 30, 20 ,25],
				backgroundColor: gradientStroke2,
				borderColor: myVarVal,
				pointBackgroundColor: myVarVal,
				pointHoverBackgroundColor:gradientStroke2,
				pointBorderColor : myVarVal,
				pointHoverBorderColor :gradientStroke2,
				pointBorderWidth :0,
				pointRadius :0,
				pointHoverRadius :0,
				borderWidth: 3
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
						color:'rgba(142, 156, 173,0.1)',
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

function totaloverview() {
 
 var chartdata3 = [
    {
      name: 'sales',
      type: 'bar',
      stack: 'Stack',
	  barMaxWidth: 15,
      data: [10, 8, 15, 4, 9, 19, 5, 14, 20, 15 ,10]
    }
  ];

  var option5 = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25',
    },
    xAxis: {
      data: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018','2019','2020'],
      axisLine: {
        lineStyle: {
          color: 'rgba(227, 237, 252,0.5)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: 'rgba(146, 163, 185, 0.9)'
      }
    },
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'rgba(227, 237, 252,0.5)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(227, 237, 252,0.5)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: 'rgba(146, 163, 185, 0.9)'
      }
    },
    series: chartdata3,
	color: [myVarVal]
  };

  var chart5 = document.getElementById('total-overview');
  var barChart5 = echarts.init(chart5);
  barChart5.setOption(option5);
  window.addEventListener('resize',function(){
	barChart5.resize();
})
}
  
$('.data-table-example').DataTable();
  
