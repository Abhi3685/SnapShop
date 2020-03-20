<?php include "header.php" ?>
        <!--================End Menu Area =================-->

        <div class="alert alert-danger text-center" id="rf" style="display:none; margin-bottom: 0px;"> Registeration Failed : ( </div>

        <!-- Modal For Email Verification -->

        <div id="rs" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Verification Required</h4>
                    </div>
                    <div class="modal-body">
                        <p>Hi there! We have sent a verification code to your email address. Please enter the verification code given in the mail below to complete your registeration.</p>
                        <input type="text" class="form-control" placeholder="Verification Code" id="v-code">
                        <input type="text" id="v-email" hidden>
                        <div id="reg_msg" class="alert" style="display: none;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="verifyUser();">Submit</button>
                        <button type="button" class="btn btn-default" onclick="location.reload();">Close</button>
                    </div>
                </div>
            </div>
        </div>

        	<!-- Modal For Forgot Password -->
	<div id="forgot_pass_modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Forgot Password</h4>
	      </div>
	      <div class="modal-body">
	        <p>Enter your email address to reset your password.</p>
	        <input type="text" class="form-control" placeholder="Registered Email" id="f_email"><br/>
	        <div id="reset_pass_msg" class="alert alert-success" style="display: none;">
	        	An email has been sent to you containing the password.
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" onclick="forgot_pass();" id="reset_pass_btn">Submit</button>
	        <button type="button" class="btn btn-default" onclick="location.reload();">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
        
        <!--================Categories Banner Area =================-->
        <section class="product_listing_area" style="margin-top:20px; margin-bottom:20px;">
            <div class="container">
            <div class="single_c_title" >
                    <h2>Login / Register</h2>
            </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================login Area =================-->
        <section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="login_title">
                                <h2>log in your account</h2>
                                <p>Log in to your account.</p>
                            </div>
                            <div class="login_form row">
                                <div class="col-lg-12 form-group">
                                    <input class="form-control" type="email" placeholder="Email" id="si_email" required>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <input class="form-control" type="password" placeholder="Password"  id="si_pass" required>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <h4 onclick="$('#forgot_pass_modal').modal('show');">Forgot your password ?</h4>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <input type="button" value="Login" class="btn update_btn form-control" onclick="signin_submit();">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="login_title">
                                <h2>create account</h2>
                                <p>Follow the steps below to create a new account and enjoy the great shopping experience of SnapShop.</p>
                            </div>
                            <div class="login_form row">
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="User Name" id="username" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="email" placeholder="Email" id="email" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="Phone" id="mobile" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="password" placeholder="Password" id="password" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="password" placeholder="Re-Password" id="c_password" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input type="button" value="Sign Up" class="btn subs_btn form-control" onclick="signup_submit();">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
        
        <!--================Footer Area =================-->
        <?php include "footer.php" ?>

        <script>
            function signup_submit(){
                var username = $("#username").val();
                var email = $("#email").val();
                var mobile = $("#mobile").val();
                var password = $("#password").val();
                var c_password = $("#c_password").val();
                if(email != '' && username != '' && (password == c_password) && mobile !='' && password !=''){
                    $.ajax({
                            type: "POST",
                            url: "add_user.php",
                            data: { email: email, username: username, password: password, mobile: mobile },
                            success: function(response){
                                if(response == 1){
                                    $("#v-email").val(email);
                                    $("#rs").modal('show');
                                } else if(response == "user exists"){ 
                                    setTimeout(function(){
                                        alert('You are already a registered user.');
                                        location.reload();
                                    }, 1000);
                                } else {
                                    $("#rf").show();
                                }
                            }
                    });
                }
            }

            function verifyUser(){
			var v_code = $("#v-code").val();
			var v_email = $("#v-email").val();
			if(v_code != ''){
				$.ajax({
						type: "POST",
						url: "confirm.php",
						data: { email: v_email, token: v_code },
						success: function(res){
							if(res == 0){
								alert('Sorry something went wrong. Please try again after some time.');
							}
							else if(res == 1){
								$("#reg_msg").addClass("alert-danger");
								$("#reg_msg").html('Invalid Code Provided.');
								$("#reg_msg").show();
							}
							else if(res == 2){
								$("#v-code").attr("disabled", true);
								$("#reg_msg").removeClass("alert-danger");
								$("#reg_msg").addClass("alert-success");
								$("#reg_msg").html('Registeration Successful. You can login now.');
								$("#reg_msg").show();
							} else {
								alert('Error: Something broke up. Contact Us if the issue persists.');
							}
						}
                    });
                }
		    }

        function signin_submit(){
            var email = $("#si_email").val();
            var password = $("#si_pass").val();
            if(email != '' && password != ''){
                $.ajax({
                        type: "POST",
                        url: "signin.php",
                        data: { email: email, password: password },
                        success: function(response){
                            if(response == 0){
                                alert('You Are Not Registered Yet.');
                            } else if(response == 'failed'){
                                alert('Incorrect Credentials.');
                            } else if(response == 'login'){
                                    window.location.href = 'index.php';
                            } else if(response == 'unverified'){
                                alert('You Are Not Verified Yet.');
                            }
                            else if(response == 'admin'){
							window.location.href = 'admin/';
						    }
                        }
                    });
                }
            }

            function forgot_pass(){
			var email = $("#f_email").val();
			if(email != ''){
				$("#reset_pass_btn").html('Please Wait ...');
				$("#reset_pass_btn").attr("onclick","");
				$.ajax({
					type: "POST",
					url: "forgot_pass.php",
					data: { email: email },
					success: function(res){
						$("#reset_pass_btn").html('Submit');
						$("#reset_pass_btn").attr("onclick","forgot_pass();");
						if(res == 0){
							alert('Email doesn\'t exist.');
						} else if(res == 1){
							$("#reset_pass_msg").show();
						} else {
							alert('Error: Uncaught error occured. Contact if the problem persists.');
						}
					}
				});
			} else {
				alert('Invalid details provided.')
			}
		}
        </script>

    </body>
</html>