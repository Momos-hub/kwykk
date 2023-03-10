<!-- This file contains footer  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/716d860306.js" crossorigin="anonymous"></script>
</head>
<style>
    .footer{
        background-color: #001428;
        padding: 50px;
    }

    li, a, p{
        color: white;
        font-size: 18px;
        text-decoration: none;
    }

    i{
        margin: 0px 15px;
    }

    a i{
        font-size: 20px;
    }

    p{
        margin: 3px auto;
    }

    h4{
        color: #4BB1DF;
    }
    
    #upicon{
        border: 1px solid #4BB1DF;
        border-radius: 10px;
        background-color: #4BB1DF;
        padding: 5px 10px;
    }

    #upicon:hover{
        color: #001428;
    }
</style>
<body>
    <div class="footer" style="margin-top: 150px;">
        <div class="container">
            <div class="row" style="margin: auto;">
            <!-- logo in left side  -->
                <div class="col-md-3 logo">
                    <img style="height: 180px; width: 260px;" src="logo.png" alt="">
                </div>

                <div class="col-md-2 company">
                    <h4>Company</h4>
                    <li><a href="https://www.kwyk.one/en/content/about">About Us</a></li>
                    <li><a href="https://www.kwyk.one/en/content/about">Privacy</a></li>
                    <li><a href="https://www.kwyk.one/en/content/terms">Terms & Conditions</a></li>
                </div>
                <div class="col-md-2 gethelp">
                    <h4>Get Help</h4>
                    <li>FAQ</li>
                    <li>Contact us</li>
                    <li>Feedback</li>
                    <li>Blog</li>
                </div>
                <div class="col-md-2 quicklinks">
                    <h4>Quick Links</h4>
                    <li><a href="http://localhost/kwykpr/adminsignin.php">Admin Login</a></li>
                    <li><a href="http://localhost/kwykpr/signin.php">Merchant Login</a></li>
                    <li><a href="http://localhost/customer/signin.php">Customer Login</a></li>
                </div>
                <div class="col-md-2 followuson">
                    <h4>Contact details</h4>
                    <p>+91 1234567890</p>
                    <p>kwyk@gmail.com</p>
                    <p>5th floor TBI. MIT-WPU Pune</p>

                    <div style="text-align:center; margin-top: 20px;">
                        <p style="margin-bottom:5px; ">Follow us on</p>
                        <a href="https://www.facebook.com/Kwyk.One"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/accounts/login/?next=/kwyk.one/"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://twitter.com/Kwyk_One"><i class="fa-brands fa-twitter-square"></i></a>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

    <div class="row" style="background-color: #212529; text-align:center;color:#c7c7c7; height: 80px;">
        <div class="col-md-5" style="margin: auto;">
            Copyright @ 2022. All Rights Reserved
        </div>
        <div class="col-md-5" style="margin: auto;">
            Powered By <span style="color: #A5D8EF; font-weight:bolder;">KWYK</span>
        </div>
        <div class="col-md-2">
			<a id="top-to" class="" href="#"><i style="color: white;" id="upicon" class="fa fa-angle-up"></i></a>
		</div>
    </div>

    <script>
        //button working (upside arrow) to go back on top of page 
         $('#top').click(function () {
            $('html, body').animate({
            scrollTop: 0
            }, 'slow');
            return false;
        });
    </script>
    
</body>
</html>