/**
 * @namespace Chart
 */
var Chart = require('./core/core')();

Chart.helpers = require('./helpers/index');

// @todo dispatch these helpers into appropriated helpers/helpers.* file and write unit tests!
require('./core/core.helpers')(Chart);

Chart.Animation = require('./core/core.animation');
Chart.animationService = require('./core/core.animations');
Chart.defaults = require('./core/core.defaults');
Chart.Element = require('./core/core.element');
Chart.elements = require('./elements/index');
Chart.Interaction = require('./core/core.interaction');
Chart.layouts = require('./core/core.layouts');
Chart.platform = require('./platforms/platform');
Chart.plugins = require('./core/core.plugins');
Chart.Scale = require('./core/core.scale');
Chart.scaleService = require('./core/core.scaleService');
Chart.Ticks = require('./core/core.ticks');
Chart.Tooltip = require('./core/core.tooltip');

require('./core/core.controller')(Chart);
require('./core/core.datasetController')(Chart);

require('./scales/scale.linearbase')(Chart);
require('./scales/scale.category')(Chart);
require('./scales/scale.linear')(Chart);
require('./scales/scale.logarithmic')(Chart);
require('./scales/scale.radialLinear')(Chart);
require('./scales/scale.time')(Chart);

// Controllers must be loaded after elements
// See Chart.core.datasetController.dataElementType
require('./controllers/controller.bar')(Chart);
require('./controllers/controller.bubble')(Chart);
require('./controllers/controller.doughnut')(Chart);
require('./controllers/controller.line')(Chart);
require('./controllers/controller.polarArea')(Chart);
require('./controllers/controller.radar')(Chart);
require('./controllers/controller.scatter')(Chart);

require('./charts/Chart.Bar')(Chart);
require('./charts/Chart.Bubble')(Chart);
require('./charts/Chart.Doughnut')(Chart);
require('./charts/Chart.Line')(Chart);
require('./charts/Chart.PolarArea')(Chart);
require('./charts/Chart.Radar')(Chart);
require('./charts/Chart.Scatter')(Chart);

// Loading built-in plugins
var plugins = require('./plugins');
for (var k in plugins) {
	if (plugins.hasOwnProperty(k)) {
		Chart.plugins.register(plugins[k]);
	}
}

Chart.platform.initialize();

module.exports = Chart;
if (typeof window !== 'undefined') {
	window.Chart = Chart;
}

// DEPRECATIONS

/**
 * Provided for backward compatibility, not available anymore
 * @namespace Chart.Legend
 * @deprecated since version 2.1.5
 * @todo remove at version 3
 * @private
 */
Chart.Legend = plugins.legend._element;


/**
 * Provided for backward compatibility, not available anymore
 * @namespace Chart.Title
 * @deprecated since version 2.1.5
 * @todo remove at version 3
 * @private
 */
Chart.Title = plugins.title._element;

/**
 * Provided for backward compatibility, use Chart.plugins instead
 * @namespace Chart.pluginService
 * @deprecated since version 2.1.5
 * @todo remove at version 3
 * @private
 */
Chart.pluginService = Chart.plugins;

/**
 * Provided for backward compatibility, inheriting from Chart.PlugingBase has no
 * effect, instead simply create/register plugins via plain JavaScript objects.
 * @interface Chart.PluginBase
 * @deprecated since version 2.5.0
 * @todo remove at version 3
 * @private
 */
Chart.PluginBase = Chart.Element.extend({});

/**
 * Provided for backward compatibility, use Chart.helpers.canvas instead.
 * @namespace Chart.canvasHelpers
 * @deprecated since version 2.6.0
 * @todo remove at version 3
 * @private
 */
Chart.canvasHelpers = Chart.helpers.canvas;

/**
 * Provided for backward compatibility, use Chart.layouts instead.
 * @namespace Chart.layoutService
 * @deprecated since version 2.8.0
 * @todo remove at version 3
 * @private
 */
Chart.layoutService = Chart.layouts;

var ctx = document.getElementById("myChart").getContext('2d');

$(document).on('click', '#addDataset', function(e) {
    addData(ctx, 'jquery', 21);
});

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran"],
        datasets: [{
            label: 'PHP kullanılarak eklenen projeler',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

// var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
// 		var config = {
// 			type: 'line',
// 			data: {
// 				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
// 				datasets: [{
// 					label: 'My First dataset',
// 					backgroundColor: window.chartColors.red,
// 					borderColor: window.chartColors.red,
// 					data: [
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor()
// 					],
// 					fill: false,
// 				}, {
// 					label: 'My Second dataset',
// 					fill: false,
// 					backgroundColor: window.chartColors.blue,
// 					borderColor: window.chartColors.blue,
// 					data: [
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor(),
// 						randomScalingFactor()
// 					],
// 				}]
// 			},
// 			options: {
// 				responsive: true,
// 				title: {
// 					display: true,
// 					text: 'Chart.js Line Chart'
// 				},
// 				tooltips: {
// 					mode: 'index',
// 					intersect: false,
// 				},
// 				hover: {
// 					mode: 'nearest',
// 					intersect: true
// 				},
// 				scales: {
// 					xAxes: [{
// 						display: true,
// 						scaleLabel: {
// 							display: true,
// 							labelString: 'Month'
// 						}
// 					}],
// 					yAxes: [{
// 						display: true,
// 						scaleLabel: {
// 							display: true,
// 							labelString: 'Value'
// 						}
// 					}]
// 				}
// 			}
// 		};
//
// 		window.onload = function() {
// 			var ctx = document.getElementById('canvas').getContext('2d');
// 			window.myLine = new Chart(ctx, config);
// 		};
//
// 		document.getElementById('randomizeData').addEventListener('click', function() {
// 			config.data.datasets.forEach(function(dataset) {
// 				dataset.data = dataset.data.map(function() {
// 					return randomScalingFactor();
// 				});
//
// 			});
//
// 			window.myLine.update();
// 		});
//
// 		var colorNames = Object.keys(window.chartColors);
// 		document.getElementById('addDataset').addEventListener('click', function() {
// 			var colorName = colorNames[config.data.datasets.length % colorNames.length];
// 			var newColor = window.chartColors[colorName];
// 			var newDataset = {
// 				label: 'Dataset ' + config.data.datasets.length,
// 				backgroundColor: newColor,
// 				borderColor: newColor,
// 				data: [],
// 				fill: false
// 			};
//
// 			for (var index = 0; index < config.data.labels.length; ++index) {
// 				newDataset.data.push(randomScalingFactor());
// 			}
//
// 			config.data.datasets.push(newDataset);
// 			window.myLine.update();
// 		});
//
// 		document.getElementById('addData').addEventListener('click', function() {
// 			if (config.data.datasets.length > 0) {
// 				var month = MONTHS[config.data.labels.length % MONTHS.length];
// 				config.data.labels.push(month);
//
// 				config.data.datasets.forEach(function(dataset) {
// 					dataset.data.push(randomScalingFactor());
// 				});
//
// 				window.myLine.update();
// 			}
// 		});
//
// 		document.getElementById('removeDataset').addEventListener('click', function() {
// 			config.data.datasets.splice(0, 1);
// 			window.myLine.update();
// 		});
//
// 		document.getElementById('removeData').addEventListener('click', function() {
// 			config.data.labels.splice(-1, 1); // remove the label first
//
// 			config.data.datasets.forEach(function(dataset) {
// 				dataset.data.pop();
// 			});
// 			window.myLine.update();
// });
