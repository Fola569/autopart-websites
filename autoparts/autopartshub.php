
<?php


include 'con1.php';

$cats = mysqli_query($con1, "SELECT * FROM categories");

$catsdrop = mysqli_query($con1, "SELECT * FROM categories");







?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Divs with Search Box</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('blury.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
        }
        
        
               footer {
            position:fixed;
            bottom:0px;
            z-index:999;  
                        background-color: rgba(0, 0, 0, 0.5);
      }

        .logo  {
            height: 70px; /* Adjust as needed */
                        border-radius: 5px 5px 5px 5px;

        }

        .menu {
            display: flex;
            gap: 20px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px 5px 5px 5px;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            //justify-content: center;
            //gap: 20px;
            //margin-bottom: 20px;
            //margin: 30px;
            padding: 10px;


        }

        .menu a:hover {
            text-decoration: none;
            background-color: orange;

        }

        .container {
            text-align: center;
            //display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            //height: calc(100vh - 70px); /* Adjust height to account for header */
            padding: 20px;
        }

        .search-box {
            margin-bottom: 20px;
        }

        .search-box input[type="text"] {
            padding: 10px;
            border-radius: 5px 0 0 5px;
            border: 1px solid #ccc;
            outline: none;
            width:50%;
        }

        .search-box button {
            padding: 10px;
            border-radius: 0 5px 5px 0;
            border: 1px solid #ccc;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            outline: none;
        }

        .search-box button:hover {
            background-color: #0056b3;
        }

        .centered-divs {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
                overflow-x: auto;
    white-space: nowrap;
    padding: 10px;
    box-sizing: border-box;
        }

        .box {
            width: 300px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            flex-direction: column;
        }


.box2 {
            width: 300px;
            height: 50px;
            background-color:blue;
            border-radius: 15px;
            display: flex;
            align-items: left;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            color: white;
            flex-direction: column;
text-decoration: none;
padding:10px;
        }

        .wide-divs {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }

        .wide-box {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
        }

        .wide-box imgs {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .wide-box .caption {
            position: absolute;
            top: 0;
            right: 270px;
            width: 100%;
            //background: rgba(0, 0, 0, 0.5);
            color: black;
            padding: 10px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }
            h2 {
            color: #ecf0f1;
        }


.typewriter {
    display: inline-block;
    position: relative;
    font-size: 24px;
    white-space: nowrap;
    overflow: hidden;
     align-items: center;
     text-align: center;
}

.text {
    display: inline;
     align-items: center;
                 text-align: center;

}

.cursor {
    display: inline-block;
    width: 2px;
    height: 1em;
    background: black;
    animation: blink 1s step-start infinite;
    position: absolute;
    right: 0;
    bottom: 0;
    text-align: center;
}

@keyframes blink {
    50% { opacity: 0; }
}


.iframe-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* Aspect ratio (16:9) */
            overflow: hidden;
            border-radius: 10px; /* Optional: Border radius for rounded corners */
        }

        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }



form {
    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
    padding: 20px;
    margin: 20px 0;
    border-radius: 10px;
    text-align: left;
}

input[type="text"], input[type="email"], textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}


input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

</style>
</head>
<body>
    <header>
        <div class="logo">
            <img class="logo" src="logoauto.jpg" alt="GoTechs Logo">
        </div>
        <nav class="menu">
            <a href="#">Home</a>
            <a href="abouts.php">About Us</a>
            <a href="cata.php">Parts</a>
            <a href="#conta">Contacts</a>
 <a href="#">Signup</a>
 <a href="#">Login</a>
<img width=30 height=30 style=" border-radius: 100px;" src="3.jpg">        </nav>
    </header>
 
    
    
      <p>
        </div>
        
        
        
    

    <div class="container">
    
        <div class="typewriter">
        <div class="text" id="typewriter-text"></div>
        <div class="cursor"></div>
    </div>
    <script src="script.js"></script><div class="search-box">
            <p></p>Find a Part<p>
            <input type="text" placeholder="e.g Toyota, Winscreen, Bumbers etc...">
            <button type="button">Search</button>
        </div>
        <div class="centered-divs">
            <div  class="box" style="background-position: center; background-image:url('car1.jpg'); background-repeat:repeat;">
				<font color="#FFFFFF">Parts</font></div>
            <div class="box" style="background-position: center; background-image:url('car2.jpg'); background-repeat:repeat; ">
				<font color="#FFFFFF">Engines</font></div>
            <div class="box" style="background-position: center; background-image:url('car3.jpg'); background-repeat:repeat; ">
				<font color="#FFFFFF">Interiors</font></div>
        </div>
        
        
        &nbsp;<div class="wide-divs">
            <div class="wide-box">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
					<tr>
						<td width="315">
                <img class="logox" src="vision.jpg" alt="Vision & Mission" width="100%" height="237" ></td>
						<td>Who We Are<br>
						PartsHubNG specializes in making automobile spare parts available to both dealers as well as end users..</td>
					</tr>
				</table>
				<p>&nbsp;</p>
&nbsp;</div>


<br>
&nbsp;<font size="6">Choose a Category 

        </font>
<select>
<option>Select a Category</option>
<?php while ($row = mysqli_fetch_assoc($catsdrop)) { ?><option><?php echo $row['catname'] ?></option>
<?php } ?>
</select>

        <div class="centered-divs">
<?php while ($row = mysqli_fetch_assoc($cats)) { ?>       


				<font color="white" size="2"><span style="font-weight: 400">

        <div class="box2" ><a><?php echo $row['catname'] ?></a>
				</span></font></div>
        </a>

<?php } ?>
				
				
				
			</div>


<form method="post" action="add.php">
    <h3>Create an Account with Us</h3>
    <label>Business Name: <input type="text" name="bizname"></label><br>
    <label>Email: <input type="text" name="email"></label><br>
    <label>Password: <input type="text" name="pass"></label><br>
    
    <input type="submit" name="signups" value="Signup">
</form>
			
       <div class="wide-box">
                <div align="left">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
					<tr>
						<td width="33">
                &nbsp;</td>
						<td>&nbsp;</td>
						<td width="1200">



			<p>
			<img style="max-width:100%;height:50%" border="0" src="ads11.jpg" width="696" height="365"></p>

       <div class="wide-box">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
					<tr>
						<td width="315">
                <img style="max-width:400%;height:400%"  src="vision.jpg" alt="Vision & Mission" width="107%" height="207" ></td>
						<td>&nbsp;</td>
						<td width="698">

    <section>
        <h2 align="left"><font color="#000000">What We Do</font></h2>
        <p align="left">Our Services:</p>
        <ul>
            <li>
			<p align="left">Spare parts supply</li>
            <li>
			<p align="left">Auto Dealers connect</li>
            <li>
			<p align="left">Latest Parts Alerts</li>
            <li>
			<p align="left">Supply and Delivery</li>
            <li>
			<p align="left">Customer Care Support</li>
        </ul>
    </section>
						</td>
					</tr>
				</table>
				<p>&nbsp;</p>
&nbsp;</div>
        
        
        	<iframe name="I1" src="galary.htm" border="0" frameborder="0" width="960" height="580" scrolling="no">
			Your browser does not support inline frames or is currently configured not to display inline frames.
			</iframe><br>
			<br>
            <div class="wide-box">
                <img src="contactx.jpg" alt="Contact Us">
                <div class="caption">Contact Us</div>
<br>Address:
<br>Phone:
<br>Email:
            </div>
        </div>
    </div>
    
    <div style="position:fixed;bottom:0px;right:0px;">
    
    <img border="0" src="wasap.png" width="50" height="50"><br>
	Chat Us!<p>
    
    </div>
    
    <script>
    
    const textElement = document.getElementById('typewriter-text');
const words = [
    'Welcome to PartsHubNG',
    'Your home of Accesible auto parts',
    'We provide Solutions',
    'for all sorts of customers',
    'Car Parts',
    'Industrial Machine Parts',
    'Reliable Customer Support',
    'Prompt Delivery',
    'You can Count on Us!'
];

let currentWord = 0;
let currentChar = 0;
let typingSpeed = 50; // milliseconds

function typeWord() {
    if (currentChar < words[currentWord].length) {
        textElement.textContent += words[currentWord][currentChar];
        currentChar++;
        setTimeout(typeWord, typingSpeed);
    } else {
        setTimeout(() => {
            currentChar = 0;
            currentWord++;
            if (currentWord < words.length) {
                textElement.textContent += ' ';
                setTimeout(() => {
                    textElement.textContent = '';
                    typeWord();
                }, 1000);
            }
        }, 1000);
    }
}

typeWord();
    </script>
</body>
</html>