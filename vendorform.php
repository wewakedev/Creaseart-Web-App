<?php
require('../itfconfig.php');
$vendor = new VenUser();
$user = new User();

if (isset($_POST['submit']) && !empty($_POST['email'])) {

    $vendor->Vendors_Add($_POST);
    flashMsg("You have successfully registered on Aftercare.");
   // redirectUrl(thank_you.php);
    header("location:thank_you.php");

} else {
    //flashMsg("Something went wrong.","2");
    //  redirectUrl(CreateLink(array("register","itemid"=>"customer")));
}
?>

<!doctype html>
<html lang="en">

    <head>
        <title>Signup as Vendor</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/aftercaremobilelogo.png" type="image/x-icon" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              crossorigin="anonymous">
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.1/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $.validator.addMethod("noSpace", function(value, element) {
        var resinfo = parseInt(value.indexOf(" "));
        if(resinfo == 0 && value !="") { return false; } else return true;
    }, "Space not allowed in the starting of string !");

    $('#custom').validate({
        rules: {
            name:{required:true, maxlength:'100', noSpace: true},
            last_name:{required:true, maxlength:'100', noSpace: true},
            company_name:{required:true, maxlength:'100', noSpace: true},
            address:{required:true, maxlength:'100', noSpace: true},
            city_id:{required:true, maxlength:'100', noSpace: true},
            postal_code:{required:true, maxlength:'100', noSpace: true},
            state_id:{required:true, maxlength:'100', noSpace: true},
                    //email: {required:true, email:true },
           email:{required:true,email:true,
				remote: {
							url: "<?php echo SITEURL; ?>/itf_ajax/vform.php",
							type: "post",
							data: {
								itfusername: function() {
									return $("#email").val();
								}
							}
						}
			},  
            email_phone:{required:true,number:true,
				remote: {
							url: "<?php echo SITEURL; ?>/itf_ajax/vform.php",
							type: "post",
							data: {
								itfusername: function() {
									return $("#email_phone").val();
								}
							}
						}
			}  
         

        },
        messages: {
            name:{required:"Enter the name"},
            address:{required:"Enter the address"},
            city_id:{required:"Enter the city name"},
            postal_code:{required:"Enter the pin code"},
            state_id:{required:"Enter the state name"},
            company_name:{required:"Enter the trading name"},
            email: {required: "Enter the Email id" , remote: "email already exists !"},
            email_phone: {required: "enter the phone no" , remote: "phone no already exists !"}
           
           

        }
    });


});
</script>
      

    </head>
    <style>
        input[type=locationsearch],
        .locationicon,
        .navbar .nav-item:nth-child(2) {
            display: none;
        }

        .error {
            border: 1.5px solid #ff0e0e;
        }

        #name-error {
            display: none !important;
        }

        #form-text-error {
            display: none !important;
        }
        .form-group span {
            display:none !important;
        }
    </style>

    <body style="background: #F6F6F6;">

        <div class="container-fluid nav2">
            <script>
                $.get("nav2.html", function(data){
                  $("#navholder2").replaceWith(data);
                });
            </script>
            <div class="" id="navholder2"></div>


        </div>


        <div class="container vendorformheading my-5">

            <h3>
                <b>Supplier/Vendor to Complete and Sign</b>
            </h3>
            <small><Span>*</Span>denotes compulsory field. Application will be rejected unless these fields are
                completed.</small>
            <hr>
        </div>



        <!---------------------------------------------- FORM A SUPPLIER INFO ------------------------------------------------->


        <div class="container">


            <form id="custom" name="registration" method="POST" action="" enctype="multipart/form-data">
                
                <div class="container my-5 p-4" style="background-color: #fff; border-radius: .4rem;">

                    <h5 class="my-3"> <b>(A) Supplier/Vendor Information</b></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="legalname">Legal Name<sup>*</sup></label>
                                <input type="text" class="form-control" placeholder="Enter your name" name="name" id="name">
                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tradename">Trading Name <sup>*</sup> </label>
                                <input type="text" class="form-control" placeholder="Enter your company name" name="company_name"
                                       id="company_name">
                            </div>
                        </div>
                        <!--  col-md-6   -->
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="taxid">Tax ID/GST <sup>*</sup></label>
                                <input type="text" class="form-control" placeholder="" name="tax" id="tax">
                            </div>


                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-6">
                            <div class="enitityradio">
                                <label for="contact-preference">Legal Entity Status<sup>*</sup>(Please tick)</label>
                                <div class=" row d-sm-flex flex-row justify-content-between px-3">
                                    <div class="form-check col-6">
                                        <input class="form-check-input" type="radio" name="company_type" value="Public Company" id="pubcomp" required="required">
                                        <label class="form-check-label" for="pubcomp">
                                            Public Company
                                        </label>
                                    </div>
                                    <div class="form-check col-6">
                                        <input class="form-check-input" type="radio" name="company_type" value="Private Company" id="pvtcomp" required="required">
                                        <label class="form-check-label" for="pvtcomp">
                                            Private Company
                                        </label>
                                    </div>
                                </div>

                                <div class="row  d-flex flex-sm-row flex-column justify-content-between px-3">
                                    <div class="form-check col-6">
                                        <input class="form-check-input" type="radio" name="company_type" value="Partnership" id="partnership" required="required">
                                        <label class="form-check-label" for="partnership">
                                            Partnership
                                        </label>
                                    </div>
                                    <div class="form-check col-6">
                                        <input class="form-check-input" type="radio" name="company_type" value="Sole Trader" id="soletrader "required="required">
                                        <label class="form-check-label" for="soletrader">
                                            Sole Trader
                                        </label>
                                    </div>
                                </div>

                                <div class="row flex-sm-row d-flex flex-column px-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="company_type" value="Trust" id="trustcomp" required="required">
                                        <label class="form-check-label" for="trustcomp">
                                            Trust
                                        </label>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!--  col-md-6   -->
                    </div>


                </div>

                <!---------------------------------------------- FORM B CONTACT INFO ------------------------------------------------->

                <hr class="my-5">


                <div class="container my-5 p-4" style="background-color: #fff; border-radius: .4rem;">

                    <h5 class="my-3"> <b>(B) Contact Information</b></h5>

                    <div class="row">
                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="supadd">Supplier/Vendor Address <sup>*</sup></label>
                                <input type="text" class="form-control" id="address" placeholder="" name="address">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="vencity">City <sup>*</sup></label>
                                <input type="text" class="form-control" id="city_id" name="city_id" placeholder="">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="venpin">Pin Code<sup>*</sup></label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="venstate">State <sup>*</sup></label>
                                <input type="text"  name="state_id" class="form-control" id="state_id" placeholder="">
                            </div>
                        </div>



                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="venmail">Email<sup>*</sup></label>
                                <input type="mail" name="email" class="form-control" id="email" placeholder="">

                            </div>






                            <script>
                                $(function () {
                                    $('.callt').click(function (event) {
                                        event.preventDefault();
                                        var textboxvalue = $('input[name="email_phone"]').val();

                                        $.ajax({
                                            url: "<?php echo SITEURL; ?>/itf_ajax/email_otp.php",
                                            type: "post",
                                            // data: {
                                            //   id: $(this).val(),
                                            // access_token: $("#access_token").val()
                                            //},
                                            data: {txt1: textboxvalue},
                                            success: function (itfmsg) {
                                                $("#categoryoption").html(itfmsg);
                                                alert("OTP is Successfully sent on you mobile");
                                            },

                                            error: function (result) {
                                                alert('error');
                                            }
                                        });
                                    });
                                });
                            </script>


                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="venmobile">Mobile Number<sup>*</sup></label>
                                <input type="tel" name="email_phone" id="email_phone" maxlength="10" class="form-control" pattern="\d{10}"
                                       title="Please enter exactly 10 digits" />
  <a href="#" class="callt" onclick="this.href = document.getElementById('email_phone').value;">
                                <small>Generate OTP</small>
                            </a>
                            </div>

                          

                            <span id="categoryoption"></span>
                            
                            <input type="number" name="otp_code" id="otp_code"  class="form-control" required="required" />
                        </div>
                    </div>

                    <hr class="my-5">

                    <!-- OWNER ADDRESS -->

                    <!-- <div class="row">
                        <div class="col-md-8">
                  
                          <div class="form-group">
                            <label for="ownadd">Owner Address<sup>*</sup></label>&nbsp;
                            <span><input type="checkbox" id="copydetails"  onclick="autoFilAddress()"> Same as above</span>
                             
                            <input type="ownadd" class="form-control" id="ownadd" placeholder="">
                          </div>
                        </div>
                  
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="owncity">City <sup>*</sup></label>
                            <input type="owncity" class="form-control" id="owncity" placeholder="">
                          </div>
                  
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="ownpin">Pin Code<sup>*</sup></label>
                              <input type="ownpin" class="form-control" id="ownpin" placeholder="">
                            </div>
                        </div>
                  
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="ownstate">State <sup>*</sup></label>
                              <input type="ownstate" class="form-control" id="ownstate" placeholder="">
                            </div>
                    
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="ownmobile">Mobile Number<sup>*</sup></label>
                              <input type="ownmobile" class="form-control" id="ownmobile" placeholder="">
                            </div>
                    
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ownemail">Email<sup>*</sup></label>
                                <input type="mail" class="form-control" id="ownmail" placeholder="">
                            </div>
                        </div>
                    </div>
    
    
                </div> -->



                    <!---------------------------------------------- FORM C PAYMENT CLASSES ------------------------------------------------->


                    <div class=" my-5 " style="background-color: #fff; border-radius: .4rem;">

                        <h5 class="my-3"> <b>(C) Payment Information</b></h5>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="banknum">Bank Account Number <sup>*</sup></label>
                                    <input type="text" class="form-control" id="bank_accountno" name="bank_accountno" placeholder="" required="required">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ifscnum">IFSC <sup>*</sup></label>
                                    <input type="text" class="form-control" id="bank_ifsc" name="bank_ifsc" placeholder="" required="required">
                                </div>

                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="bankname">Bank & Branch Name * <sup>*</sup></label>
                                    <input type="text" class="form-control" id="bank_branch" name="bank_branch" placeholder="" required="required">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acholdername">Account Holder Name * <sup>*</sup></label>
                                    <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" placeholder="" required="required">
                                </div>

                            </div>
                        </div>


                        <small><b>Mode of payment selected * <sup>*</sup> </b> </small><br><br>

                        <div class="row ">
                            <div class="col-md-9 d-flex flex-sm-row flex-column justify-content-between flex-wrap">
                                
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="mode_of_payment[]" value="2" id="mode_of_payment">
                                        <label class="form-check-label" for="paycheckopt">
                                            RTGS
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="mode_of_payment[]" value="3"
                                               id="mode_of_payment">
                                        <label class="form-check-label" for="paycheckopt">
                                            Net Banking
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="mode_of_payment[]" value="4" id="mode_of_payment">
                                        <label class="form-check-label" for="paycheckopt">
                                            Wallet/UPI
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>

                    <!---------------------------------------------- FORM D SERVICE CLASSES ------------------------------------------------->

                    <div class=" my-5" style="background-color: #fff; border-radius: .4rem;">

                        <h5 class="my-3"> <b>(D) Service Classification</b></h5>


                        <small><b>What service you are offering? <sup>*</sup> </b> </small>

                        <div class="row my-3 ">
                            <div class="col-md-12 d-flex flex-sm-row flex-column justify-content-between flex-wrap">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="service_category[]" value="1" id="drycleanopt">
                                        <label class="form-check-label" for="drycleanopt">
                                            Dry Cleaning
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="service_category[]" value="2" id="wnfopt">
                                        <label class="form-check-label" for="wnfopt">
                                            Wash & Fold
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="service_category[]" value="3" id="wniopt">
                                        <label class="form-check-label" for="wniopt">
                                            Wash & Iron
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="service_category[]" value="4" id="laundryopt">
                                        <label class="form-check-label" for="laundryopt">
                                            Steam Iron
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <small><b>What is the basis of the discount offered?</b> </small>

                        <div class="row my-3 ">
                            <div class="col-md-12 d-flex  flex-sm-row flex-column justify-content-between flex-wrap">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="discount_offered[]" value="1" id="oderbaseopt">
                                        <label class="form-check-label" for="oderbaseopt">
                                            Order Based
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="discount_offered[]" value="2"
                                               id="invoicebasedopt">
                                        <label class="form-check-label" for="invoicebasedopt">
                                            Invoice Based
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="discount_offered[]" value="3" id="clothcatopt">
                                        <label class="form-check-label" for="clothcatopt">
                                            Cloth Category Based
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="discount_offered[]" value="4"
                                               id="eachclothopt">
                                        <label class="form-check-label" for="eachclothopt">
                                            Each Cloth Based
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="discount_offered[]" id="checkbox" value="5"
                                               value="checkbox" name="eachclothopt" />
                                        <label class="form-check-label" for="eachclothopt">
                                            Others
                                        </label>
                                        <div>
                                            <input id="showthis" name="other_discount" type="text" value="" />
                                        </div>
                                        <script>
                                            //hide field by default
                                            $('input[name="showthis"]').hide();

                                            //show it when the checkbox is clicked
                                            $('input[name="checkbox"]').on('click', function () {
                                                if ($(this).prop('checked')) {
                                                    $('input[name="showthis"]').fadeIn();
                                                } else {
                                                    $('input[name="showthis"]').hide();
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>




                            </div>
                        </div>

                        <small><b>How do you manage logistics for pick and delivery of the orders *<sup>*</sup> </b> </small>

                        <div class="row my-3 ">
                            <div class="col-md-6 d-flex justify-content-between flex-wrap">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="radio" name="own_logistic" value="1" onclick="yesopt();" />
                                        <label for="yesopt">Self-Drive</label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="radio" name="own_logistic" value="0" onclick="noopt();" />
                                        <label for="noopt">Atercare Drive</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function noopt() {
                                document.getElementById('yesoptform').style.display = 'none';
                            }

                            function yesopt() {
                                document.getElementById('yesoptform').style.display = 'block';
                            }
                        </script>



                        <!-- If YES to Own Logistics -->

                        <div class="row my-3" id="yesoptform" style="display: none;">
                            <div class="container my-3">
                                <small><b>How would you manage logistics? Which type of vehicle you use for pick & Drop
                                        facility?</b> </small><br>
                            </div>
                            <div class="col-md-12 d-sm-flex flex-column justify-content-between flex-wrap">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="manage_logistics[]" id="logbicycle">
                                        <label class="form-check-label" for="logbicycle">
                                            Bicycle
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2"  name="manage_logistics[]" id="twowheellog">
                                        <label class="form-check-label" for="twowheellog">
                                            2 Wheeler
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3" name="manage_logistics[]"
                                               id="threewheellog">
                                        <label class="form-check-label" for="threewheellog">
                                            3 Wheeler
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="4"  name="manage_logistics[]"
                                               id="fourwheellog">
                                        <label class="form-check-label" for="fourwheellog">
                                            4 Wheeler
                                        </label>

                                    </div>
                                </div>


                            </div>





                                <small><b>What is the radius of distance (in Kms) you can cover for present and future order
                                        requirements?</b> </small>

                                <div class="row my-3 ">
                                    <div class="col-md-12 d-flex justify-content-between flex-wrap">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="distance_km" vale="Upto 1km"
                                                       id="onekmopt">
                                                <label class="form-check-label" for="onekmopt">
                                                    Upto 1km
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="distance_km"
                                                       id="threekmopt" value="0 to 3 kms">
                                                <label class="form-check-label" for="threekmopt">
                                                    0 to 3 kms
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="distance_km"
                                                       id="fivekmopt">
                                                <label class="form-check-label" for="fivekmopt">
                                                    0 to 5 kms
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="distance_km"
                                                       id="fivepluskmopt">
                                                <label class="form-check-label" for="fivepluskmopt">
                                                    More than 5 kms
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div><!-- if Yes hidden form ends -->








                        </div>

                    <!-- <small><b>What are your quality parameters/standards of each service/services you will offering to Aftercare ?</b></small>
                        <div class="row my-3 ">
                            <div class="col-md-12">
                            
                                <div class="form-group">
                                    <textarea id="querybox1" name="querybox1" placeholder="" style="height:10rem; width: 100%; border-radius: 5px;"></textarea>
                                </div>
                               
                             
                            </div>
                        </div> -->



                    <!-- <small><b>Please provide details of how would you 
                    manage services/delivery during festivals, 
                    public holidays and in cases when 
                    your labour 
                    is off and in emergency cases?
                    </b></small>
                <div class="row my-3 ">
                    <div class="col-md-12">
                        
                            <div class="form-group">
                                <textarea id="querybox2" name="querybox2" placeholder="" style="height:10rem; width: 100%; border-radius: 5px;"></textarea>
                            </div>
                        
                     
                    </div>
                </div> -->




                    <!-- <small><b>Please select only those points which you are offering</b></small>
                <ul class="offercheckbox my-3" style="margin-left: -2.5rem;">
                    <li>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="offer1" id="offer1">
                                <label class="form-check-label" for="offer1">
                                    lorem ipsum dolor sit lorem ipsum dolor sit 
                                </label>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="offer2" id="offer2">
                                <label class="form-check-label" for="offer2">
                                    lorem ipsum dolor sit lorem ipsum dolor sit 
                                </label>
                            </div>
                        </div>
                    </li>

                </ul> -->


                        <!-- <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                
                                <small>Please do your Virtual Signature!</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                 <canvas id="sig-canvas" width="620" height="160">
                                     Get a better browser, bro.
                                 </canvas>
                             </div>
                             <button class="btn" id="sig-clearBtn">Clear Signature</button>
                             <button class="btn" id="sig-saveBtn">Save</button>
                        </div>
                        <style>
                            #sig-canvas {
                              border: 2px dotted #CCCCCC;
                              border-radius: 15px;
                              cursor: crosshair;
                            }
                        </style>
        
                        <script>(function() {
                            window.requestAnimFrame = (function(callback) {
                              return window.requestAnimationFrame ||
                                window.webkitRequestAnimationFrame ||
                                window.mozRequestAnimationFrame ||
                                window.oRequestAnimationFrame ||
                                window.msRequestAnimaitonFrame ||
                                function(callback) {
                                  window.setTimeout(callback, 1000 / 60);
                                };
                            })();
                          
                            var canvas = document.getElementById("sig-canvas");
                            var ctx = canvas.getContext("2d");
                            ctx.strokeStyle = "#222222";
                            ctx.lineWidth = 4;
                          
                            var drawing = false;
                            var mousePos = {
                              x: 0,
                              y: 0
                            };
                            var lastPos = mousePos;
                          
                            canvas.addEventListener("mousedown", function(e) {
                              drawing = true;
                              lastPos = getMousePos(canvas, e);
                            }, false);
                          
                            canvas.addEventListener("mouseup", function(e) {
                              drawing = false;
                            }, false);
                          
                            canvas.addEventListener("mousemove", function(e) {
                              mousePos = getMousePos(canvas, e);
                            }, false);
                          
                            
                            canvas.addEventListener("touchstart", function(e) {
                          
                            }, false);
                          
                            canvas.addEventListener("touchmove", function(e) {
                              var touch = e.touches[0];
                              var me = new MouseEvent("mousemove", {
                                clientX: touch.clientX,
                                clientY: touch.clientY
                              });
                              canvas.dispatchEvent(me);
                            }, false);
                          
                            canvas.addEventListener("touchstart", function(e) {
                              mousePos = getTouchPos(canvas, e);
                              var touch = e.touches[0];
                              var me = new MouseEvent("mousedown", {
                                clientX: touch.clientX,
                                clientY: touch.clientY
                              });
                              canvas.dispatchEvent(me);
                            }, false);
                          
                            canvas.addEventListener("touchend", function(e) {
                              var me = new MouseEvent("mouseup", {});
                              canvas.dispatchEvent(me);
                            }, false);
                          
                            function getMousePos(canvasDom, mouseEvent) {
                              var rect = canvasDom.getBoundingClientRect();
                              return {
                                x: mouseEvent.clientX - rect.left,
                                y: mouseEvent.clientY - rect.top
                              }
                            }
                          
                            function getTouchPos(canvasDom, touchEvent) {
                              var rect = canvasDom.getBoundingClientRect();
                              return {
                                x: touchEvent.touches[0].clientX - rect.left,
                                y: touchEvent.touches[0].clientY - rect.top
                              }
                            }
                          
                            function renderCanvas() {
                              if (drawing) {
                                ctx.moveTo(lastPos.x, lastPos.y);
                                ctx.lineTo(mousePos.x, mousePos.y);
                                ctx.stroke();
                                lastPos = mousePos;
                              }
                            }
                          
                            // Prevent scrolling when touching the canvas
                            document.body.addEventListener("touchstart", function(e) {
                              if (e.target == canvas) {
                                e.preventDefault();
                              }
                            }, false);
                            document.body.addEventListener("touchend", function(e) {
                              if (e.target == canvas) {
                                e.preventDefault();
                              }
                            }, false);
                            document.body.addEventListener("touchmove", function(e) {
                              if (e.target == canvas) {
                                e.preventDefault();
                              }
                            }, false);
                          
                            (function drawLoop() {
                              requestAnimFrame(drawLoop);
                              renderCanvas();
                            })();
                          
                            function clearCanvas() {
                              canvas.width = canvas.width;
                            }
                          
                            // Set up the UI
                            var sigText = document.getElementById("sig-dataUrl");
                            var sigImage = document.getElementById("sig-image");
                            var clearBtn = document.getElementById("sig-clearBtn");
                            var saveBtn = document.getElementById("sig-saveBtn");
                            clearBtn.addEventListener("click", function(e) {
                              clearCanvas();
                              sigText.innerHTML = "Data URL for your signature will go here!";
                              sigImage.setAttribute("src", "");
                            }, false);
                            saveBtn.addEventListener("click", function(e) {
                              var dataUrl = canvas.toDataURL();
                              sigText.innerHTML = dataUrl;
                              sigImage.setAttribute("src", dataUrl);
                            }, false);
                          
                          })();</script>
        
                    </div> -->








                    </div>


                    <!---------------------------------------------- FORM E Price & Pay ------------------------------------------------->


                    <div class=" container my-5" style="background-color: #fff; border-radius: .4rem;">

                        <h5 class="my-3"> <b>(E) Pricing & Payment</b></h5>


                        <div class="row">
                            <small class="container">
                                MERCHANT agrees to pay on boarding fee of Rs. <span><input class="agreementinput mx-2"
                                                                                           type="text" name="onboarding_fees"></span>to the
                                AFTERCARE, and MERCHANT has opted one of the below schedules
                                offered by the AFTERCARE to the Merchants. To specify and acknowledge
                                his consent with respect to opted schedule, the Merchant has signed
                                here under:

                            </small>
                            <div id="" class="cartsection my-4 col-12">
                                <div class="table-responsive  text-center">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th class="">Sr. No.</th>
                                                <th colspan="15">Merchant agrees to pay the on boarding
                                                    Fee as per one of the below mentioned
                                                    schedule :</th>
                                                <th class="text-center">Consented by the
                                                    Merchant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="cartaddon-row0">
                                                <td class=" font-weight-bold" colspan="15">1.</td>
                                                <td>At the time of signing of this agreement</td>
                                                <td class="text-center">
                                                    <input class="agreementinput form-control" type="text"
                                                           name="signfeeinput">
                                                </td>
                                            </tr>

                                            <tr id="cartaddon-row1">
                                                <td class=" font-weight-bold">2.</td>
                                                <td colspan="15">Rs 1000 On boarding fee and rest amount will be charged at the time off launch.</td>
                                                <td class="text-center">
                                                    <input class="agreementinput form-control" type="text"
                                                           name="onboardfee1input">
                                                </td>
                                            </tr>

                                            <tr id="cartaddon-row2">
                                                <td class=" font-weight-bold">3.</td>
                                                <td colspan="15">On boarding fee shall deducted from the commission of the vendor.</td>
                                                <td class="text-center">
                                                    <input class="agreementinput form-control" type="text"
                                                           name="onboardfee2input">
                                                </td>
                                            </tr>

                                            <tr id="cartaddon-row3">
                                                <td class=" font-weight-bold">4.</td>
                                                <td colspan="15">GST % Applicable</td>
                                                <td class="text-center">
                                                    <input class="agreementinput form-control" type="text" name="gstfee">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <small>
                                    AFTERCARE shall have all the rights related to change and modification in the fee and to
                                    charge additional fee at any point of time.
                                </small>


                            </div>

                        </div>

                        <div class="row my-3">

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="pricerate">Attach your price list/Rate Card of all services your are
                                        offering to Aftercare</label>
                                    <input type="file" id="price_list" name="price_list"><br><br>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="detailedinv">Recent Invoice with GST/ PAN and Bank details
                                        sepecified:</label>
                                    <input type="file" id="bank_details" name="bank_details"><br><br>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="detailedinv">Trade License / Shop Registration:</label>
                                    <input type="file" id="bank_details" name="bank_details"><br><br>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="detailedinv">GST / GST Declaration</label>
                                    <input type="file" id="bank_details" name="bank_details"><br><br>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="detailedinv">Pan Card</label>
                                    <input type="file" id="bank_details" name="bank_details"><br><br>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="detailedinv">Aadhar Card</label>
                                    <input type="file" id="bank_details" name="bank_details"><br><br>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="detailedinv">Bank Passbook / Cancelled Cheque</label>
                                    <input type="file" id="bank_details" name="bank_details"><br><br>
                                </div>
                            </div>


                        </div>

                        <small><b>Are you offering any discount on first order *<sup>*</sup> </b> </small>
                        <div class="row my-3 ">
                                <div class="col-md-6 d-flex justify-content-between flex-wrap">
                                  <div class="form-group">
                                    <div class="form-check">
                                      <input type="radio" name="own_logistic" value="1">
                                      <label for="yesopt">Yes</label>
                                    </div>
                                  </div>
                    
                    
                                  <div class="form-group">
                                    <div class="form-check">
                                      <input type="radio" name="own_logistic" value="0">
                                      <label for="noopt">No</label>
                                    </div>
                                  </div>
                            </div>
                        </div>


                        
                        <div class="agreeterms my-5 justify-content-center text-left">
                            <div class="form-group">
                                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="allagreeopt" id="allagreeopt" required="required">
                                    <label class="form-check-label" for="allagreeopt">
                                        I hereby declare that all the information I have filled is correct.
                                    </label>
                                </div>

                                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tncopt" id="tncopt" >
                                    <label class="form-check-label" for="tncopt">
                                        I agree to buy Starter Kit. &nbsp; <a href="vendor.html#vendorkit"
                                                                              target="_blank"><b>( View Starter Kit )</b> </a>
                                    </label>
                                </div>

                                <div class="form-check text-center mt-5 py-2 " style="background-color: #F6F6F6;">
                     <input class="form-check-input" type="checkbox" name="tncopt1" id="tncopt1" required="required">
                                    <label class="form-check-label" for="tncopt1">
                                        Please read our T&C before proceeding
                                    </label>
                                </div>

                            </div>
                        </div>


                    </div>


                    <div class="vendorformsubmission text-center">
                        <input type="submit" name="submit" value="Submit" class="rgst-btn">

                    </div>
                    <style>
                        .rgst-btn{}
                    </style>
                </div>

            </form>

        </div>
    </div>
    <!-- footer section -->

    <div class="">
        <script>
            $.get("footer.html", function(data){
              $("#footerjs").replaceWith(data);
            });
        </script>
        <div class="container-fluid " id="footerjs"></div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="vform/js/main.js"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


</body>

</html>