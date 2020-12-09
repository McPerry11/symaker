$(function () {
    function ajaxError(err) {
        console.log(err);
        Swal.fire({
            icon: 'error',
            title: 'Cannot Connect to Server',
            text: 'Something went wrong. Please try again later.'
        });
    }
	$('#sb-rcm').addClass('is-active').removeAttr('href');
	$('#nb-rcm').addClass('is-active').removeAttr('href');
	let color = $('html').css('background-color');
	$('h1').css('border-bottom', '2px solid ' + color); // Adds accent to sidebar
	$('#nb-rcm').css('border-left', '3px solid ' + color); // Adds accent to the navbar menu
	$('.breadcrumb ul').append('<li><a href="localhost/symaker2/public"><span class="icon is-medium"><i class="fas fa-columns"></i></span>Dashboard</a></li><li><a>AAA 1101</a></li><li class="is-active"><a><span class="icon"><i class="fas fa-info"></i></span>References & Classroom Management</a></li>');
    $('form#rcmForm').on('submit',function (e){
      e.preventDefault();
      var courseCode = $('#courseCode').val();
      var textbook = $('#textbook').val();
      var otherReferences =$('#otherReferences').val();
      var gradingSystem = $('#gradingSystem').val();
      var courseRequirements = $('#courseRequirements').val();
      var classroomPolicy = $('#classroomPolicy').val();
      var consultationHours = $('#consultationHours').val();
        $.ajax({
            type: 'POST',
            url: "rcmSave",
            data: {courseCode: courseCode, textbook: textbook, otherReferences: otherReferences,
                gradingSystem: gradingSystem, courseRequirements: courseRequirements,
                classroomPolicy: classroomPolicy, consultationHours: consultationHours},
            datatype: 'JSON',
            success: function(data){

            },
            error: function(err) {
                ajaxError(err);
            }
        });
    });
    $('#sb-next').click(function () {
        $('form#rcmForm').submit();
    })
});
