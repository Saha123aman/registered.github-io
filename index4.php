<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To our College</title>
    <style>
        body {
            font-weight: bold;
            background-color: aqua;
        }

        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        input {
            text-align: center;
            padding: 8px;
            margin: 1.9em;
            width: 30%;
        }

        #mail {
            color: red;

        }

        #cit {
            color: red;
        }

        #num {
            color: red;
        }

        .num {
            margin: 20px;
        }

        #numb {
            color: red;
        }

        #username {
            color: red;

        }
        @media only screen and (max-width:600px){
            input {
                width:auto;
            }
        }
    </style>
</head>

<body>
    <form action="#" onsubmit="return validation()" class="form" method="post">
        Name<input type="text" id="user" name="name" placeholder="Enter your name"><span id="username"
            class="text-danger"></span><br>
        Email<input type="text" id="email" name="email" placeholder="Enter your email"><span id="mail"
            class="text-danger"></span><br>
        City<input type="text" id="city" name="city" placeholder="Enter your city"><span id="cit"
            class="text-danger"></span>
        Phone Number<input type="text" id="number" class="num" name="mobile" placeholder="Enter your phone number"><span
            id="numb" class="text-danger"></span>
        <input type="submit" name="submit" value="register">
    </form>
    <?php
    //**Declaration of variables
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $city = $_POST["city"];
        $mobile = $_POST["mobile"];


        //**Connect php to database**
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "mydata";
        $conn = mysqli_connect($host, $user, $pass, $dbname);
        //____________________________________________//
        $sql = "INSERT INTO student(name,email,city,mobile)values('$name','$email','$city','$mobile')";

        mysqli_query($conn, $sql);
    }

    ?>
    <script>
        function validation() {
            var user = document.getElementById('user').value;
            var email = document.getElementById('email').value;
            var city = document.getElementById('city').value;
            var number = document.getElementById('number').value;
            //username section_________________////
            if (user == "") {
                document.getElementById('username').innerHTML = "**please fill the username**";

                return false;
            }
            if ((user.length <= 2) || (user.length > 20)) {
                document.getElementById('username').innerHTML = "**name length must be between 2 and 20";
                return false;
            }
            if (!isNaN(user)) {
                document.getElementById('username').innerHTML = "**only character allowed**";

                return false;

            }
            //_____________________________________________________//

            ////email section___________________________.////////////////
            if (email == "") {
                document.getElementById('mail').innerHTML = "**please fill email**";
                return false;
            }
            if ((email.length <= 10) || (email.length > 50)) {
                document.getElementById('mail').innerHTML = "** please enter valid email";
                return false;
            }
            if (email.indexOf('@') <= 0) {
                document.getElementById('mail').innerHTML = "** @ invalid position";
                return false;
            }
            if ((email.charAt(email.length - 4) != '.') && (email.charAt(email.length - 3) != '.')){

                document.getElementById('mail').innerHTML = "** .  invalid position";
                return false;
            }

            //_____________________________________________________________//

            /////city section__________________________________//
            if (city == "") {
                document.getElementById('cit').innerHTML = "please fill city**";
                return false;
            }
            if (!isNaN(city)) {
                document.getElementById('cit').innerHTML = "**not a city";
                return false;
            }

            //___________________________________________________________//

            //number section__________________________________//
            if (number == "") {
                document.getElementById('numb').innerHTML = "**please fill the number**";
                return false;
            }
            if (isNaN(number)) {
                document.getElementById('numb').innerHTML = "**not a number**";
                return false;
            }
            if (number.length != 10) {
                document.getElementById('numb').innerHTML = "*must be 10 digit";
                return false;
            }
        }
        //______________________________________________________________//


    </script>

</body>

</html>