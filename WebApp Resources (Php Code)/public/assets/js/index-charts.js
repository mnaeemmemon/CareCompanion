'use strict';

/* Chart.js docs: https://www.chartjs.org/ */


// alert(label1)


// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);

// if(NUMBER_OF_PRODUCTTYPE_ORDERED==2)
// {
// 	alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
// }

window.chartColors = {
	green: '#008080',
	gray: '#a9b5c9',
	text: '#252930',
	border: '#e7e9ed'
};

/* Random number generator for demo purpose */
var randomDataPoint = function(){ return Math.round(Math.random()*10000)};


			// var sales = @json($sales);
			// alert(sales);


//Chart.js Line Chart Example 

var lineChartConfig = {
	type: 'line',

	data: {
		labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
		
		datasets: [{
			label: 'Current week',
			fill: false,
			backgroundColor: window.chartColors.green,
			borderColor: window.chartColors.green,
			data: [
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint()
				day1,
				day2,
				day3,
				day4,
				day5,
				day6,
				day7
			],
		}, {
			label: 'Previous week',
		    borderDash: [3, 5],
			backgroundColor: window.chartColors.gray,
			borderColor: window.chartColors.gray,
			
			data: [
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint(),
				// randomDataPoint()
				prev_day1,
				prev_day2,
				prev_day3,
				prev_day4,
				prev_day5,
				prev_day6,
				prev_day7

			],
			fill: false,
		}]
	},
	options: {
		responsive: true,	
		aspectRatio: 1.5,
		
		legend: {
			display: true,
			position: 'bottom',
			align: 'end',
		},
		
		title: {
			display: true,
			
		}, 
		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: window.chartColors.text,
			titleFontColor: window.chartColors.text,

            callbacks: {
	            //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
                label: function(tooltipItem, data) {
	                if (parseInt(tooltipItem.value) >= 1000) {
                        return "$" + tooltipItem.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    } else {
	                    return '$' + tooltipItem.value;
                    }
                }
            },

		},
		hover: {
			mode: 'nearest',
			intersect: true
		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				
				}
			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				},
				ticks: {
		            beginAtZero: true,
		            userCallback: function(value, index, values) {
		                return '$' + value.toLocaleString();   //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
		            }
		        },
			}]
		}
	}
};

// alert('hell');
// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
if(NUMBER_OF_PRODUCTTYPE_ORDERED==1)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					// prod2,
					// prod3,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}

if(NUMBER_OF_PRODUCTTYPE_ORDERED==2)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					// prod3,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}
// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
if(NUMBER_OF_PRODUCTTYPE_ORDERED==3)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2, label3],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					prod3,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}
if(NUMBER_OF_PRODUCTTYPE_ORDERED==4)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2, label3,label4],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					prod3,
					prod4,
					// prod5,
					// prod6,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}

if(NUMBER_OF_PRODUCTTYPE_ORDERED==5)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2, label3,label4,label5],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					prod3,
					prod4,
					prod5,
					// prod6,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}

if(NUMBER_OF_PRODUCTTYPE_ORDERED==6)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2, label3,label4,label5,label6],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					prod3,
					prod4,
					prod5,
					prod6,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}

if(NUMBER_OF_PRODUCTTYPE_ORDERED==7)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2, label3,label4,label5,label6,label7],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					prod3,
					prod4,
					prod5,
					prod6,
					prod7,
					// prod8,
					// prod9,
					// prod10,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}

if(NUMBER_OF_PRODUCTTYPE_ORDERED==8)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2, label3,label4,label5,label6,label7,label8],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					prod3,
					prod4,
					prod5,
					prod6,
					prod7,
					prod8,
					// prod9,
					// prod10,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}

if(NUMBER_OF_PRODUCTTYPE_ORDERED==9)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2, label3,label4,label5,label6,label7,label8,label9],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					prod3,
					prod4,
					prod5,
					prod6,
					prod7,
					prod8,
					prod9,
					// prod10,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}


if(NUMBER_OF_PRODUCTTYPE_ORDERED==10)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2, label3,label4,label5,label6,label7,label8,label9,label10],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					prod3,
					prod4,
					prod5,
					prod6,
					prod7,
					prod8,
					prod9,
					prod10,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}

if(NUMBER_OF_PRODUCTTYPE_ORDERED > 10)
{
		// alert(NUMBER_OF_PRODUCTTYPE_ORDERED);
		// Chart.js Bar Chart Example 
	// var l1 = label1;


	var barChartConfig = {
		type: 'bar',

		data: {
			labels: [label1, label2, label3,label4,label5,label6,label7,label8,label9,label10],
			datasets: [{
				label: 'Orders',
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				borderWidth: 1,
				maxBarThickness: 16,
				
				data: [
					prod1,
					prod2,
					prod3,
					prod4,
					prod5,
					prod6,
					prod7,
					prod8,
					prod9,
					prod10,
				]
			}]
		},



		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#ffffff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,

			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},

				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},

					
				}]
			}
			
		}
	}
}
// // Chart.js Bar Chart Example 

// var barChartConfig = {
// 	type: 'bar',

// 	data: {
// 		labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun','extra'],
// 		datasets: [{
// 			label: 'Orders',
// 			backgroundColor: window.chartColors.green,
// 			borderColor: window.chartColors.green,
// 			borderWidth: 1,
// 			maxBarThickness: 16,
			
// 			data: [
// 				90,
// 				45,
// 				76,
// 				75,
// 				62,
// 				37,
// 				83,
// 				23
// 			]
// 		}]
// 	},



// 	options: {
// 		responsive: true,
// 		aspectRatio: 1.5,
// 		legend: {
// 			position: 'bottom',
// 			align: 'end',
// 		},
// 		title: {
// 			display: true,
// 		},
// 		tooltips: {
// 			mode: 'index',
// 			intersect: false,
// 			titleMarginBottom: 10,
// 			bodySpacing: 10,
// 			xPadding: 16,
// 			yPadding: 16,
// 			borderColor: window.chartColors.border,
// 			borderWidth: 1,
// 			backgroundColor: '#ffffff',
// 			bodyFontColor: window.chartColors.text,
// 			titleFontColor: window.chartColors.text,

// 		},
// 		scales: {
// 			xAxes: [{
// 				display: true,
// 				gridLines: {
// 					drawBorder: false,
// 					color: window.chartColors.border,
// 				},

// 			}],
// 			yAxes: [{
// 				display: true,
// 				gridLines: {
// 					drawBorder: false,
// 					color: window.chartColors.borders,
// 				},

				
// 			}]
// 		}
		
// 	}
// }







// Generate charts on load
window.addEventListener('load', function(){
	
	var lineChart = document.getElementById('canvas-linechart').getContext('2d');
	window.myLine = new Chart(lineChart, lineChartConfig);
	
	var barChart = document.getElementById('canvas-barchart').getContext('2d');
	window.myBar = new Chart(barChart, barChartConfig);
	

});	
	
