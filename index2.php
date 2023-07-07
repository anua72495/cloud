<html>
<head>
    <title>Home</title>
    
    <script src="Scripts/jquery-1.4.1.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $("#main-div").fadeOut(0)
            $("#main-div").fadeIn(600)
        });

     </script>

    <link href="Style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    img.logo
    {
        top:50px;
        left:20px;
        width:80px;
        height:80px;
        position:fixed;
    }
    #header
    {
        background: -moz-linear-gradient(-120deg,#522602,#894005,#522602);
        --background: -webkit-linear-gradient(-120deg,#522602,#894005,#522602);
        left:0;
        top:-20px;
        color:white;
        height:220px;
        width:100%;
        position:fixed;
        box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2);
    }
    ul
    {
        font-weight:bold;
        margin:-8px -8px;
        list-style-type:none; 
        width:100%;
        position:fixed;
    }
    li a 
    {
        padding:4px 25px;
        text-decoration:none;
        color:White;
        display:block;
        transition: 0.3s ease-in-out;
    }
    li 
    {
        float:right;
    }
    a:hover
    {
        color:Gray;
    }
    #space
    {
        padding:8px 20px;
    }
	.slide-image
	{
		width:250px;
		height:250px;
	}
    </style>

</head>
<body>
    <form id="form1" runat="server">

         <div id="header">
            <h3><span style="font-family: Cambria; font-size: 22pt; top:90px; left:110px; position:absolute;"><strong>APM sports</strong></span></h3>
         </div>

         <img src="images/Logo.png" alt="Image" class="logo"  /> 
        
        <ul>
            <li id="space"> </li>
            <li> <a href="contactus.php">ContactUs</a> </li>
            <li> <a href="index.php">Home</a> </li>
			    			 <li> <a href="Login.php">Login</a> </li>
			  <li> <a href="customer.php">Registration</a> </li>
        </ul>
		<br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br>
		<marquee><img class="slide-image" alt="image1" src="images/Slide/1.jpg" /><img class="slide-image" alt="image1" src="images/Slide/2.jpg" /><img class="slide-image" alt="image1" src="images/Slide/3.jpg" width="800"/><img class="slide-image" alt="image1" src="images/Slide/4.jpg" /><img class="slide-image" alt="image1" src="images/Slide/5.jpg" /><img class="slide-image" alt="image1" src="images/Slide/6.jpg"/></marquee>
       
    </form>
</body>
</html>

				