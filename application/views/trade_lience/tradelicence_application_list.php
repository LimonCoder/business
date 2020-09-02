<?php ?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
	<div class="content">
		<!-- content HEADER -->
		<!-- ========================================================= -->
		<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="row">
					<div class="col-md-11 col-lg-11" style="margin-left: 43px;margin-top: 21px">
						<table id="applicent_list" class="table table-striped table-bordered" style="width:100%">
							<thead>
							<tr>
								<td style="font-size: 15px" width="5%">নং</td>
								<td style="font-size: 15px" width="10%">ছবি </td>
								<td style="font-size: 15px" width="10%">নাম</td>
								<td style="font-size: 15px" width="10%">ট্র্যাকিং নং</td>
								<td style="font-size: 15px"  width="15%">সনদ নং</td>
								<td style="font-size: 15px"  width="10%">ধরণ</td>
								<td style="font-size: 15px"  width="15%">জেনারেট তারিখ</td>
								<td style="font-size: 15px"  width="30%">সার্টিফিকেট</td>
								<?php
									if($this->session->userdata('is_status') != 3){ ?>
										<td style="font-size: 15px"  width="10%">Action</td>
								<?php	}
								?>



							</tr>
							</thead>
							<tbody id="applicent_body">

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Add session Modal -->







		<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
	</div>
	<!-- CONTENT -->
</div>
<script>




    // datatable plugin //
    $(document).ready(function() {
        $('#applicent_list').DataTable({

            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "Admin/trade_application_list_action",
                "type": "POST"
            }

        } );

        $(document).on('click', '.trade_delete', function(){
            var trackid = $(this).data('trackid');
            swal({
                title: "Are you sure?",
                text: "Are you want to delete it.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
							url: 'Admin/trade_applicent_delete',
							type: 'post',
							data:{id:trackid},
							dataType:'json',
							success:function (res) {
								if (res.status == "success"){
                                    swal("Success ! Your file has been deleted !", {
                                        icon: "success",
										buttons: false,
										timer:1500
                                    });
                                    $('#applicent_list').DataTable().ajax.reload();
								}
                            }
						});


                    }
                });
		});

    } );





</script>
