<?php ?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
	<div class="content" style="font-family: SutonnyOMJ">
		<!-- content HEADER -->
		<!-- ========================================================= -->
		<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<button class="btn btn-success btn-block" style="font-size:25px;margin-bottom:10px;"> ট্রেড লাইসেন্স  সনদ গ্রহনকারীগণের তালিকা</button>
				</div>
			</div>
			<div class="row justify-content-center" style="margin-top: 21px;margin-left: 126px;margin-bottom: 35px">
				<div class="col-lg-2 col-sm-2 col-xs-2">
					হতে
					<input type="text" name="todate" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="todate" >
				</div>
				<div class="col-lg-2 col-sm-2 col-xs-2">
					পর্যন্ত
					<input type="text" name="fromdate" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="fromdate" >
				</div>
				<div class="col-lg-2 col-sm-2 col-xs-2 " style="margin-top:20px">
					<input type="button" value="Search" name='today'  onclick="search_report(todate.value, fromdate.value);" class="btn btn-info btn-sm" style="margin-top: 2px;padding: 7px 16px;" />
				</div>
			</div>

		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="row">
					<div class="col-md-11 col-lg-11" style="margin-left: 43px;margin-top: 21px">
						<table id="applicent_list" class="table table-striped table-bordered" style="width:100%">
							<thead>
							<tr>
								<td style="font-size: 20px" width="5%">নং</td>
								<td style="font-size: 20px" width="10%">ছবি </td>
								<td style="font-size: 20px" width="10%">নাম</td>
								<td style="font-size: 20px" width="10%">ট্র্যাকিং নং</td>
								<td style="font-size: 20px"  width="15%">সনদ নং</td>
								<td style="font-size: 20px"  width="10%">ধরণ</td>
								<td style="font-size: 20px"  width="15%">জেনারেট তারিখ</td>
								<td style="font-size: 20px"  width="30%">সার্টিফিকেট</td>
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

    $(function() {
        $("#todate").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#fromdate").datepicker({ dateFormat: 'yy-mm-dd' });
    });


    var current_date = new Date();
    var datesort = "";

    var today = current_date.getFullYear() + "-" + (current_date.getMonth() + 1) + "-" + current_date.getDate();

    var table, from_date = to_date = today;

    // datatable plugin //
    $(document).ready(function() {
          table =   $('#applicent_list').DataTable({
            "dom": 'lBfrtip',
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "Admin/trade_application_list_action",
                type: "POST",
				data:{from_date: from_date, to_date: to_date,datesorting:datesort}
            }

        } );

    } );

    // date to date searching
    function search_report(from_date, to_date){
        datesort = "select";
        $("#applicent_list").dataTable().fnSettings().ajax.data.from_date = from_date;
        $("#applicent_list").dataTable().fnSettings().ajax.data.to_date = to_date;
        $("#applicent_list").dataTable().fnSettings().ajax.data.datesorting = datesort;

        table.ajax.reload();
    }

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





</script>
