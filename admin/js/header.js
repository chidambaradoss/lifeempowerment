/*function confirm(){
	alert("Are you sure to delete?");
}*/
function chkchngusr(){
	alert("Single time Purchased Product not allowed for Change Vendor");
}
function datefilter(getval){
	if(getval==3)
		$("#DispTpy").show();
	else{
		$("#DispTpy").hide();
		$("#daterange").val('');
	}
}