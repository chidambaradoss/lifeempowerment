function poststp1(){
	var sponsorid = document.getElementById("sponsorid").value;
	var password = document.getElementById("password").value;
	var passwordagain = document.getElementById("passwordagain").value;
	var terms = document.getElementById("terms").checked;
	if(sponsorid!="" && password!="" && passwordagain!="" && terms==true) {
		if(password != passwordagain){
			swal("Oops!", "Password doesn't match!", "error");
			return false;
		}
		else{
			$("#step1").removeClass("active");
			$("#step2").addClass("active");
			$("#li1").removeClass("active");
			$("#li1").addClass("disabled");
			$("#li2").removeClass("disabled");
			$("#li2").addClass("active");
			return true;
		}
	}
	else {
		swal("Oops!", "Fill all the required fields!", "error");
		return false;
	}
}
function regstp2(){
	var user_fname = document.getElementById("user_fname").value;
	var user_lname = document.getElementById("user_lname").value;
	var dateday = document.getElementById("dateday").value;
	var datemonth = document.getElementById("datemonth").value;
	var dateyr = document.getElementById("dateyr").value;
	var user_phone = document.getElementById("user_phone").value;
	var user_email = document.getElementById("user_email").value;
	var user_commaddr1 = document.getElementById("user_commaddr1").value;
	var cntryid = document.getElementById("cntryid").value;
	var stid = document.getElementById("stid").value;
	var user_ppostalcode = document.getElementById("user_ppostalcode").value;
	var user_ssn = document.getElementById("user_ssn").value;
	if(user_fname!="" && user_lname!="" && dateday!="" && datemonth!="" && dateyr!="" && user_phone!="" && user_email!="" && user_commaddr1!="" && cntryid!="" && stid!="" && user_ppostalcode!="") {
		$("#step2").removeClass("active");
		$("#complete").addClass("active");
		$("#li2").removeClass("active");
		$("#li2").addClass("disabled");
		$("#li3").removeClass("disabled");
		$("#li3").addClass("active");
		return true;
	}
	else {
		swal("Oops!", "Fill all the required fields!", "error");
		return false;
	}
}
function regstp3(){
	var optionsRadios2 = document.getElementById("optionsRadios2").checked;
	if(optionsRadios2 != true) {
		swal("Oops!", "Select Your Plan!", "error");
		return false;
	}
	else return true;
}
function chkcntry(){
	var cntryid= document.getElementById("cntryid").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("stid").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajaxstate.php?getval="+cntryid, true);
  xhttp.send();
}
function chksponsor(){
  var sponsorid= document.getElementById("sponsorid").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("sponsorname").value = this.responseText;
    }
  };
  xhttp.open("GET", "ajaxsponsor.php?getval="+sponsorid, true);
  xhttp.send();
}