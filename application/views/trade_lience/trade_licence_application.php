<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-5">
        <h1 class="h3 mb-0" style=" color: green; text-align: center">ট্রেড লাইসেন্স আবেদন</h1>
        <img src="assets/img/profile.png" id="image_preview" style="position: relative; left: 30%"  alt="" width="120" height="120">


    </div>

    <!-- Content Row -->
    <form  action="" id="trade_application" data-parsley-validate="" method="post" enctype="multipart/form-data" >
        <div class="row m-3">

            <div class="col-sm-12">
                <div class="row form-group">
                    <label for="owner_name_en" class="col-sm-3 control-label">মালিকের নাম(ইংরেজিতে)<span style="color: red">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="owner_name_en" id="owner_name_en" value="" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-error-message="মালিকের নাম দিন ইংরেজিতে...."   class="form-control "/>
                        <span class="error_owner_name_en" style="color: red"></span>
                    </div>

                    <label for="owner_name_bn" class="col-sm-3 control-label">মালিকের নাম (বাংলায়)
                        <span style="color: red">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="owner_name_bn" id="owner_name_bn" value="" required  data-parsley-trigger="keyup" data-parsley-error-message="মালিকের নাম দিন বাংলায়...."  class="form-control"/>
                        <span class="error_owner_name_bn" style="color: red"></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row form-group" >
                    <label for="owner_number" class="col-sm-3 control-label">প্রতিষ্ঠানের মালিকানার ধরণ
                        <span style="color: red">*</span></label>
                    <div class="col-sm-3 " >
                        <select name="type_of_organization" id="type_of_organization"
                                class="form-control "
                                selected="selected" data-parsley-required data-parsley-error-message="প্রতিষ্ঠানের মালিকানার ধরণ চিহ্নিত করুন..." onchange="check_orga_type(this.value)">
                            <option value="" selected=&quot;selected&quot;>	চিহ্নিত করুন</option>
                            <?php foreach ($business_type as $row):?>
                            <option value="<?=$row->id?>" ><?=$row->name?></option>
                            <?php endforeach; ?>

                        </select>

                    </div>
                    <label for="" class="col-sm-3 control-label">মোবাইল নম্বর
                    </label></label>
                <div class="col-sm-3 ">
                    <input type="text" name="owner_number" id="owner_number" value="" onkeypress="return num_test();" data-parsley-error-message="মোবাইল নম্বর চিহ্নিত করুন...." class="form-control"/>

                </div>

            </div>
        </div>

        </div>

    <ul class="nav nav-tabs" id="tab-append" role="tablist" style="display: none">

        <li class="nav-item owner-item-link">
            <a class="nav-link active" id="owner-tab-link-0"
               data-toggle="tab" href="#owner-tab-0" role="tab"
               aria-controls="owner-0">অংশীদার তথ্য:</a>
        </li>

        <li class="nav-item" id="add-btn">
            <button type="button" value="0" id="owner_plus_btn" class="btn btn-primary"
                    style=><i
                              class="fa fa-plus"></i></button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent" style="display: none">
        <div class="tab-pane show active fade" role="tabpanel"
             id="owner-tab-0">
            <div class="card card-info" id="partner_card">
                <div class="single" style="background: #f0f0f0;margin: 12px 0px;">
                    <div class="card-heading p-2">
                        <h4 class="card-title text-center" id="error-0" >অংশীদার তথ্য : <span>১</span></h4>
                    </div>
                    <div class="card-body ">
                        <div class="col-sm-12">
                            <div class="row  form-group">
                                <label for="patner_name_en" class="col-sm-2 control-label">অংশীদার নাম(ইংরেজিতে)</label>
                                </label>
                            <div class="col-sm-2">
                                <input type="text" name="patner_name_en[]" id="patner_name_en" value="" class="form-control"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"  data-parsley-error-message="অংশীদার নাম দিন ইংরেজিতে..." />


                            </div>
                            <label for="patner_name_bn" class="col-sm-2 control-label">অংশীদার নাম (বাংলায়)
                                <span style="color: red">*</span></label>
                            <div class="col-sm-2">
                                <input type="text" name="patner_name_bn[]" id="patner_name_bn" value="" class="form-control" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"   data-parsley-error-message="অংশীদার নাম দিন বাংলায়..."  />
                            </div>
                            <label for="patner_mobile_number" class="col-sm-2 control-label">অংশীদার মোবাইল নম্বর
                                <span style="color: red">*</span></label>
                            <div class="col-sm-2">
                                <input type="text" name="patner_mobile_number[]" id="patner_mobile_number" value=""  class="form-control" data-parsley-type="digits" data-parsley-trigger="keyup" data-parsley-error-message="মোবাইল নম্বর দিন ইংরেজিতে...."  />
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row m-3">

    <div class="col-sm-12">
        <div class="row form-group">
            <label for="business_name" class="col-sm-3 control-label">ব্যবসার নাম :<span style="color: red">*</span></label>
            <div class="col-sm-3">
                <input type="text" name="business_name" id="business_name" value="" class="form-control " required data-parsley-trigger="keyup" data-parsley-error-message="ব্যবসার নাম দিন বাংলায়..."/>


            </div>
            <label for="district_name" class="col-sm-3 control-label">জেলা
                <span style="color: red">*</span></label>
            <div class="col-sm-3">
                <select name="district_name" id="district_name" class="form-control " selected="selected" onchange="get_sub_district(this.value)" required  data-parsley-trigger="keyup" data-parsley-error-message="জেলা চিহ্নিত করুন...">
                    <option value="">চিহ্নিত করুন</option>
                    <?php foreach ($district as $row):?>
                    <option value="<?=$row->id?>"><?=$row->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="row form-group">
            <label for="sub_district_name" class="col-sm-3 control-label">উপজেলা/থানা
                <span style="color: red">*</span></label>
            <div class="col-sm-3">
                <select name="sub_district_name" id="sub_district_name" class="form-control " selected="selected" required  data-parsley-trigger="keyup" data-parsley-error-message="উপজেলা/থানা চিহ্নিত করুন...">
                    <option value="" >
                        চিহ্নিত করুন</option>

                </select>
            </div>
            <label for="village_name" class="col-sm-3 control-label">গ্রাম/মহল্লা
            </label>
            <div class="col-sm-3">
                <input type="text" name="village_name" id="village_name" value="" class="form-control"/>
            </div>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="row form-group">
            <label for="owner_signature" class="col-sm-3 control-label">টিআইএন নম্বর
                <span style="color: red">*</span></label>
            <div class="col-sm-3">
                <input type="text" name="owner_no" id="owner_no" value="<?=$trans_id?>" onkeypress="return num_test()" class="form-control" readonly/>
            </div>
            <label for="tin_no" class="col-sm-3 control-label">টাকা :
                <span style="color: red">*</span></label>
            <div class="col-sm-3">
                <input type="text" name="tin_no" id="tin_no" onkeypress="return num_test();" required  data-parsley-trigger="keyup" value="" placeholder="" data-parsley-error-message="টাকার অঙ্ক দিন ইংরেজিতে...." class="form-control"/>
            </div>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="row form-group">
            <label for="tin_photo" class="col-sm-3 control-label">আবেদনকারীর ছবি
            </label>
            <div class="col-sm-3">
                <input type="file" name="tin_photo" id="tin_photo"  accept="image/*"  class="form-control"/>
            </div>
            <label for="owner_signature" class="col-sm-3 control-label">Payment Type :
            </label>
            <div class="col-sm-3">
                <select name="account_type" id="account_type" class="form-control " selected="selected"  required  data-parsley-trigger="keyup" data-parsley-error-message="চিহ্নিত করুন...">
                    <option value="">চিহ্নিত করুন</option>
                    <?php foreach ($account_name as $row):?>
                    <option value="<?=$row->id?>"><?=$row->ac_name?></option>
                    <?php endforeach; ?>
                </select>
            </div>


        </div>
    </div>
    <div class="col-sm-12">
        <div class="row form-group">
            <label for="owner_signature" class="col-sm-3 control-label">আবেদনকারীর স্বাক্ষর
            </label>
            <div class="col-sm-3">
                <input type="file" name="appliciant_sig" id="appliciant_sig" value="" class="form-control"/>
            </div>


        </div>
    </div>


</div>
<div class="row" style="margin-bottom: 50px;">
    <div class="offset-6 col-sm-6 button-style">
        <!--			<input type="hidden" name="union_id" value="1376" id="union-id">-->
        <!--			<input type="hidden" value="19" id="app-type">-->
        <!--			<input type="hidden" name="fiscal_id" value="3">-->
        <!--			<input type="hidden" value="" name="pin" id="nagorik-pin">-->
        <button type="submit" class="btn btn-primary">দাখিল করুন</button>
        <img src="assets/img/lead.gif" alt="" id="loading_image" style="width: 47px; margin-left: 8px; display: none">
    </div>
</div>
</form>




</div>

<script>

    // function get_sub_district //
    function get_sub_district(val) {

        if (val !=""){
            $.ajax({
                url:'Admin/get_sub_district',
                type: 'post',
                data:{id:val},
                success:function (res) {
                    $("#sub_district_name").html(res);
                }
            })
        }else {
            $("#sub_district_name").html('<option value="">চিহ্নিত করুন</option>');
        }
    }

    // image preview function //
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#tin_photo").change(function() {
        readURL(this);
    });


    var numbers = {
        '0': '০',
        '1': '১',
        '2': '২',
        '3':' ৩',
        '4': '৪',
        '5': '৫',
        '6': '৬',
        '7': '৭',
        '8': '৮',
        '9': '৯'
    };

    // eng digit to bangla digit //
    function Engtoban(input) {
        var output = [];
        for (var i = 0; i < input.length; ++i) {
            if (numbers.hasOwnProperty(input[i])) {
                output.push(numbers[input[i]]);
            } else {
                output.push(input[i]);
            }
        }
        return output.join('');
    }


    var patner_count = 1;
    // busniess_patner_add_funciton //
    $("#owner_plus_btn").click(function () {
        var count = ++patner_count;
        var patner_name_en = $('#patner_name_en').parsley().isValid();
        var patner_name_bn = $('#patner_name_bn').parsley().isValid();
        var patner_number = $('#patner_mobile_number').parsley().isValid();
        if ((patner_name_en && patner_name_bn) && patner_number) {

            var card = $("#partner_card");
            var html = `<div class="single" style="background: #f0f0f0; margin: 12px 0px;">
<div class="card-heading p-2">
<h4 class="card-title text-center" id="error-0">অংশীদার তথ্য : <span>${ Engtoban(count.toString()) }</span></h4>
    </div>
<div class="card-body ">
<div class="col-sm-12">
<div class="row  form-group">
<label for="patner_name_en" class="col-sm-2 control-label">অংশীদার নাম(ইংরেজিতে)</label>
    </label>
<div class="col-sm-2">
<input type="text" name="patner_name_en[]" id="patner_name_en" value="" class="form-control" data-parsley-required  data-parsley-pattern="^[a-zA-Z]+$" data-parsley-error-message="অংশীদার নাম দিন ইংরেজিতে..." />


    </div>
<label for="patner_name_bn" class="col-sm-2 control-label">অংশীদার নাম (বাংলায়)
<span style="color: red">*</span></label>
<div class="col-sm-2">
<input type="text" name="patner_name_bn[]" id="patner_name_bn" value="" class="form-control"  />
    </div>
<label for="patner_mobile_number" class="col-sm-2 control-label">অংশীদার মোবাইল নম্বর
<span style="color: red">*</span></label>
<div class="col-sm-2">
<input type="text" name="patner_mobile_number[]" id="patner_mobile_number" value="" onkeypress="return num_test();"   class="form-control" data-parsley-required  data-parsley-error-message="মোবাইল নম্বর দিন ইংরেজিতে...." />
    </div>
    </div>
    </div>
    </div>
    </div>`;

            card.append(html);
            // $("#patner_name_en").attr("required", "true");
            // $("#patner_name_bn").attr("required", "true");
            // $("#patner_mobile_number").attr("required", "true");



            //
        }else if (!patner_name_en){
            alert("অংশীদার নাম দিন ইংরেজিতে...");
        }else if (!patner_name_bn){
            alert("অংশীদার নাম দিন বাংলায়...");
        }else if (!patner_number){
            alert("মোবাইল নম্বর দিন ইংরেজিতে....");
        }
    })


    function num_test() {
        return event.keyCode >= 48 && event.keyCode <=57;

    }

    function check_orga_type(val){

        if (val == 2){
            $("#tab-append").show();
            $("#myTabContent").show();
            $("#patner_name_en").attr("required", "true");
            $("#patner_mobile_number").attr("required", "true");
        }else{
            $("#tab-append").hide();
            $("#myTabContent").hide();
            $("#patner_name_en").val('');
            $("#patner_name_bn").val('');
            $("#patner_mobile_number").val('');
            $("#patner_name_en").removeAttr("required");
            $("#patner_mobile_number").removeAttr("required");
        }

    }
    // $('#trade_application').parsley().on('field:validated', function() {
    //     var ok = $('.parsley-error').length === 0;
    //     console.log(ok);
    // })
    //     .on('form:submit', function() {
    //         return false; // Don't submit form for this demo
    //     });

    $(document).ready(function () {
        $('#trade_application').parsley();
        $('#trade_application').on("submit",function (e) {
            e.preventDefault();

            if($('#trade_application').parsley().isValid()){
                var formdata = new FormData();
                var trades = $("#trade_application").serializeArray();
                var tinn_photo =  $("#tin_photo")[0].files[0];
                var owner_signature =  $("#appliciant_sig")[0].files[0];

                $(trades).each(function (index,value) {
                    formdata.append(value.name, value.value);
                });

                formdata.append("owner_photo", tinn_photo);
                formdata.append("owner_signature", owner_signature);

                $.ajax({
                    url:'Admin/trade_application_action',
                    type:'post',
                    data:formdata,
                    contentType:false,
                    processData:false,
                    dataType:'json',
                    beforeSend: function() {
                        $("#loading_image").show();
                    },
                    success:function (res) {
                        console.log(res);
                        $("#loading_image").hide();
                        if(res.status == "success"){
                            swal({
                                title: "সফল!",
                                text: "সফলভাবে আপনার আবেদনটি দাখিল হয়েছে.",
                                icon: "success",
                                button: false,
                                timer:1200
                            });
                            setTimeout(function () {
                                swal({
                                    title: "সনদ",
                                    text: "আপনি কি আপনার সনদটি বের করতে চান ?",
                                    buttons: true,
                                })
                                    .then((willDelete) => {
                                    if (willDelete) {
                                        window.open("Admin/certificate/"+res.trackid,"_self");
                                    }
                                });
                            },1200)
                        }

                    }
                })





            }else{
                // console.log("false");
            }

        })
    })



</script>



