function basicstp1(){
	var titles = document.getElementById("title").value;
	var descriptions = document.getElementById("description").value;
	var cates = document.getElementById("cate").value;
	var subs = document.getElementById("sub").value;
	var types = document.getElementById("type").value;
	var levels = document.getElementById("level").value;
	if(titles!="" && descriptions!="" && cates!="" && subs!="" && types!="" && levels!="") {
			$("#step1").removeClass("next-step");
			$("#step2").addClass("next-step");
			return true;
		}
	
	else {
		swal("Oops!", "Fill all the required fields!", "error");
		return false;
	} 

}
function detailsstp2(){
	var courses = document.getElementById("courses").value;
	var descrip = document.getElementById("descrip").value;
	var require = document.getElementById("require").value;
	var duration = document.getElementById("duration").value;
	var price = document.getElementById("price").value
	if(courses!="" && descrip!="" && require!="" && duration!="" && price!="") {
			
			$("#step-2").addClass("next-step");

			return true;
		}
	
	else {
		swal("Oops!", "Fill all the required fields!", "error");
		return false;
	} 

}
function faqstp3(){
	var question = document.getElementById("question").value;
	var answer = document.getElementById("answer").value;
	if(question!="" && answer!="") {
			
			$("#step-3").addClass("next-step");
			return true;
		}
	
	else {
		swal("Oops!", "Fill all the required fields!", "error");
		return false;
	} 

}
