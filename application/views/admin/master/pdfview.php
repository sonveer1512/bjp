<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BJP Data - <?=$booth[0]['name'] ?? ''; ?> <?=$booth[0]['file_id'] ?? ''; ?></title>

	<style>
		.page {
			border: 1px solid;
          	width: 770px;
          	height: 1110px;
			page-break-after: always;
		}

		.toptable {
			width: 100%;
		}

		.table {
			
			width: 100%;
		}

		.table tr th {
			font-size: 12px;
		}

		.table tr td {
			font-size: 12px;
		}

		.table2 {
			
			width: 100%;
			border-collapse: collapse;
		}

		.table2 tr th {
			border-right: 1px solid;
			border-bottom: 1px solid;
			font-size: 12px;
		}

		.table2 tr td {
			font-size: 12px;
          	padding: 6px 7px 3px 7px;
		}

		.halfcol {
			width: 50%;
		}

		.centerheading {
			text-align: center;
			width: 100%;
			margin-top: 100px;
		}

		h3 {
			margin: 5px;
			text-decoration: underline;
			text-transform: uppercase;
		}

		.table3 {
			width: 100%;
			border-collapse: collapse;
		}

		.table3 tr th {
			border-right: 1px solid;
			border-bottom: 1px solid;
			padding: 5px 5px;
			text-transform: uppercase;
			font-size: 12px;
		}

		.table3 tr td {
			text-align: center;
			padding: 0px;
			font-size: 12px;
		}


		.table4 {
			border-bottom: 1px solid;
			width: 100%;
			border-collapse: collapse;
		}

		.table4 tr th {
			border-right: 1px solid;
			border-bottom: 1px solid;
			padding: 10px 10px;
			font-size: 12px;
		}

		.table4 tr td {
			border-right: 1px solid;
			border-bottom: 1px solid;
			text-align: center;
			padding: 10px 5px;
			font-size: 12px;
		}

		tr,
		td {
			border: none;
		}

		input {
			border-bottom: 1px dashed;
			border-top: 0px;
			margin-left: 5px;
          	font-size: 10px;
          	width: 70px;
			border-left: 0px;
			border-right: 0px;
		}

		.border1 {
			border: 6px double;
		}

		.text-center {
			font-weight: 600;
			font-size: 22px
		}

		.col-md-12 span {
			font-weight: 600;
          	font-size: 12px;
		}
      
      .col-md-12 { margin: 5px 0px }
      
      .col-md-8 { width: 66%; }
      .col-md-4 { width: 33%; }
      .updata { font-weight: 500! important; border-bottom: 1px dashed; }
	</style>
</head>

<body>
  <div style="text-align:center; margin-bottom: 10px">
  	<a href="#" id="btn" onclick="printDiv()">Print</a>
  <div>  
	<!-- page 1 -->

	<div class="page" id="print_area">
		<table class="toptable">
			<tr>

				<table class="table">
					<tr>
						<td style="width: 25%; text-align:left"><img src="<?=base_url().'assets/Screenshot 2022-11-12 194115.png'; ?>" style="width: 45%; margin-left: 20px"></td>
						<td style="width: 50%; text-align:center" class="text-center fs-4"><span style="font-size: 24px">भारतीय जनता पार्टी, राजस्थान<br>-बूथ समिति प्रारूप-</span></td>
						<td style="width: 25%; text-align:right"><img src="<?= base_url() ?>assets/Screenshot 2022-11-12 194138.png" style="width: 35%; margin-right: 20px"></td>
					</tr>
				</table>
				<table class="table3">
					<tr>
						<td style="text-align:center; font-weight: 600; font-size: 18px">जिला: उदयपुर देहात </td>
						<td style="text-align:center; font-weight: 600; font-size: 18px">विधानसभा: <?=$vidhansabha[0]['name'] ?? '' ?> </td>
						<td style="text-align:center; font-weight: 600; font-size: 18px">मंडल: <?=$mandal[0]['name'] ?? '' ?> </td>
					</tr>
					<tr>
						<td colspan="3" style="text-align:center; font-weight: 600; font-size: 18px">बूथ क्रमांक: <?=$booth[0]['name'] ?? ''; ?></td>
					</tr>
				</table>

				<table class="table2">
					<?php
					for($i = 1; $i <= 21; $i++) {
						if ($i % 3 == 1) {
							echo '<tr>';
						} 
                  		if(!empty($items[$i-1]['name'])) {
                  		?>		

						<td style="width: 33%">
							<div class="row" style="padding-bottom: 5px; text-align: left; display: flex;">
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-12"><span>नाम:</span> <span class="updata"><?= $items[$i-1]['name']?></span></div>
										<div class="col-md-12"><span>दायित्व: <?= $items[$i-1]['liability'] ?></span> </div>
										<div class="col-md-12"><span>जन्म दिनांक:</span> <span class="updata"><?= $items[$i-1]['dob']?></span></div>
										<div class="col-md-12"><span>दूरभाष:</span> <span class="updata"><?= $items[$i-1]['contact_no']?></span></div>
									</div>
								</div>
								<div class="col-md-4">
									<?php if ($items[$i-1]['uploaded_from'] == 'front') { ?>
										<img class="rounded-start img-fluid  object-cover" src="https://axepertexhibits.com/bjploksabhachittorgarh/people/<?= $items[$i-1]['image'] ?>" style="width: 100%; height: 100px; object-fit: cover;">
									<?php } else { ?>
										<img class="rounded-start img-fluid  object-cover" src="<?= base_url() ?>assets/images/people_image/<?= $items[$i-1]['image'] ?>" style="width: 100%; height: 100px; object-fit: cover;">
									<?php } ?>
								</div>
							</div>
						</td>

					<?php }else{ ?>
                  
                  		<td style="width: 33%">
							<div class="row" style="padding-bottom: 5px;text-align: left; display: flex;">
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-12"><span>नाम:</span> <input type='text'></div>
										<div class="col-md-12"><span>दायित्व: <input type='text'></span> </div>
										<div class="col-md-12"><span>जन्म दिनांक:</span> <input type='text'> </div>
										<div class="col-md-12"><span>दूरभाष:</span> <input type='text'></div>
									</div>
								</div>
								<div class="col-md-4">
									<img class="rounded-start img-fluid  object-cover" src="<?=base_url().'assets/Screenshot 2022-11-12 193645.png'; ?>" style="width: 100%">
								</div>
							</div>
						</td>
                        
                    <?php }
                      if ($i % 3 == 0) {
							echo '</tr>';
					  }
					}  ?>
				</table>

				<table class="table2" style='margin-top: 80px'>
					<tr>
						<td style="width:25%; text-align:center; font-weight: 600; font-size: 18px">बूथ अध्यक्ष</td>
						<td style="width:25%; text-align:center; font-weight: 600; font-size: 18px">मंडल अध्यक्ष</td>
						<td style="width:25%; text-align:center; font-weight: 600; font-size: 18px">विधानसभा विस्तारक </td>
						<td style="width:25%; text-align:center; font-weight: 600; font-size: 18px">विधानसभा प्रवासी</td>
					</tr>
				</table>
			</tr>
		</table>
	</div>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      function printDiv()  {
        $("#btn").css('display','none');
     	window.print();
      }
      
      $("#btn").css('display','block');
    </script>