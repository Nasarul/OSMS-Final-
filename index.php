<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/210c136c9c.js" crossorigin="anonymous"></script>
    <title>OSMS</title>

    <style>
        a {
            text-decoration: none !important;
            color: white;
            width: 30%;
        }

        body {
            background: white;
            font-family: 'Inconsolata', monospace;
            font-weight: bold;
            color: gray;
            text-align: center;
            -webkit-font-smoothing: antialiased;
            margin: 20px;
        }

        .box-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5%;
            border-radius: 15px;
        }

        .box {
            padding: 30px;
            margin: 2%;
            background: white;
            /* width: 80%; */
            border: 1px solid #d6d6d6;
            box-shadow: 0 2px 3px 0px rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            transition: .2s all;
        }

        .box-wrap:hover .box {
            filter: blur(3px);
            opacity: .5;
            transform: scale(.98);
            box-shadow: none;
        }

        .box-wrap:hover .box:hover {
            transform: scale(1);
            filter: blur(0px);
            opacity: 1;
            background-color: green;
            box-shadow: 0 8px 20px 0px rgba(0, 0, 0, 0.125);
        }

        .box-wrap {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
            color: #f1f1f1;
        }

        .fa-solid {
            font-size: 60px;
            color: #f1f1f1;
        }

        h2 {
            margin-top: 0;
            font-family: Tahoma;
            font-size: 30px;
            color: green;
        }

        h5 {
            margin-top: 2px;
            font-family: Tahoma;
            font-size: 20px;
            color: green;
        }

    </style>
</head>

<body>
    <img src="admin/assets/dist/img/napdback.png" alt="NAPD's Logo">
    <h2>Online Session Management System for NAPD</h2>
    <h5>(Select your options)</h5>

    <div class="box-wrap">
        <a href="admin/login/index.php">
            <div class="box">
                <i class="fa-solid fa-user-gear"></i>
                <p>Admin</p>
            </div>
        </a>
        <a href="facilitator/login/index.php">
            <div class="box">
                <i class="fa-solid fa-user-tie"></i>
                <p>Facilitator</p>
            </div>
        </a>
        <a href="trainee/login/index.php">
            <div class="box">
                <i class="fa-solid fa-users"></i>
                <p>Trainee</p>
            </div>
        </a>
    </div>

</body>

</html>