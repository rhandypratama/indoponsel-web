var maniac = (function($) {
	"use strict";
	return {
	
	/* --------------------------------- */
	/* Progress Animation
	/* --------------------------------- */ 
	loadprogress: function () {
		setTimeout(function(){
			$('.progress-animation .progress-bar').each(function() {
				var me = $(this);
				var perc = me.attr("aria-valuenow");
				var current_perc = 0;
				var progress = setInterval(function() {
					if (current_perc>=perc) {
						clearInterval(progress);
					} else {
						current_perc +=1;
						me.css('width', (current_perc)+'%');
					}
				}, 0);
			});
		}, 0);
	},
	
	
	/* --------------------------------- */
	/* Bootstrap WYSIHTML5
	/* --------------------------------- */ 
	loadbstexteditor: function () {
		$(".bs-texteditor").wysihtml5();
	},
	
	
	
	/* --------------------------------- */
	/* ckeditor
	/* --------------------------------- */ 
	loadckeditor: function () {
		CKEDITOR.replace( 'editor1' );
	},
	
	
	
	/* --------------------------------- */
	/* Input Mask
	/* --------------------------------- */ 
	loadinputmask: function () {
		$(":input").inputmask();	
	},
	
	
	
	/* --------------------------------- */
	/* Color Picker
	/* --------------------------------- */ 
	loadcolorpicker: function () {
		$(".colorpicker").colorpicker();
		$('.colorpicker-plugin').colorpicker();
	},
	
	
	
	/* --------------------------------- */
	/* Bootstrap Select
	/* --------------------------------- */ 
	loadbsselect: function () {
		$('.selectpicker').selectpicker();
	},
	
	
	
	/* --------------------------------- */
	/* Date Picker
	/* --------------------------------- */ 
	loaddatepicker: function () {
		$(".datepicker").datepicker()
		$('.datepicker-plugin').datepicker();
	},
	
	
	/* --------------------------------- */
	/* DataTables
	/* --------------------------------- */ 
	loaddatatables: function () {
		$("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
	},
	
	
	/* --------------------------------- */
	/* Flot Samples
	/* --------------------------------- */ 
	loadflot: function () {
		var data = [], totalPoints = 100;
            function getRandomData() {
                    if (data.length > 0)
                        data = data.slice(1);

                    // Do a random walk
                    while (data.length < totalPoints) {

                        var prev = data.length > 0 ? data[data.length - 1] : 50,
                                y = prev + Math.random() * 10 - 5;

                        if (y < 0) {
                            y = 0;
                        } else if (y > 100) {
                            y = 100;
                        }

                        data.push(y);
                    }

                    var res = [];
                    for (var i = 0; i < data.length; ++i) {
                        res.push([i, data[i]]);
                    }

                    return res;
                }

                var flot_live_chart_plot = $.plot("#flot-live-chart", [getRandomData()], {
                    grid: {
                        borderColor: "#f3f3f3",
                        borderWidth: 1,
                        tickColor: "#f3f3f3"
                    },
                    series: {
                        shadowSize: 0, // Drawing is faster without shadows
                        color: "#4a6b8b"
                    },
                    lines: {
                        fill: true, //Converts the line chart to area chart
                        color: "#4a6b8b"
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        show: true
                    },
                    xaxis: {
                        show: true
                    }
                });

                var updateInterval = 500; //Fetch data ever x milliseconds
                var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching
                function update() {

                    flot_live_chart_plot.setData([getRandomData()]);

                    // Since the axes don't change, we don't need to call plot.setupGrid()
                    flot_live_chart_plot.draw();
                    if (realtime === "on")
                        setTimeout(update, updateInterval);
                }

                if (realtime === "on") {
                    update();
                }
              
				
			$(function() {
				var barOptions = {
					series: {
						bars: {
							show: true,
							barWidth: 0.6,
							fill: true,
							fillColor: {
								colors: [{
									opacity: 0.8
								}, {
									opacity: 0.8
								}]
							}
						}
					},
					xaxis: {
						tickDecimals: 0
					},
					colors: ["#4a6b8b"],
					grid: {
						color: "#999999",
						hoverable: true,
						clickable: true,
						tickColor: "#D4D4D4",
						borderWidth:0
					},
					legend: {
						show: false
					},
					tooltip: true,
					tooltipOpts: {
						content: "x: %x, y: %y"
					}
				};
				var barData = {
					label: "bar",
					data: [
						[1, 30],
						[2, 15],
						[3, 39],
						[4, 22],
						[5, 18],
						[6, 41]
					]
				};
				$.plot($("#flot-bar-chart"), [barData], barOptions);
			});

			$(function() {
				var barOptions = {
					series: {
						lines: {
							show: true,
							lineWidth: 2,
							fill: true,
							fillColor: {
								colors: [{
									opacity: 0.0
								}, {
									opacity: 0.0
								}]
							}
						}
					},
					xaxis: {
						tickDecimals: 0
					},
					colors: ["#4a6b8b"],
					grid: {
						color: "#999999",
						hoverable: true,
						clickable: true,
						tickColor: "#D4D4D4",
						borderWidth:0
					},
					legend: {
						show: false
					},
					tooltip: true,
					tooltipOpts: {
						content: "x: %x, y: %y"
					}
				};
				var barData = {
					label: "bar",
					data: [
						[1, 34],
						[2, 25],
						[3, 19],
						[4, 34],
						[5, 32],
						[6, 44]
					]
				};
				$.plot($("#flot-line-chart"), [barData], barOptions);

			});
			//Flot Pie Chart
			$(function() {

				var data = [{
					label: "Sales 1",
					data: 17,
					color: "#34495e",
				}, {
					label: "Sales 2",
					data: 3,
					color: "#d35400",
				}, {
					label: "Sales 3",
					data: 25,
					color: "#e74c3c",
				}, {
					label: "Sales 4",
					data: 50,
					color: "#27ae60",
				}];

				var plotObj = $.plot($("#flot-pie-chart"), data, {
					series: {
						pie: {
							show: true
						}
					},
					grid: {
						hoverable: true
					},
					tooltip: true,
					tooltipOpts: {
						content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
						shifts: {
							x: 20,
							y: 0
						},
						defaultTheme: false
					}
				});

			});
	},
	
	/* --------------------------------- */
	/* Morris Samples
	/* --------------------------------- */ 
	loadmorris: function () {
		// AREA CHART
                var area = new Morris.Area({
                    element: 'morris-revenue-chart',
                    resize: true,
                    data: [
                        {y: '2011 Q1', item1: 2666, item2: 2666},
                        {y: '2011 Q2', item1: 2778, item2: 2294},
                        {y: '2011 Q3', item1: 4912, item2: 1969},
                        {y: '2011 Q4', item1: 3767, item2: 3597},
                        {y: '2012 Q1', item1: 6810, item2: 1914},
                        {y: '2012 Q2', item1: 5670, item2: 4293},
                        {y: '2012 Q3', item1: 4820, item2: 3795},
                        {y: '2012 Q4', item1: 15073, item2: 5967},
                        {y: '2013 Q1', item1: 10687, item2: 4460},
                        {y: '2013 Q2', item1: 8432, item2: 5713}
                    ],
                    xkey: 'y',
                    ykeys: ['item1', 'item2'],
                    labels: ['Item 1', 'Item 2'],
                    lineColors: ['#c0392b', '#27ae60'],
                    hideHover: 'auto'
                });

                // LINE CHART
                var line = new Morris.Line({
                    element: 'morris-line-chart',
                    resize: true,
					data: [{
						y: '2006',
						a: 100,
						b: 90
					}, {
						y: '2007',
						a: 75,
						b: 65
					}, {
						y: '2008',
						a: 50,
						b: 40
					}, {
						y: '2009',
						a: 75,
						b: 65
					}, {
						y: '2010',
						a: 50,
						b: 40
					}, {
						y: '2011',
						a: 75,
						b: 65
					}, {
						y: '2012',
						a: 100,
						b: 90
					}],
					xkey: 'y',
					ykeys: ['a', 'b'],
					labels: ['Series A', 'Series B'],
					hideHover: 'auto',
                    lineColors: ['#27ae60']
                });

                //DONUT CHART
                var donut = new Morris.Donut({
                    element: 'morris-donut-chart',
                    resize: true,
                    colors: ["#e74c3c", "#e67e22", "#3498db"],
                    data: [
                        {label: "Download Sales", value: 12},
                        {label: "In-Store Sales", value: 30},
                        {label: "Mail-Order Sales", value: 20}
                    ],
                    hideHover: 'auto'
                });
                //BAR CHART
                var bar = new Morris.Bar({
                    element: 'morris-bar-chart',
                    resize: true,
                    data: [
                        {y: '2008', a: 100, b: 90},
                        {y: '2009', a: 73, b: 45},
                        {y: '2010', a: 55, b: 42},
                        {y: '2010', a: 75, b: 65},
                        {y: '2011', a: 20, b: 40},
                        {y: '2013', a: 75, b: 65},
                        {y: '2014', a: 100, b: 90}
                    ],
                    barColors: ['#34495e', '#c0392b'],
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['CPU', 'DISK'],
                    hideHover: 'auto'
                });
	},
	
	/* --------------------------------- */
	/* FullCalendar
	/* --------------------------------- */ 
	loadfullcalendar: function () {
	
		/* initialize the external events
		-----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);

				// make the event draggable using jQuery UI
				$(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                   });

            });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
        -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
            m = date.getMonth(),
			y = date.getFullYear();
            $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    buttonText: {
                        prev: "<span class='fa fa-caret-left'></span>",
                        next: "<span class='fa fa-caret-right'></span>",
                        today: 'today',
                        month: 'month',
                        week: 'week',
                        day: 'day'
                    },
                    //Random events
                    events: [
                        {
                            title: 'My Event 1',
                            start: new Date(y, m, 2)
                        },
                        {
                            title: 'My Event 2',
                            start: new Date(y, m, d - 2),
                            end: new Date(y, m, d - 2),
                            backgroundColor: "#009688"
                        },
                        {
                            title: 'My Event 3',
                            start: new Date(y, m, 6)
                        },
						{
                            title: 'My Event 4',
                            start: new Date(y, m, 10),
                            backgroundColor: "#ff5722"
                        }
                    ],
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function(date, allDay) { // this function is called when something is dropped

                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject');

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                        copiedEventObject.backgroundColor = $(this).css("background-color");
                        copiedEventObject.borderColor = $(this).css("border-color");

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }

                    }
                });

                /* ADDING EVENTS */
                var currColor = "#e74c3c"; //default
                //Color chooser button
                var colorChooser = $("#color-chooser-btn");
                $("#color-chooser > li > a").click(function(e) {
                    e.preventDefault();
                    //Save color
                    currColor = $(this).css("background-color");
                    //Add color effect to button
                    colorChooser
                            .css({"background-color": currColor, "border-color": currColor})
                            .html($(this).text()+' <span class="caret"></span>');
                });
                $("#add-new-event").click(function(e) {
                    e.preventDefault();
                    //Get value and make sure it is not null
                    var val = $("#new-event").val();
                    if (val.length === 0) {
                        return;
                    }

                    //Create event
                    var event = $("<div />");
                    event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
                    event.html(val);
                    $('#external-events').prepend(event);

                    //Add draggable funtionality
                    ini_events(event);

                    //Remove event from text input
                    $("#new-event").val("");
                });
	},
	
	
	
	/* --------------------------------- */
	/* ionrangeSlider
	/* --------------------------------- */ 
	loadionrangeslider: function () {
		//RangeSlider
		$("#ionrange_1").ionRangeSlider({
			type: 'double',
			min: 0,
			max: 5000,
			prefix: "$",
			maxPostfix: "+",
			prettify: false,
			hasGrid: true
		});

		$("#ionrange_2").ionRangeSlider({
			type: 'single',
			min: 0,
			max: 10,
			step: 0.1,
			postfix: " carats",
			prettify: false,
			hasGrid: true
		});

		$("#ionrange_3").ionRangeSlider({
			min: -50,
			max: 50,
			from: 0,
			postfix: "°",
			prettify: false,
			hasGrid: true
		});

		$("#ionrange_4").ionRangeSlider({
			type: 'single',
			values: [
				"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
			],
			hasGrid: true
		});
	},
	
	
	
	/* --------------------------------- */
	/* jQuery Knob
	/* --------------------------------- */ 
	loadknob: function () {
		 $(".knob").knob({
            change : function (value) {
			},
			draw : function () {
				// "tron" case
                if(this.$.data('skin') == 'tron') {
					this.cursorExt = 0.3;
					var a = this.arc(this.cv),pa,r = 1;
					this.g.lineWidth = this.lineWidth;

                    if (this.o.displayPrevious) {
                        pa = this.arc(this.v);
                        this.g.beginPath();
                        this.g.strokeStyle = this.pColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                        this.g.stroke();
                    }

                    this.g.beginPath();
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
					this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
					this.g.stroke();

                    this.g.lineWidth = 2;
                    this.g.beginPath();
					this.g.strokeStyle = this.o.fgColor;
					this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
					this.g.stroke();
					return false;
                }
            }
        });
	},
	
	
	
	/* --------------------------------- */
	/* iCheck
	/* --------------------------------- */ 
	loadicheck: function () {
		$('.skin-square input').iCheck({
            checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
			increaseArea: '20%'
        });
	},
	
	
	
	/* --------------------------------- */
	/* validator
	/* --------------------------------- */ 
	loadvalidator: function () {
		$('#checkform').bootstrapValidator({
			message: 'This value is not valid',
			fields: {
				username: {
				message: 'The username is not valid',
					validators: {
						notEmpty: {
							message: 'The username is required and can\'t be empty'
						}
					}
				},
				password: {
					validators: {
						notEmpty: {
							message: 'The password is required and can\'t be empty'
						}
					}
				}
			}
		});
		
		$('#registerForm').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						username: {
							message: 'The username is not valid',
							validators: {
								notEmpty: {
									message: 'The username is required and can\'t be empty'
								},
								stringLength: {
									min: 6,
									max: 30,
									message: 'The username must be more than 6 and less than 30 characters long'
								},
								regexp: {
									regexp: /^[a-zA-Z0-9_\.]+$/,
									message: 'The username can only consist of alphabetical, number, dot and underscore'
								},
								different: {
									field: 'password',
									message: 'The username and password can\'t be the same as each other'
								}
							}
						},
						email: {
							validators: {
								notEmpty: {
									message: 'The email address is required and can\'t be empty'
								},
								emailAddress: {
									message: 'The input is not a valid email address'
								}
							}
						},
						password: {
							validators: {
								notEmpty: {
									message: 'The password is required and can\'t be empty'
								},
								identical: {
									field: 'confirmPassword',
									message: 'The password and its confirm are not the same'
								},
								different: {
									field: 'username',
									message: 'The password can\'t be the same as username'
								}
							}
						},
						confirmPassword: {
							validators: {
								notEmpty: {
									message: 'The confirm password is required and can\'t be empty'
								},
								identical: {
									field: 'password',
									message: 'The password and its confirm are not the same'
								},
								different: {
									field: 'username',
									message: 'The password can\'t be the same as username'
								}
							}
						},
						phoneNumber: {
							validators: {
								digits: {
									message: 'The value can contain only digits'
								}
							}
						}
					}
				});
				
				$('#contactForm').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						name: {
							message: 'Name is not valid',
							validators: {
								notEmpty: {
									message: 'Name is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[a-zA-Z0-9_\.]+$/,
									message: 'Name can only consist of alphabetical, number, dot and underscore'
								}
							}
						},
						email: {
							validators: {
								notEmpty: {
									message: 'The email address is required and can\'t be empty'
								},
								emailAddress: {
									message: 'The input is not a valid email address'
								}
							}
						},
						website: {
							validators: {
								uri: {
									message: 'The input is not a valid URL'
								}
							}
						},
						Contactmessage: {
							validators: {
								notEmpty: {
									message: 'Message is required and can\'t be empty'
								},
								stringLength: {
									min: 6,
									message: 'Message must be more than 6 characters long'
								}
							}
						},
						captcha: {
							validators: {
								callback: {
									message: 'Wrong answer',
									callback: function(value, validator) {
										var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
										return value == sum;
									}
								}
							}
						}
					}
				});
				
				
				$('#ExpressionValidator').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						 email: {
							validators: {
								notEmpty: {
									message: 'The email address is required and can\'t be empty'
								},
								emailAddress: {
									message: 'The input is not a valid email address'
								}
							}
						},
						website: {
							validators: {
								uri: {
									message: 'The input is not a valid URL'
								}
							}
						},
						phoneNumber: {
							validators: {
								digits: {
									message: 'The value can contain only digits'
								}
							}
						},
						color: {
							validators: {
								hexColor: {
									message: 'The input is not a valid hex color'
								}
							}
						},
						zipCode: {
							validators: {
								usZipCode: {
									message: 'The input is not a valid US zip code'
								}
							}
						}
					}
				});
				
				$('#IdenticalValidator').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						password: {
							validators: {
								notEmpty: {
									message: 'The password is required and can\'t be empty'
								},
								identical: {
									field: 'confirmPassword',
									message: 'The password and its confirm are not the same'
								}
							}
						},
						confirmPassword: {
							validators: {
								notEmpty: {
									message: 'The confirm password is required and can\'t be empty'
								},
								identical: {
									field: 'password',
									message: 'The password and its confirm are not the same'
								}
							}
						}
					}
				});
				
				$('#OtherValidator').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						ages: {
							validators: {
								lessThan: {
									value: 100,
									inclusive: true,
									message: 'The ages has to be less than 100'
								},
								greaterThan: {
									value: 10,
									inclusive: false,
									message: 'The ages has to be greater than or equals to 10'
								}
							}
						}
					}
				});
	},
	
	
	
	/* --------------------------------- */
	/* Bootstrap File Input
	/* --------------------------------- */ 
	loadfileinput: function () {
		$('.file-inputs').bootstrapFileInput();
	},			
	
	
	
	/* --------------------------------- */
	/* Switchery
	/* --------------------------------- */ 
	loadswitchery: function () {
		var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

		elems.forEach(function(html) {
		  var switchery = new Switchery(html);
		});
	},
	
	
	
	/* --------------------------------- */
	/* Bootstrap Slider
	/* --------------------------------- */ 
	loadbsslider: function () {
		$('.slider').slider({precision: 1});
	},
	
	
	
	/* --------------------------------- */
	/* Datepicker
	/* --------------------------------- */ 
	loaddaterangepicker: function () {
		$('#bs-daterangepicker').daterangepicker({
		  ranges: {
			 'Today': [moment(), moment()],
			 'Last 30 Days': [moment().subtract('days', 29), moment()],
			 'This Month': [moment().startOf('month'), moment().endOf('month')],
		  },
		  startDate: moment().subtract('days', 29),
		  endDate: moment()
		},
		function(start, end) {
			$('#bs-daterangepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}
		);
		$('#bs-daterangepicker span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#bs-daterangepicker').show();
	},
	
	
	
	/* --------------------------------- */
	/* Google Map
	/* --------------------------------- */ 
	loadgooglemap: function () {
		var map;
		$("#map").css( "height", $(window).height() - $("header").height() );
		$(document).ready(function(){
			prettyPrint();
			map = new GMaps({
				div: '#map',
				lat: -12.043333,
				lng: -77.028333
			});
		});
	},
	
	
	
	/* --------------------------------- */
	/* Flot Chart
	/* --------------------------------- */ 
	loadchart: function () {
			var v1 = [[1,20],[2,47],[3,40],[4,50],[5,40],[6,45],[7,40],[8,55],[9,43],[10,61]];
			var v2= [[1,10],[2,20],[3,14],[4,25],[5,13],[6,30],[7,10],[8,26],[9,24],[10,27]];	
			var C= ["#7fb9d1","#e65353"];
			var plot = $.plot("#placeholder", [
				{ data: v1, label: "Total Visitors",lines:{fillColor: "#f8fcfd"}},
				{ data: v2, label: "Unique Visitors",lines:{fillColor: "#fdf8f8"}}
			], {
				series: {
					lines: {
						show: true,
						fill: true,
					},
					points: {
                        show: true,
                        fill: true,
                        radius: 4, 
                    },
					grow: {
					  active: true,
					  steps: 15
					},
					shadowSize: 0,
					highlightColor: "#fff"
				},
				grid: {
					hoverable: true,
					clickable: true,
					aboveData: true,
					borderWidth: 0
				},
				xaxis:{
					color: "rgba(0,0,0, 0.07)",
					tickDecimals: 0
				},
				yaxis:{
					color: "rgba(0,0,0, 0.07)",
				},
				colors: C,
				tooltip: true
			});

			function showTooltip(x, y, contents) {
				$("<div id='flot_tip'>" + contents + "</div>").css({
					top: y - 20,
					left: x + 5,
					}).appendTo("body").fadeIn(200);
			}

			var previousPoint = null;
			$("#placeholder").bind("plothover", function (event, pos, item) {
			if (item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
					$("#flot_tip").remove();
					var x = item.datapoint[0].toFixed(0),
					y = item.datapoint[1].toFixed(0);
					showTooltip(item.pageX, item.pageY,
						"<span class='date'>" + moment().format('MMMM '+ x +', YYYY') + "</span>" + y + " visitors");
				}
				} else {
					$("#flot_tip").remove();
					previousPoint = null;            
				}
			});
	},
	
	
	
	/* --------------------------------- */
	/* counter
	/* --------------------------------- */ 
	loadcounter: function () {
		$("[data-toggle='counter']").countTo();
	},
	
	
	/* --------------------------------- */
	/* vectormap
	/* --------------------------------- */ 
	loadvectormap: function () {
		$('#map').vectorMap({
				map: 'europe_merc_en',
				zoomMin: '3',
				backgroundColor: "#fff",
				focusOn: { x: 0.5, y: 0.7, scale: 3 },
				markers: [
					{latLng: [42.5, 1.51], name: 'Andorra'},
					{latLng: [43.73, 7.41], name: 'Monaco'},
					{latLng: [47.14, 9.52], name: 'Liechtenstein'},
					{latLng: [41.90, 12.45], name: 'Vatican City'},
					{latLng: [43.93, 12.46], name: 'San Marino'},
					{latLng: [35.88, 14.5], name: 'Malta'}
				    ],
				    markerStyle: {
				      initial: {
				        fill: '#fa4547',
				        stroke: '#fa4547',
					    "stroke-width": 6,
					    "stroke-opacity": 0.3,
    				      }
				    },	
				regionStyle: {
					initial: {
						fill: '#e4e4e4',
						"fill-opacity": 1,
						stroke: 'none',
						"stroke-width": 0,
						"stroke-opacity": 1
					}
				}
		});
	},	
	
	loadfullvectormap: function () {
		var map;
		$("#map").css( "height", $(window).height() - $("header").height() );
		$('#map').vectorMap({
				map: 'world_mill_en',
				zoomMin: '1',
				backgroundColor: "transparent",
				markers: [
					{latLng: [42.5, 1.51], name: 'Andorra'},
					{latLng: [43.73, 7.41], name: 'Monaco'},
					{latLng: [47.14, 9.52], name: 'Liechtenstein'},
					{latLng: [41.90, 12.45], name: 'Vatican City'},
					{latLng: [43.93, 12.46], name: 'San Marino'},
					{latLng: [35.88, 14.5], name: 'Malta'}
				    ],
				    markerStyle: {
				      initial: {
				        fill: '#fa4547',
				        stroke: '#fa4547',
					    "stroke-width": 6,
					    "stroke-opacity": 0.3,
    				      }
				    },	
				regionStyle: {
					initial: {
						fill: '#fff',
						"fill-opacity": 1,
						stroke: 'none',
						"stroke-width": 0,
						"stroke-opacity": 1
					}
				}
		});
	},	
	
	
	
	/* --------------------------------- */
	/* rickshaw
	/* --------------------------------- */ 
	loadrickshaw: function () {
		var seriesData = [ [], [] ];
		var random = new Rickshaw.Fixtures.RandomData(50);
			
		for (var i = 0; i < 50; i++) {
			random.addData(seriesData);
		}
			
		var graph = new Rickshaw.Graph( {
			element: document.getElementById("rickshaw-chart-demo"),
			height: 150,
			renderer: 'area',
			series: [{
				color: '#81c784',
				data: seriesData[0],
				name: 'upload'
			}, {
				color: '#e8f5e9',
				data: seriesData[1],
				name: 'download'
			}
			]
		} );
			
		graph.render();
		
		var hoverDetail = new Rickshaw.Graph.HoverDetail( {
			graph: graph,
			xFormatter: function(x) {
			return new Date(x * 1000).toString();
			}
		} );
			
		var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
			graph: graph,
			legend: legend
		} );
			
		var legend = new Rickshaw.Graph.Legend( {
			graph: graph,
			element: document.getElementById('rickshaw-legend')
		} );
		setInterval( function() {
			random.removeData(seriesData);
			random.addData(seriesData);
			graph.update();
		}, 500 );
	}
};
})(jQuery);