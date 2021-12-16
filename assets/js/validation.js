function validateTextContent() {
	let content = document.getElementById('content').value;
	if (content == "") {

	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Text Content must be filled out!',
	  })
	   return false;
	}
  }



  function validateTextImageContent(){
	let firstname = document.getElementById('firstname').value;
	let lastname = document.getElementById('lastname').value;
	let occupation = document.getElementById('occupation').value;
	let company = document.getElementById('company').value;
	let file = document.getElementById('file').value;
	if (firstname == "" || lastname =="" || occupation =="" || company == "" || file == "") {

	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Text fields must be filled out!',
	  })
	   return false;
	}

  }


function validateEmployee(){
	let firstname = document.getElementById('firstname').value;
	let lastname = document.getElementById('lastname').value;
	let department = document.getElementById('department').value;
	let job_title = document.getElementById('job_title').value;
	
	if (firstname == "" || lastname =="" || department =="" || job_title == "" ) {

	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Text fields must be filled out!',
	  })
	   return false;
	}
	
}



  function validateTextImageStyleContent(){

	let fullname = document.getElementById('fullname').value;
	let department = document.getElementById('department').value;
	let date = document.getElementById('date').value;
	let email = document.getElementById('email').value;

	let officerName = document.getElementById('officerName').value;
	let officerjob = document.getElementById('officerjob').value;
	if (fullname == "" || department =="" || date =="" || email == "" || officerjob =='' || officerName == '') {

	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Text fields must be filled out!',
	  })
	  return false;
	}
}


function validatePayslip(){

	let staff_no = document.getElementById('staff_no').value;
	let allowance = document.getElementById('allowance').value;
	let deduction = document.getElementById('deduction').value;
	let salary = document.getElementById('salary').value;

	if (staff_no == "" || allowance =="" || deduction =="" || salary == "" ) {

	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Text fields must be filled out!',
	  })
	  return false;
	}

}

	


//Read Image
  function readURL(input, id) {
    id = id || '#blah';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }




//  // Add restrictions
//     Dropzone.options.fileupload = {
//       acceptedFiles: 'csv/*, xlsx/* , xls/*',
//       maxFilesize: 2, // MB
// 	  accept: function(file, done) {
// 		if (file.name == "justinbieber.jpg") {
// 		  done("Naha, you don't.");
// 		}
// 		else { done(); }
// 	  }
//     };











