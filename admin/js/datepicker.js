$('input[name="daterange"]').daterangepicker({
	locale: {
	  format: 'YYYY-MM-DD'
	},
	//startDate: '2016-09-01',
	//endDate: '2016-12-30'
}, 
function(start, end, label) {
	//alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
});