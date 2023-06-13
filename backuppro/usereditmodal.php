<?php
$str = explode('-', $content[0]['birthd']);
$str1 = explode('-', $content[0]['dateofmarriage']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BJP Vallabh Nagar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <style>
        #hidepanchayat1 {
            display: block;
        }

        #kurabadpanchayat1 {
            display: block;
        }

        #gram1 {
            display: block;
        }


        #hidepanchayat2 {
            display: none;
        }

        #kurabadpanchayat2 {
            display: none;
        }

        #gram2 {
            display: none;
        }

        #tashsilhide {
            display: none;
        }

        div.options>label>input {
            visibility: hidden;
        }

        div.options>label {
            display: block;
            margin: 0 0 0 -10px;
            padding: 0 0 20px 0;
            height: 20px;
            width: 150px;
        }

        div.options>label>img {
            display: inline-block;
            padding: 0px;
            height: 30px;
            width: 30px;
            background: none;
        }

        .options {
            display: flex;
        }

        div.options>label>input:checked+img {
            background-image: url(https://axepertexhibits.com/bjp-vallabhnagar/check-mark-png-45018.png);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 30px 30px;
        }

        label {
            font-weight: 700;
        }

        .backborder {
            border: 10px solid #19773c;
            background-color: #fdd49c;
            padding: 20px;
        }

        .table tr td {
            border: 0px;
        }

        .error {
            color: red;
        }

        .fnsize {
            font-size: 40px;
            font-weight: 550;
        }

        .fnsize1 {
            font-size: 30px;
        }

        #showfield {
            display: none;
        }

        #addh {
            display: none;
        }

        #voter {
            display: none;
        }

        .bgcolorgreen {
            background-color: #19773c;
            padding: 10px;
            width: 30%;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .bgcolordanger {
            background-color: red;
            padding: 10px;
            width: 30%;
            font-size: 16px;
            margin-bottom: 20px;
        }

        #hidefieldvivah {
            display: none;
        }

        #mohollahide {
            display: none;
        }

        /* The snackbar - position it at the bottom and in the middle of the screen */
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #4BB543;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            right: 30px;
            top: 20%;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                right: 0;
                opacity: 0;
            }

            to {
                right: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                right: 0;
                opacity: 0;
            }

            to {
                right: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                right: 30px;
                opacity: 1;
            }

            to {
                right: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                right: 30px;
                opacity: 1;
            }

            to {
                right: 0;
                opacity: 0;
            }
        }

        @media screen and (max-width: 600px) and (min-width: 320px) {
            .backborder {
                padding: 5px;
            }
        }

        input.plzselect {
            width: 50px;
        }
    </style>
</head>

<body>
    <div class="container  backborder">
        <table class="table border-0">
            <tbody>
                <tr style="text-align:center;">
                    <td><img src="<?= base_url(); ?>assets/images/14.png" style="width: 200px;"></td>
                </tr>
                <tr style="text-align:center;">
                    <td><span class="fnsize">भारतीय जनता पार्टी</span><br>
                        <span class="fnsize1"> वल्लभनगर</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="snackbar">Thanks for submitting your details.</div>
                            </div>
                        </div>
                        <form method="post" id="bannerModelSubmits1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="options">
                                            <?php
                                            foreach ($usereditdata as $value)
                                            //  print_r($value); exit();
                                            {
                                            ?>
                                                <label title="item2">
                                                    <input type="radio" name="simiti" value="<?= $value['id'] ?>" <?php if ($content[0]['panchayat'] == $value['id']) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> class="panchayatsimiti" onchange="myFunction(this.value)" placeholder="<?= $value['panchayat'] ?>">
                                                    <?= $value['panchayat']; ?>
                                                    <img />
                                                </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="mb-3 hiddenpanchayat" id="hidepanchayat2">
                                        <label class="pachayatsimitilabel">पंचायत समिति</label>

                                        <select class="form-control pachayatsimitidata" name="pachayatsimiti" id="panchyatsim" onchange="pachayatsimitidat(this.value)">

                                        </select>

                                    </div>
                                    <input type="hidden" name="id" id="id" value="<?= $content[0]['id']; ?>">

                                    <div class="mb-3 " id="kurabadpanchayat2">
                                        <label class="grampanchyatdatalabel"></label>
                                        <select class="form-control grampanchyatdata" onchange="grampanchyatdat(this.value)" id="panchyatsim">

                                        </select>
                                    </div>

                                    <div class="mb-3" id="gram2">
                                        <label>ग्राम</label>
                                        <select class="form-control gramdata" id="panchyatsim" name="gram">

                                        </select>
                                    </div>




                                    <div class="mb-3 hiddenpanchayat" id="hidepanchayat1">
                                        <label>पंचायत समिति</label>
                                        <select class="form-control" name="pachayatsimiti" id="panchyatsim">
                                            <?php foreach ($pachayatsimiti as $val6) { ?>
                                                <option value="<?= $val6['id'] ?>" <?php if ($content[0]['panchayatsimit'] == $val6['id']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $val6['pachayatsimiti'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3" id="kurabadpanchayat1">
                                        <label>ग्राम पंचायत</label>
                                        <select class="form-control" id="panchyatsim">
                                            <?php
                                            foreach ($grampanchyat6 as $val7) {
                                            ?>
                                                <option value="<?= $val7['id'] ?>" <?php if ($content[0]['gram_panchanyat'] == $val7['id']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $val7['gram_panchyat'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3" id="gram1">
                                        <label>ग्राम</label>
                                        <select class="form-control" id="panchyatsim" name="gram">
                                            <?php
                                            foreach ($gramp as $val8) {
                                            ?>
                                                <option value="<?= $val8['id'] ?>" <?php if ($content[0]['gram_panchanyat'] == $val8['id']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $val8['gramname'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="mb-3" id="mohollahide">
                                        <label>मोहल्ला</label>
                                        <input type="text" class="form-control" name="moholla">
                                    </div>
                                </div>
                                <div class="col-md-12" id="tashsilhide">
                                    <div class="mb-3">
                                        <label>तहसील</label>
                                        <input type="text" name="tashsil" value="<?= $content[0]['tashsil']; ?>" class="form-control" placeholder="तहसील">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>जिला</label>
                                        <input type="text" name="district" class="form-control" value="<?= $content[0]['district']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>पिन कोड</label>
                                        <input type="number" name="pincode" value="<?= $content[0]['pincode']; ?>" oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" class="form-control" id="onlynum" placeholder="पिनकोड">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>नाम</label>
                                        <input type="text" name="name" value="<?= $content[0]['name']; ?>" class="form-control" placeholder="नाम">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>पिता का नाम</label>
                                        <input type="text" name="f_name" value="<?= $content[0]['f_name']; ?>" class="form-control" placeholder="पिता का नाम">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>धर्म</label>
                                        <select name="dharm" class="form-select">
                                            <!-- <option hidden selected style="color:#ccc">धर्म</option> -->
                                            <option value="<?= $content[0]['dharm']; ?>">
                                                <?php $id = $content[0]['dharm'];
                                                $this->db->select('dharm');
                                                $this->db->from('dharm');
                                                $this->db->where('id', $id);
                                                $rows1 = $this->db->get()->row();
                                                echo $rows1->dharm;
                                                ?></option>
                                            <?php foreach ($dharmdata as $value) { ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['dharm'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>जाति</label>
                                        <input type="text" value="<?= $content[0]['caste']; ?>" name="caste" class="form-control" placeholder="जाति">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>मोबाइल न.</label>
                                        <div class="d-flex justify-content-center"><input type="number" value="<?= $content[0]['mobile']; ?>" name="mobile" id="mobile" class="moblie-no form-control" oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" placeholder="मोबाइल न."></div>
                                        <input type="checkbox" name="valuetransfer" id="checkwhatsapp" value="1"> आपका यह नंबर व्हाट्सएप पर है
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>व्हाट्सएप नंबर</label>
                                        <input type="number" value="<?= $content[0]['whtup']; ?>" name="whtup" oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" class="form-control" id="whtup" placeholder="व्हाट्सएप नंबर">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>पहचान प्रमाण</label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="verify" id="verify" <?php if ($content[0]['verify'] == 'आधार कार्ड न.') {
                                                                                                                    echo 'checked';
                                                                                                                } ?> value="आधार कार्ड न." class="verify" placeholder="आधार कार्ड न.ि">
                                        <label>आधार कार्ड न.</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="verify" id="verify1" class="verify" <?php if ($content[0]['verify'] == 'वोटर ID न.') {
                                                                                                            echo 'checked';
                                                                                                        } ?> value="वोटर ID न." placeholder="वोटर ID न.">
                                        <label>वोटर ID न.</label>
                                        <!--<select name="verify" id="verify" class="form-select mb-1">
                                            <option hidden selected value="">Select</option>
                                            <option value="aadharno">आधार कार्ड न.</option>
                                            <option value="voteridno">वोटर ID न.</option>
                                        </select>-->
                                        <div class="py-2">
                                            <input type="number" value="<?= $content[0]['aadharno'] ?>" name="aadharno" oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" id="addh" class="form-control" placeholder="कृपया अपना आधार कार्ड नंबर दर्ज करें">
                                            <input type="text" value="<?= $content[0]['voteridno'] ?>" name="voteridno" id="voter" oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" class="form-control" placeholder="कृपया अपना वोटर आईडी नंबर दर्ज करें">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="marriedstatus1" <?php if ($content[0]['marriedstatus'] == 'हां') {
                                                                                                            echo 'checked';
                                                                                                        } ?> name="marriedstatus" value="हां" class="marriedstatus" placeholder="पंचायत समिति">
                                        <label>हां</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="marriedstatus" id="marriedstatus" <?php if ($content[0]['marriedstatus'] == 'नहीं') {
                                                                                                            echo 'checked';
                                                                                                        } ?> class="marriedstatus" value="नहीं" placeholder="नगर पालिक">
                                        <label>नहीं </label>
                                        
                                        <div id="hidefieldvivah" class="py-3">
                                            <label>विवाह की तिथि</label>
                                            <div class="row">
                                                <div class="col-md-4 col-4">
                                                    <label>दिन</label>
                                                    <select name="day1" class="form-select">
                                                        <?php
                                                        for ($xm = 1; $xm <= 31; $xm++) {
                                                        ?>
                                                            <option value="<?= $xm; ?>" <?php if (!empty($str1[1])) {
                                                                                            if ($xm == $str1[0]) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        } ?>>
                                                                <?= $xm ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <label>माह</label>
                                                    <select name="month1" class="form-select">
                                                        <?php
                                                        for ($im = 0; $im <= 11; $im++) {
                                                            $month = date('M', strtotime("first day of $im month"));
                                                        ?>

                                                            <option value="<?= $month; ?>" <?php if (!empty($str1[1])) {
                                                                                                if ($month == $str1[1]) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } ?>><?php if (!empty($str1[1])) {
                                                                                                                                                                            echo $month;
                                                                                                                                                                        } else {
                                                                                                                                                                            echo '';
                                                                                                                                                                        } ?>
                                                                <?= $month ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <label>वर्ष</label>
                                                    <select name="year1" class="form-select">
                                                        <?php
                                                        for ($xm = 2022; $xm >= 1980; $xm--) {
                                                        ?>
                                                            <option value="<?= $xm; ?>" <?php if (!empty($str1[2])) {
                                                                                            if ($xm == $str1[2]) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        } ?>>
                                                                <?= $xm ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>जन्म तिथि</label>
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <label>दिन</label>
                                                <select name="day" class="form-select">
                                                    <?php
                                                    for ($x = 1; $x <= 31; $x++) {
                                                    ?>
                                                        <option value="<?= $x; ?>" <?php if (!empty($str[0])) {
                                                                                        if ($x == $str[0]) {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    } ?>>
                                                            <?= $x ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <label>माह</label>
                                                <select name="month" class="form-select">
                                                    <?php
                                                    for ($i = 0; $i <= 11; $i++) {
                                                        $month = date('M', strtotime("first day of $i month"));
                                                    ?>
                                                        <option value="<?= $month; ?>" <?php if (!empty($str1[2])) {
                                                                                            if ($month == $str[1]) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        } ?>>
                                                            <?= $month ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <label>वर्ष</label>
                                                <select name="year" class="form-select">
                                                    <?php
                                                    for ($x = 2022; $x >= 1980; $x--) {
                                                    ?>
                                                        <option value="<?= $x; ?>" <?php if (!empty($str1[2])) {
                                                                                        if ($x == $str[2]) {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    }  ?>>
                                                            <?= $x ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <input type="date" name="birthd" class="form-control" placeholder="जन्म तिथि">-->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>सदस्यता वर्ष</label>
                                        <select name="sadasha_varsh" class="form-select">
                                            <?php
                                            for ($x = 2022; $x >= 1980; $x--) {
                                            ?>
                                                <option value="<?= $x; ?>" <?php if ($x == $content[0]['sadasha_varsh']) {
                                                                                echo 'selected';
                                                                            } ?>>
                                                    <?= $x ?>
                                                </option>
                                                <!-- <input type="text" name="sadasha_varsh" class="form-control" placeholder="सदस्यता वर्ष"> -->
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>वर्तमान में पार्टी में पद</label>
                                        <input type="text" name="vartaman_pad" value="<?= $content[0]['vartaman_pad']; ?>" class="form-control" placeholder="वर्तमन में पार्टी में पद">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>पूर्व में पार्टी में पद</label>
                                        <input type="text" name="purv_pad" value="<?= $content[0]['purv_pad']; ?>" class="form-control" placeholder="पूर्व में पार्टी में पद">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>वर्तमान में आप वल्लभ नगर विधान सभा में रहते है?</label>
                                        <select name="vidhan_sabha" id="vidh" class="form-select">
                                            <!-- <option hidden selected value="">Select</option> -->
                                            <option value="हां" <?php if ($content[0]['vidhan_sabha'] == 'हां') {
                                                                    echo 'selected';
                                                                } ?>>हां</option>
                                            <option value="नहीं" <?php if ($content[0]['vidhan_sabha'] == 'नहीं') {
                                                                        echo 'selected';
                                                                    } ?>>नहीं</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="showfield">
                                    <div class="mb-3">
                                        <label>अगर नहीं, तो किस शहर में रहते है?</label>
                                        <select id="disabledSelect" name="cities_id" class="form-select">
                                            <?php
                                            foreach ($citiesdata as $value78) {
                                                // $query = " SELECT * FROM cities ORDER BY name ASC; ";
                                                // $res = mysqli_query($con, $query);
                                                // while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <option value="<?= $value78['name'] ?>" <?php if ($content[0]['cities_id'] == $value78['name']) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                                    <?= $value78['name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success text-light " id="btnsave" name="btnsave">Submit</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#vidh').change(function() {
                if ($('#vidh').val() == 'नहीं') {
                    $('#showfield').css("display", "block");
                }
            })
        })
        $(document).ready(function() {
            $('#verify').change(function() {
                if ($('#verify').val() == 'आधार कार्ड न.') {
                    $('#voter').removeAttr("required", "false");
                    $('#addh').attr("required", "true");
                    $('#addh').css("display", "block");
                    $('#voter').css("display", "none");
                }
            })
            $('#verify1').change(function() {
                if ($('#verify1').val() == 'वोटर ID न.') {
                    $('#addh').removeAttr("required");
                    $('#voter').attr("required", "true");
                    $('#voter').css("display", "block");
                    $('#addh').css("display", "none");
                }
            })
        })
        // $(document).ready(function() {

        //     $("input[name='marriedstatus']:checked").change(function() {
        //         alert($("input[name='marriedstatus']:checked").val());
        //         if ($("input[name='marriedstatus']:checked").val() == 'हां') {
        //             $('#hidefieldvivah').attr("required", "true");
        //             $('#hidefieldvivah').css("display", "block");
        //         } else {
        //             $('#hidefieldvivah').removeAttr("required");
        //             $('#hidefieldvivah').css("display", "none");
        //         }
        //     })

        //     $('.marriedstatus').change(function() {
        //         if ($('#marriedstatus2').val() == 'नहीं') {
        //             $('#hidefieldvivah').css("display", "none");
        //         } else if ($('#marriedstatus1').val() == 'हां') {
        //             $('#hidefieldvivah').css("display", "block");
        //         }
        //     })
        // })
    </script>
    <script>
        // $.validator.setDefaults({
        //     submitHandler: function() {
        //         alert("submitted!");
        //     }
        // });
        $(document).ready(function() {
            $("#signupForm").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    f_name: {
                        required: true,
                    },
                    caste: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                        digits: true,
                        maxlength: 10,
                        minlength: 10,
                    },
                    ward_no: {
                        required: true,
                    },
                    verify: {
                        required: true,
                    },
                    village: {
                        required: true,
                    },
                    gram_panchanyat: {
                        required: true,
                    },
                    panchayat: {
                        required: true,
                    },
                    tashsil: {
                        required: true,
                    },
                    district: {
                        required: true,
                    },
                    pincode: {
                        required: true,
                    },
                    cities_id: {
                        required: true,
                    },
                    dharm: {
                        required: true,
                    }
                },
                // aadharno
                // voteridno
                messages: {
                    name: "Please enter your name",
                    f_name: "Please enter your father_name",
                    caste: "Please enter your caste",
                    mobile: {
                        required: "Please enter your mobile",
                        maxlength: "Your mobile no must consist of at least 10 digits",
                        minlength: "Your  mobile no must conFFsist of at least 10 digits",
                        digits: "Please enter only numbers"
                    },
                    ward_no: "Please enter your ward number",
                    verify: "Please enter your id proof",
                    village: "Please enter your village",
                    gram_panchanyat: "Please enter your Gram panchyat",
                    panchayat: "Please enter your panchyat",
                    tashsil: "Please enter your tehsli",
                    district: "Please enter your district",
                    pincode: {
                        required: "Please enter your pincode",
                        digits: "Please enter only numbers",
                    },
                    sadasha_varsh: "Please enter your joining date",
                    cities_id: "Please enter your city",
                    dharm: "Please enter your religion"
                }
            });
        });
        setTimeout(function() {
            $('#colorclass').fadeOut('slow');
        }, 2000);
    </script>
    <?php if (isset($msg)) { ?>
        <script>
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        </script>
    <?php } ?>
    <script>
        function allgram() {
            $('#hidetehsil').css("display", "block");
            $('#tehsilhide').css("display", "block");
            $("#tehsilhide").val(sessionStorage.getItem('tehsil'));
        }
    </script>
    <script>
        if ($("input[name='simiti']:checked").val() == "1") {
            $("#hidenagarpalika").css("display", "none");
            $("#hidekanodnagarpalka").css("display", "none");
            $("#warddetailhide").css("display", "none");
            $("#hidepanchayat").css("display", "block");
            $("#kurabadpanchayat").css("display", "block");
            $("#gram").css("display", "block");
        } else if ($("input[name='simiti']:checked").val() == "2") {
            $("#hidenagarpalika").css("display", "block");
            $("#hidekanodnagarpalka").css("display", "block");
            $("#warddetailhide").css("display", "block");
            $("#hidepanchayat").css("display", "none");
            $("#kurabadpanchayat").css("display", "none");
            $("#gram").css("display", "none");
        } else {
            $("#hidepanchayat").css("display", "none");
            $("#kurabadpanchayat").css("display", "none");
            $("#gram").css("display", "none");
            $("#hidenagarpalika").css("display", "none");
            $("#hidekanodnagarpalka").css("display", "none");
            $("#warddetailhide").css("display", "none");
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#simiti').click(function() {
                alert("ok");
                $("#hidepanchayat").hide();
            });
        });


        $('#checkwhatsapp').change(function() {
            if ($("#checkwhatsapp:checked").val() == '1') {
                $("#whtup").val($("#mobile").val());
            } else {
                $("#whtup").val('');
            }
        })
    </script>
    <script>
        function myFunction(val) {
            $('#hidepanchayat1').css('display', 'none');
            $('#kurabadpanchayat1').css('display', 'none');
            $('#gram1').css('display', 'none');
            $('#hidepanchayat2').css('display', 'block');

            if (val == 1) {
                $('.pachayatsimitilabel').html('पंचायत समिति');
            } else {
                $('.pachayatsimitilabel').html('नगर पालिका');
            }

            if (val != '') {

                $.ajax({
                    url: '<?= base_url() ?>Userdata/simitfetch/' + val,
                    success: function(res) {

                        $(".pachayatsimitidata").html(res.output);

                    },
                    error: function() {
                        alert("Fail")
                    }
                });
            }

            if (val == 1) {

                $('#hidepanchayat').css("display", "block");
                $('#kurabadpanchayat').css("display", "block");
                $('#gram').css("display", "block");
                $('#tashsilhide').css("display", "block");


                $('#hidekanodnagarpalka').css("display", "none");
                $('#mohollahide').css("display", "none");
                $('#hidenagarpalika').css("display", "none");

            } else if (val == 2) {
                //    $('#hidepanchayat').css("display","none");
                //    $('#kurabadpanchayat').css("display","none");
                $('#gram').css("display", "none");
                $('#tashsilhide').css("display", "none");


                $('#hidekanodnagarpalka').css("display", "block");
                $('#mohollahide').css("display", "block");
                $('#hidenagarpalika').css("display", "block");

            }


        }



        $('#checkwhatsapp').change(function() {
            if ($("#checkwhatsapp:checked").val() == '1') {
                $("#whtup").val($("#mobile").val());
            } else {
                $("#whtup").val('');
            }
        })
    </script>
    <script>
        function grampanchyatdat(val2) {
            $('#gram2').css('display', 'block');
            if (val2 >= 123) {
                $('#gram2').css('display', 'none');
            }



            if (val2 != '') {

                $.ajax({
                    url: '<?= base_url() ?>Userdata/gramdata/' + val2,
                    success: function(res) {

                        $(".gramdata").html(res.output);

                    },
                    error: function() {
                        alert("Fail")
                    }
                });
            }
        }
    </script>
    <script>
        function pachayatsimitidat(val1) {
            $('#kurabadpanchayat2').css('display', 'block');
            if (val1 == '1' || val1 == '2' || val1 == '3') {
                $('.grampanchyatdatalabel').html('ग्राम पंचायत');

            } else {
                $('.grampanchyatdatalabel').html('वार्ड');

            }



            if (val1 != '') {

                $.ajax({
                    url: '<?= base_url() ?>Userdata/grampanchyat/' + val1,
                    success: function(res) {

                        $(".grampanchyatdata").html(res.output);

                    },
                    error: function() {
                        alert("Fail")
                    }
                });
            }
        }
    </script>
    <script>
        if ($("input[name='verify']:checked").val() == 'आधार कार्ड न.') {

            $("#addh").css('display', 'block');
            $("#voter").css('display', 'none');
        }
        if ($("input[name='verify']:checked").val() == 'वोटर ID न.') {

            $("#voter").css('display', 'block');
            $("#addh").css('display', 'none');
        }
    </script>
    <script>
  
       
           
        if ($("input[name='marriedstatus']:checked").val() == 'हां') {
            
            $("#hidefieldvivah").css('display', 'block');
        } else {
         
            $("#hidefieldvivah").css('display', 'none');
        }
    
    </script>
    <script>
        if ($('#vidh').val() == 'हां') {

            $("#showfield").css('display', 'none');

        } else {

            $("#showfield").css('display', 'block');


        }
    </script>
    <script type="text/javascript">
        // update modal
        $(document).on('submit', '#bannerModelSubmits1', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?= base_url() ?>Userdata/updatesubadmi/",
                type: 'post',
                data: formData,
                success: function(result) {
                    //json data

                    var dataResult = JSON.parse(result);
                    if (dataResult.inserted == '1') {
                        swal('Record Updated 🙂', ' ', 'success');

                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);

                    } else {

                    }
                    // if (dataResult.inserted == '1') {
                    //     $('#success').html("Category Added Succefully!");
                    //     $('#success').css('color', 'green');

                    // }


                },
                cache: false,
                contentType: false,
                processData: false,
            })
        })
    </script>

<script>
      $(document).ready(function() {
            $('#marriedstatus1').change(function() {

                if ($('#marriedstatus1').val() == 'हां') {
                    $('#hidefieldvivah').attr("required", "true");
                    $('#hidefieldvivah').css("display", "block");
                   
                }
            })
            $('#marriedstatus').change(function() {
                if ($('#marriedstatus').val() == 'नहीं') {
                    $('#hidefieldvivah').removeAttr("required");
               
                    $('#hidefieldvivah').css("display", "none");
                }
            })
        })
</script>

</body>

</html>