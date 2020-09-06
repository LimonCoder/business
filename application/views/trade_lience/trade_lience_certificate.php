<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<base href="http://localhost/durgapurnorthup/">
		
		<link rel="stylesheet" type="text/css" href="certificate_css/trade.css">
		<title>বাংলা ট্রেড লাইসেন্স সনদপত্র</title>
		<style type="text/css">
@media print {
    * {
        -webkit-print-color-adjust: exact;
    }
}
			  
			 .wrapper{
			 
			  position: relative;
			  background-size:70%;
			}
			 .wrapper{
					border: 13px solid transparent;
				    margin:0 auto;
					height:940px;
					position: relative;
					background-size:70%;
					width:785px;
					
					
			}

			#cert {
                height: 12in;
                width: 8.1in;
			    
			}
			@media print
			{  
				body{
					font-size: 12px !important;
				}
				.no-print, .no-print *
				{
					visibility:hidden;
				}
				.wrapper{
					border: 13px solid transparent;
				    margin:0 auto;
					height:940px;
					position: relative;
					background-size:70%;
					width:785px;
				
			}
			#cert {
            height: 12in;
            width: 8.1in;
			    
			}
				
				td.instruction{ position:relative;top:30px;}
				td.eweb	font{position:relative;top:15px; !important;}			
				td.dev font{position:relative;top:15px; padding-left:20px;}	
		        img.qrcode{position:relative;top:20px; width="100px" padding:0px !important;overflow:hidden;display:block;}
				.ppp{position:relative;top:25px; }
			}
			.cert-heading {
				text-align: center;
				font-size: 21px;
				font-weight: bold;
				width: 165px;
				height: 27px;
				overflow: hidden;
				background: white;
				letter-spacing: 1px;
				margin: 0px auto;
				border: 1px solid black;
				box-shadow: -1px 2px black;
				border-radius: 15px;
				-webkit-border-radius: 19px;
				-moz-border-radius: 15px;
				margin-top: -38px;
				line-height: 27px;
			}

			
		
		</style>
	</head>
<body style="font-family: SutonnyOMJ ">
		<div id="main" style="margin-right:10px;">
			<div id="">
				
				
		<div class="wrapper jolchap">
				<div id="cert">
				<table style="border-collapse:collapse;margin:15px auto 10px;" width="96%" height="126px" cellspacing="0" cellpadding="0" border="0px">
						
						<tbody><tr>
							<td style="width: 18%; text-align:left;"><img src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/112017/untitled-1_42.png?6_tz3joOQzrqzf.ED6sIvjE07xxmdSRF&itok=x93gxbsF" width="70px" height="70px"> </td>
							<td style="text-align:center;position:relative;top:-20px;right:-24px;"><font style="font-family: SutonnyOMJ; font-size:30px; font-weight:bold; color:#000000;margin-left: -38px;">ক্রিয়েটিভ কমন্স অ্যাট্রিবিউশন</font>  <br>

																</td>
							<td style="width: 15%; text-align:center;">
							<img src="img/logo_elish.jpg" style="position:relative;" width="70px" height="70px">
						  </td>
						</tr>
					</tbody></table>
					
					<table style="border-collapse:collapse;margin:0px auto; margin-top: 10px;" width="99%" height="50px" cellspacing="0" cellpadding="0" border="0">
						<tbody><tr>
							<td align="center"><div class="cert-heading"> ব্যবসার অনুমতি পত্র</div></td>
							
						</tr>
					</tbody></table>
					
					<table style="float:left;border-collapse:collapse;table-layout:fixed; margin: 2px auto;" width="80%" height="60px" cellspacing="0" cellpadding="0" border="0"> 
						<tbody><tr height="28px"> 
							<td style="width: 60%"></td>

						</tr>
						<tr height="28px"> 
							<td style="width: 60%">
								<table style="border-collapse:collapse; table-layout:fixed; margin-left: 16px;" height="28px" cellspacing="0" cellpadding="0" border="1"> 
									<tbody><tr> 
										<td style="text-indent: 10px;font-size: 15px;font-family:solaimanLipi;padding: 5px">লাইসেন্স  নং :</td>
											<?php
												$sl_no = str_split($this->Website->key_set($personalinfo->sid));
												for ($i = 0; $i<count($sl_no);$i++): ?>
													<td style="text-align:center; font-weight:bold; font-size:20px; padding: 5px"><?= $this->Website->ceb($sl_no[$i]);?></td>
											 	<?php endfor;?>


																					
									</tr>
								</tbody></table>
							</td>

						</tr>
					</tbody></table>
					
					<table style="float:right; border-collapse:collapse;table-layout:fixed; margin: 2px auto;" width="20%" height="60px" cellspacing="0" cellpadding="0" border="0"> 
						<tbody><tr height="28px">

							<td align="right">
								<?php if(isset($personalinfo->image)):?>
								<img src="<?=base_url()?>/assets/img/<?=$personalinfo->image?>" style="position:relative;top:-25px;right:-23px;padding: 5px;box-sizing: border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;" width="80px" height="80px">
								<?php else: ?>
								<img src="<?=base_url()?>/assets/img/profile.png" style="position:relative;top:-25px;right:-23px;padding: 5px;box-sizing: border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;" width="80px" height="80px">
								<?php endif; ?>
							</td>

						</tr>
					
					</tbody></table>
					
					
					
					
					<table style="border-collapse:collapse;margin:0px auto;margin-top:10px;" width="96%" height="20px;" cellspacing="0" cellpadding="0" border="1px">
				         <tbody><tr>
							<td style="width:160px;font-size:80%; text-align:center; font-weight:normal;">ট্রেড লাইসেন্স পরিচিতি নং :</td>
							 <?php
							 	$s_no = str_split($money->sonod_no);
							 	for ($i=0;$i<count($s_no);$i++):?>
							 		<td style="text-align:center; font-weight:bold; font-size:20px;"><?= $this->Website->ceb($s_no[$i]); ?></td>
							 	<?php endfor;?>
							 </tr>
					</tbody></table>
					
					<table style="border-collapse:collapse;margin: 6px auto;table-layout:fixed; margin-top: 20px; " width="97%" height="55px" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr style="line-height: 35px;">
							<td style="width: 250px;text-indent: 20px;text-align:left; font-size:17px;">মালিকের নাম(ইংরেজিতে)</td>
							<td style="font-weight:bold; font-size:18px; text-align:left;">:&nbsp;<?= $personalinfo->name_en?></td>
						</tr>	
						<tr style="line-height: 35px;">
							<td style="width: 250px;text-indent: 20px;text-align:left; font-size:17px; margin-top: 10px">মালিকের নাম (বাংলায়)</td>
							<td style="font-weight:bold; font-size:18px; text-align:left;">:&nbsp;<?= $personalinfo->name_bn?></td>
						</tr>	
						<tr style="line-height: 35px;">
							<td style="width: 250px;text-indent: 20px;text-align:left; font-size:17px;">মোবাইল নম্বর </td>
							<td style="font-weight:bold; font-size:18px; text-align:left;">:&nbsp;<?= $this->Website->banglatk($personalinfo->number)?></td>
						</tr>
						<tr style="line-height: 35px;">
							<td style="width: 250px;text-indent: 20px;text-align:left; font-size:17px;">ব্যবসার নাম </td>
							<td style="font-weight:bold; font-size:18px; text-align:left;">:&nbsp;<?= $personalinfo->b_name?></td>
						</tr>	
					</tbody></table>



					<?php if (!empty($patners)):?>
					<table style="border-collapse:collapse;margin:10px auto;table-layout: fixed;height:75px;border:1px solid lightgray;" width="95%" height="100px" cellspacing="0" cellpadding="0" border="1px">
							<tbody><tr  style="line-height: 35px;">
								<th style="padding-left:10px;font-weight:bold;text-align:left;font-size:16px;">অংশীদার নাম(ইংরেজিতে)</th>
								<th style="padding-left:10px;font-weight:bold;text-align:left;font-size:16px;">অংশীদার নাম (বাংলায়)</th>
								<th style="padding-left:10px;font-weight:bold;text-align:left;font-size:16px;">অংশীদার মোবাইল নম্বর</th>
							</tr>
							<?php foreach ($patners as $row):?>
							<tr  style="line-height: 35px;">
								<td style="padding-left:10px;font-size:20px;font-weight:normal;text-align:left;"><?=$row->en_name?></td>
																
								<td style="padding-left:10px;font-size:20px;font-weight:normal;text-align:left;"><?=$row->bn_name?></td>
																
								<td style="padding-left:10px;font-size:20px;;font-weight:normal;text-align:left;"><?= $this->Website->banglatk($row->number) ?></td>
							</tr>
							<?php endforeach;?>
																
							
					</tbody></table>
					<?php endif;?>
					
					
										
					<table style="border-collapse:collapse; margin: 0px auto; " width="97%" height="230px" cellspacing="0" cellpadding="0" border="0">
						
												<tbody><tr style="height: 62px;">
							<td style="width:250px; text-indent: 20px;text-align:left; font-size:17px;line-height: 30px;" valign="top">ব্যবসা প্রতিষ্ঠানের ঠিকানা</td>
							<td style="font-weight:bold; font-size:18px; text-align:left;" valign="top">:&nbsp;<?=$personalinfo->village_name; ?>,&nbsp;<?=$personalinfo->upozila_name; ?>,<?=$personalinfo->district_name; ?>&nbsp;।							</td>
						</tr>
						<tr> 
							<td style="text-indent: 20px; text-align:left; font-size:17px;">ব্যবসার ধরন</td>
							<td style="font-weight:bold; font-size:18px; text-align:left;">:&nbsp;<?=$personalinfo->name; ?></td>
						</tr>
												<tr style="line-height: 35px;">
							<td style="text-indent: 20px;text-align:left; font-size:17px;">জেলা </td>
							<td style="font-weight:bold; font-size:18px; text-align:left;">:&nbsp;<?=$personalinfo->district_name; ?></td>
						</tr>
												<tr style="line-height: 35px;">
							<td style="text-indent: 20px;text-align:left; font-size:17px;">উপজেলা/থানা </td>
							<td style="font-weight:bold; font-size:18px; text-align:left;">: <?=$personalinfo->upozila_name; ?>&nbsp;</td>
						</tr>
												<tr style="line-height: 35px;">
							<td style="text-indent: 20px;text-align:left; font-size:17px;">গ্রাম/মহল্লা  </td>
							<td style="font-weight:bold; font-size:18px; text-align:left;">: <?=$personalinfo->village_name; ?>&nbsp;</td>
						</tr>

												
						<tr style="line-height: 35px;">
							<td style="text-indent: 20px;text-align:left; font-size:17px; ">ফি(বার্ষিক) </td>
							<td style="font-weight:bold; font-size:18px; text-align:left; ">:&nbsp;<?=$this->Website->banglatk($money->fee) ?> &nbsp; &nbsp;&nbsp;টাকা </td>
						</tr>
						
																		
						<!---->
						
												<tr style="line-height: 35px;">
							<td style="text-indent: 20px;text-align:left; font-size:17px;"><span id="vat"><?=$this->Website->banglatk($personalinfo->tax)?></span> % ভ্যাট বাবদ জমা
							</td><td style="font-weight:bold; font-size:18px; text-align:left;">:&nbsp;<?php $vat = $money->vat; echo $this->Website->banglatk($vat);?> টাকা </td>
						</tr>
						
												<tr style="line-height: 35px;">
							<td style="text-indent: 20px;text-align:left; font-size:17px;">সর্বমোট টাকা</td>
							<td style="font-weight:bold; font-size:18px; text-align:left;">:&nbsp;<?php $fee = $money->total_fee; echo $this->Website->banglatk($fee);?> &nbsp;টাকা </td>
						</tr>
						
					</tbody></table>
					<table style="table-layout:fixed; border-collapse:collapse;margin:10px auto; margin-top: 20px;" width="97%" height="60px" cellspacing="0" cellpadding="0" border="0px">
						<tbody><tr>
							<td style="padding-left:20px;font-size:16px;font-family:solaimanLipi;">উল্লেখিত প্রতিষ্ঠানের অনুকূলে প্রদত্ত লাইসেন্স ফি গ্রহন করিয়া ২০২০-২০২১ সালের জন্য আবশ্যকীয় বাণিজ্য চালাইয়া যাইবার অনুমতি দেওয়া হইল ।  ৩০-০৬-২০২১ সন পর্যন্ত এই লাইসেন্স বৈধ বলিয়া বিবেচিত হইবে এবং প্রতি বছর নবায়ন করিতে হইবে ।</td>
						</tr>	
					</tbody></table>
					<table style="bor	der-collapse:collapse;margin:0px auto;table-layout: fixed;" width="97%" height="195px" cellspacing="0" cellpadding="0" border="0">
						<tbody><tr>
							<td style="padding-left:20px;font-size:16px;">
								<div style="float:left;">
									<!-- <font style="position:relative;float:left;left:80px;border-top: 1px solid black;">সচিবের স্বাক্ষর</font> -->
								</div>
								<div style="display:inline;float:right">
									<font style="float:right;right:20px;position:relative;border-top: 1px solid black;">আবেদনকারীর স্বাক্ষর</font>
								</div>
							</td>
							<td style="width: 22%"></td>
						</tr>
							
					</tbody></table>
	
					
					
					
					
					

				</div>
				</div>
			</div>
		</div>
		
		<!--- for print----->
		<div id="print-full-page" class="no-print">
			<div class="print-certificate">
				<a target="" href="javaScript:window.print();" title="প্রিন্ট করুন">
					<img src="http://localhost/durgapurnorthup/library/print_big.png" alt="প্রিন্ট করুন">
				</a>
			</div>
		</div>
		<!--- end for print------>
		<script>
			function taka(){
				var x=document.getElementById("ftaka").textContent ;
				document.getElementById("btaka").textContent=x;
			}
			taka();
		</script>
		
	

</body>
</html>
