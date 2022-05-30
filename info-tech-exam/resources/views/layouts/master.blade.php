<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
 @include('layouts._head')
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->

    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
@include('layouts._header')
<!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            @include('layouts._sidebar')
        </div>


    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        @include('layouts._messages')
       @yield('content')

    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
@include('layouts._footer')
<!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->


@include('layouts._scripts')
{{--<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>--}}
<script>
    $(document).ready(function(){
        load_json_data('pre_division','0');
        load_json_data('per_division','0');

        function load_json_data(id, parent_id)
        {
            var html_code = '';
            $.getJSON("{{asset('/assets/file/bangladesh.json')}}", function(data){
                if (id=='pre_division' ||id=='per_division' ) {
                    html_code += '<option value="">Select Division</option>';
                }else if(id=='pre_district' || id=='per_district'){
                    html_code += '<option value="">Select District</option>';
                }else{
                    html_code += '<option value="">Select Upazila</option>';
                }

                $.each(data, function(key, value){
                    if(id == 'pre_division')
                    {
                        if(value.parent_id == '0')
                        {
                            html_code += '<option value="'+value.id+'">'+value.name+'</option>';
                        }
                    }
                    else
                    {
                        if(value.parent_id == parent_id)
                        {

                            html_code += '<option value="'+value.id+'">'+value.name+'</option>';
                        }
                    }
                });
                $('#'+id).html(html_code);
            });
        }

        $(document).on('change', '#pre_division', function(){
            var country_id = $(this).val();
            if(country_id != '')
            {
                load_json_data('pre_district', country_id);
            }
            else
            {
                $('#pre_district').html('<option value="">Select Division</option>');
                $('#pre_upozila').html('<option value="">Select District</option>');
            }
        });
        $(document).on('change', '#pre_district', function(){
            var state_id = $(this).val();
            if(state_id != '')
            {
                load_json_data('pre_upozila', state_id);
            }
            else
            {
                $('#pre_upozila').html('<option value="">Select Upazila</option>');
            }
        });

        $( "#pre_upozila" ).change(function() {
            var selected_pre_division=$("#pre_division option:selected").text();
            var selected_pre_district=$("#pre_district option:selected").text();
            var selected_pre_upazilla=$("#pre_upozila option:selected").text();
            $("#selected_pre_division").val(selected_pre_division);
            $("#selected_pre_district").val(selected_pre_district);
            $("#selected_pre_upazilla").val(selected_pre_upazilla);
        });
        $(document).on('change', '#per_division', function(){
            var country_id = $(this).val();
            if(country_id != '')
            {
                load_json_data('per_district', country_id);
            }
            else
            {
                $('#per_district').html('<option value="">Select Division</option>');
                $('#per_upozila').html('<option value="">Select District</option>');
            }
        });
        $(document).on('change', '#per_district', function(){
            var state_id = $(this).val();
            if(state_id != '')
            {
                load_json_data('per_upozila', state_id);
            }
            else
            {
                $('#per_upozila').html('<option value="">Select Upazila</option>');
            }
        });

          $( "#per_upozila" ).change(function() {
            var selected_per_division=$("#per_division option:selected").text();
            var selected_per_district=$("#per_district option:selected").text();
            var selected_per_upazilla=$("#per_upozila option:selected").text();
            $("#selected_per_division").val(selected_per_division);
            $("#selected_per_district").val(selected_per_district);
            $("#selected_per_upazilla").val(selected_per_upazilla);
        });

        $("#address_same").click(function(){
            if (this.checked == true){
                // alert(sel.options[sel.selectedIndex].text);
                var vil = $("#per_village").val();
                var post_office = $("#per_post_office").val();
                var road = $("#per_road").val();
                var divis = $("#per_division option:selected").text();
                var dist = $("#per_district option:selected").text();
                var upaz = $("#per_upozila option:selected").text();
                var postc = $("#per_post_code").val();
                var postOffice = $("#per_post_office").val();

                $("#pre_village").val(vil);
                $("#pre_post_office").val(post_office);
                $("#pre_road").val(road);
                $("#pre_division").html('<option value="'+divis+'">'+divis+'</option>');
                $("#pre_district").html('<option value="'+dist+'">'+dist+'</option>');
                $("#pre_upozila").html('<option value="'+upaz+'">'+upaz+'</option>');
                $("#pre_post_code").val(postc);
                $("#pre_post_office").val(postOffice);

                $("#selected_pre_division").val(divis);
                $("#selected_pre_district").val(dist);
                $("#selected_pre_upazilla").val(upaz);

            }else{
                $("#pre_village").val('');
                $("#pre_post_office").val('');
                $("#pre_road").val('');
                load_json_data('pre_division','0');
                $("#pre_district").html('<option value="">Select District</option>');
                $("#pre_upozila").html('<option value="">Select Upazila</option>');
                $("#pre_post_code").val('');
            }z
        });
    });


</script>


</body>

<!-- Mirrored from medico.dexignzone.com/admin/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Nov 2020 04:49:56 GMT -->
</html>
