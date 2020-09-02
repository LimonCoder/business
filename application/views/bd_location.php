<?php ?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
	<div class="content">
		<!-- content HEADER -->
		<!-- ========================================================= -->
		<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

				<div class="row">
					<div class="col-md-12 col-lg-12">
						<button type="button" id="add_location" class="btn btn-primary pull-right" data-toggle="modal" data-target="#location_modal" ><i class="fa fa-plus-circle"></i> যোগ করুন</button>
						<div class="row">
							<div class="col-md-11 col-lg-11" style="margin-left: 60px">
								<table id="location_table" class="table table-striped table-bordered" style="width:100%;">
									<thead>
									<tr>
										<th width="20%">নং</th>
										<th width="25%">জেলা</th>
										<th width="25%">উপজেলা</th>
										<th width="10%">ট্যাক্স</th>
										<th  width="30%">action</th>
									</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- Add session Modal -->

				<!-- Modal -->
				<div class="modal fade" id="location_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form action="" method="post" onsubmit="event.preventDefault();  locationsubmit()"  id="location_form">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">নতুন লোকেশন যোগ করুন</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="row">
									<label class="col-md-4 text-right">জেলা</label>

									<select name="district" id="district" class="form-control col-md-6" onchange="hidetax(this.value);">
										<option value="">Select</option>
										<?php foreach ($district as $row):?>
										<option value="<?=$row->id?>"><?=$row->name?></option>
										<?php endforeach; ?>
									</select>

								</div><br>

								<div class="row">
									<label class="col-md-4 text-right">নাম(বাংলা)</label>

									<input name="name" id="name" class="form-control col-md-6" autocomplete="off" required >

									<span class="text-danger col-md-12" style="text-align: center;" id="name_error"></span>

								</div><br>
								<div class="row" id="taxrow">
									<label class="col-md-4 text-right">ট্যাক্স :</label>

									<input name="tax" id="tax" class="form-control col-md-6"  placeholder="পারসেন্ট আকারে লিখুন..." onkeypress="return num_test();" required  ><span style="margin-top: 7px;margin-left: 2px;font-size: 17px">%</span>

									<span class="text-danger col-md-12" style="text-align: center;" id="tax_error"></span>

								</div><br>


							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল</button>
								<button type="submit" class="btn btn-primary" >সাবমিট</button>
							</div>
							</form>
						</div>
					</div>
				</div>

				<!-- End session Modal -->

				<!-- Update session Modal -->
				<div class="modal fade" id="update_session_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="margin-top: -197px;">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Update Session</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								<form id="update_session_form" class="form-horizontal form_middle" action="" method="post">
									<div class="modal-body">

										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="session_name">Session Name <span class="required">*</span>
											</label>
											<div class="col-md-5 col-sm-5 col-xs-12">
												<input type="hidden" name="row_id" id="row_id" value="">
												<input type="number" id="update_session_name" name="update_session_name"  class="form-control">

												<!--											<input type="hidden" id="session_id" name="session_id"  class="form-control" value="">-->
												<span style="color:red;" id="update_session_name_error"></span>
											</div>

											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="is_current">Is Current
											</label>
											<div class="col-md-1 col-sm-1 col-xs-12">
												<input type="checkbox" id="update_is_current" name="update_is_current"  class="form-control">

											</div>
										</div>

									</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-warning" name="session_update" value="submit ">Update</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Update session Modal -->



		<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
	</div>
	<!-- CONTENT -->
</div>
<script>

	// datatable plugin //
    $(document).ready(function() {
        $('#location_table').DataTable({

            "processing": true,
            "serverSide": true,
			"ajax": {
                "url": "Admin/location_list",
                "type": "POST"
            }

        } );
    } );

    // check_number_function //
    function num_test() {
        return event.keyCode >= 48 && event.keyCode <=57;

    }

    function load_district() {
		$.ajax({
			url:'Admin/get_district',
			type:'post',
			success:function (res) {
				$("#district").html(res);
            }
		})
    }



    function hidetax(val){
		if (val == ""){
            $("#taxrow").show();
		}else{
            $("#taxrow").hide();
             $("#tax").removeAttr('required');

		}
	}

	function locationsubmit() {
	    var formdata = new FormData();

	    var district_name  = $("#district").val();
		var name = $("#name").val();
		var tax = $("#tax").val();


		if (district_name != ""){
		    formdata.append("district_id",district_name);
		    formdata.append("type","2");
		}else{
            formdata.append("type","1");
            formdata.append("district_id","");
		}

        formdata.append("name",name);
        formdata.append("tax",tax);

		$.ajax({
			url:'Admin/location_form_action',
			type:'post',
			data:formdata,
            processData: false,
            contentType: false,
			 dataType:'json',
			success:function (res) {
				if (res.key){

                    $("#location_modal").modal('hide');
                    $('#location_form')[0].reset();
                    $("#taxrow").show();
                    $("#tax").attr("required", true);
                    $('#location_table').DataTable().ajax.reload();

                    swal({
                        title: "Good job!",
                        text: "You clicked the button!",
                        icon: "success",
                        buttons: false,
						timer:1700
                    });



				}
                load_district();


            }
		})






    }

</script>

