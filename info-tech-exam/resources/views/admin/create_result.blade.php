@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4>New Student Result Creation Form</h4>


			</div>

		</div>
		<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Student Result</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">New</a></li>
			</ol>
		</div>
	</div>
	<form name="form1" action="{{ route('student.result.save') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-xl-12 col-xxl-12 col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="row"><!-- 12 raw started -->
						<div class="col-xl-12 col-xxl-12  col-sm-12">
							<div class="row form-group" style="background-color: #3695EB;">
								<div style="text-align: center;margin: 0 auto; ">
									<h4 style="color: white;">Student Info <br></h4>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-xl-12 col-xxl-12 col-sm-12">
							<div class="row form-group">
								<div class="col-xl-5 col-xxl-5 col-sm-5">
									<label class="control-level required" for="add-name">Student Full Name
									</label>
								</div>
								<div class="col-xl-7 col-xxl-7 col-sm-7">
									<input type="text" name="name" placeholder="John Doe" class="form-control" id="add-name" required  autocomplete="off">
                                    @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
							</div>
                            <div class="row form-group">
                                <div class="col-xl-5 col-xxl-5 col-sm-5">
                                    <label class="control-level required" for="add-name">Student Image
                                    </label>
                                </div>
                                <div class="col-xl-7 col-xxl-7 col-sm-7">
                                    <input type="file" name="image"  class="form-control" id="add-name" required  autocomplete="off">
                                    @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

						</div>

						</div><!-- 12raw started -->
					</div>
				</div>
			</div>
		<div class="col-xl-12 col-xxl-12 col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="row"><!-- 12 raw started -->
					<div class="col-xl-12 col-xxl-12  col-sm-12">
						<div class="row form-group" style="background-color: #3695EB;">
							<div style="text-align: center;margin: 0 auto; ">
								<h4 style="color: white;">Educational Qualification <br><span class="small">শিক্ষাগত যোগ্যতা </span> </h4>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="row form-group">
							<table class="table table-bordered" id="table_field"><!--table starts-->
							<tr class="text-center" >
								<th>Subject</th>
								<th>Number</th>
								<th><button type="button" name="add" id="add" class="btn btn-primary">ADD</button></th>
							</tr>
                                <tr>

                                </tr>
							</table><!--table finish-->
						</div>
					</div>

					<div class="col-xl-12 col-xxl-12  col-sm-12">
						<div class="row form-group" style="">
							<div style="text-align: center;margin: 0 auto; ">
                                         <input class="btn btn-primary btn-block center" type="submit" name="save" id="save" value="Save & Next">
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




</div>
</form>
</div>
@endsection
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

{{--script fo cahnging the addresses--}}

<script>
	window.onload = function() {
		$("#add").trigger('click');
	};
    function selectDegree(id){
        var suffix = id.match(/\d+/);
        var degree = $("#"+id).val();

        var opt = '';
        var sub = $("#subject"+suffix);
        if(degree == 'Diploma Engg.'){
            opt += ' <select id="subject'+suffix+'" name="subject[]" class="form-control" > ' +
                '<option value="Electrical & Electronics">Electrical & Electronics</option>' +
                '<option value="Electronics">Electronics</option>' +
                '<option value="Electrical Technology">Electrical Technology</option>' +
                '<option value="Refrigeration">Refrigeration</option>' +
                '<option value="Air conditioning">Air conditioning</option>' +
                '<option value="Automobile">Automobile</option>' +
                '<option value="Computer">Computer</option>' +
                '<option value="Mechanical">Mechanical</option>' +
                '<option value="Civil">Civil</option>' +
                '<option value="Power">Power</option>' +
                '</select>';
            $("#other"+suffix).html(opt);
        }else if(degree == 'B.Sc. Engg.' || degree == 'M.Sc. Engg.'){
            opt += '<select id="subject'+suffix+'" name="subject[]" class="form-control" autocomplete="off"> ' +
                '<option value="Electrical & Electronics">Electrical & Electronics</option>' +
                '<option value="Electrical">Electrical</option>' +
                '<option value="Marine">Marine</option>' +
                '<option value="Mechanical">Mechanical</option>' +
                '<option value="Naval Architecture">Naval Architecture</option>' +
                '<option value="Computer">Computer</option>' +
                '<option value="Civil">Civil</option>' +
                '<option value="Metallurgy">Metallurgy</option>' +
                '<option value="Chemical">Chemical</option>' +
                '<option value="Agriculture">Agriculture</option>' +
                '</select>';
            $("#other"+suffix).html(opt);
        }else if(degree == 'SSC' || degree == 'HSC'){
            opt += '<select id="subject'+suffix+'" name="subject[]" class="form-control" autocomplete="off"> ' +
                '<option value="Science">Science</option>' +
                '<option value="Commerce">Commerce</option>' +
                '<option value="Humanities">Humanities</option>' +
                '</select>';
            $("#other"+suffix).html(opt);
        }
        // else if(degree == 'Others'){
        //     $("#other"+suffix).html('<input type="text" class="form-control" id="subject'+suffix+'" name="subject[]" placeholder="" required>');
        // }

    }

    $(document).ready(function(){

	{{--var fees = {{ json_encode($application_classes) }};--}}
        {{--   var  fees = {!! json_encode($application_classes) !!};--}}

        // $("#application_class").change(function(){
        //     console.log(fees);
        //     var app_class =  $(this).val();
        //     var len = fees.length;
        //     // alert(len);
        //     for (var i=0;i<len;i++){
        //         if (app_class == fees[i].application_class ){
        //             $("#licence_fee").val(fees[i].license_fee);
        //             $("#center_fee").val(fees[i].center_fee);
        //             break;
        //         }
        //     }
        //     // fees.forEach( fee=>{
        //     //
        //     //     if (app_class == fee.application_class ){
        //     //         console.log('matched');
        //     //
        //     //     }else{
        //     //         alert('not matched');
        //     //         console.log('not Matched');
        //     //     }
        //     // }
        //     // );
        // });


///application class Select starts
        $('#application_class').change(function () {
            var select_ac=$('#application_class option:selected').text();
            if(select_ac=='A'|| select_ac=='B' || select_ac=='AB'){
                document.getElementById("supervisor_licence_no").style.visibility = "visible";
            }else{
                document.getElementById("supervisor_licence_no").style.visibility = "hidden";
            }

        });

		$('#dob').change(function () {
			var start_date = $('#dob').val();

			var end_date = new Date();

			var start = new Date(start_date);
			var end = new Date(end_date);

			var diff = new Date(end - start)/1000/60/60/24;
			if (diff <=6574) {
             alert('Your Age is not Acceptable for This Application . Minimum Age Requirement for The Application is 18 Years ');
				$('#dob').val('');
			}

		});

// application class select finish

          function generatehtml(html,x) {
                html+= '<td><select id="degree'+x+'" name="subjects[]" class="form-control"><option value="1">Bangla</option><option value="2">English</option></select></td>';

                html+='<td><input type="number" class="form-control" id="equepment_no" name="marks[]" placeholder="" required></td>';
                html+= '<td><button type="button" id ="remove" class="btn btn-danger">REMOVE</button></td>';
                html+='</tr>';
                return html;
            };


            var x=1;

            var max=20;

            $("#add").click(function(){
            if(x<=max)
                var html= '<tr class="text-center">';
                var t = generatehtml(html,x);
            $("#table_field").append(t);
            x++;
            });
            $("#table_field").on('click','#remove',function(){
            $(this).closest('tr').remove();
            x--;
            });
        // $(document).on('change', '#degree', function(){
        //     var select_deg=$("#degree option:selected").text();
        //     alert(select_deg);
        // });
// $('#degree').change(function () {
// alert("dsdssd");
// });


            var p_job= '<tr class="text-center">';
                p_job+=  '<td><input type="text" class="form-control" id="producer_name" name="company[]" placeholder="" required></td>';
                p_job+=  '<td><input type="text" class="form-control" id="producer_name" name="designation[]" placeholder="" required></td>';
            p_job+=  '<td><input  type="date" class="form-control" id="start_date" name="start_date[]" placeholder="" required></td>';
            p_job+='<td><input type="date" class="form-control" id="end_date" name="end_date[]" placeholder="" required></td>';
            p_job+='<td><input style="margin-right: -10px" type="text" class="form-control" id="period" name="period[]" placeholder="" required></td>';
            p_job+='<td><input type="file" class="form-control" id="equepment_no" name="experience_certificate_copy[]" placeholder="" required></td>';
            p_job+= '<td><button type="button" id ="remove_p_job" class="btn btn-danger">REMOVE</button></td>';
            p_job+='</tr>';
            var max=20;
            var x=1;
            $("#previous_job_add").click(function(){
            if(x<=max)
            $("#previous_job").append(p_job);
            x++;


				$("#end_date").change(function () {
					var start_date = $("#start_date").val();

					var end_date = $('#end_date').val();

					var start = new Date(start_date);
					var end = new Date(end_date);

					var diff = new Date(end - start)/1000/60/60/24;

					var days = Math.round(diff);
					var year = days/30/12;
					var year = year.toFixed(1);

					$('#period').val(year +'(Y)');

				});




            });


            $("#previous_job").on('click','#remove_p_job',function(){
            $(this).closest('tr').remove();
            x--;
            });
            });
</script>


