<?php 
    require('./utility.php');
    ConnectDB();
    $err = '';
    if(isset($_POST['btnl'])){
        $sql = 'SELECT * FROM member WHERE memtel="'.$_POST['memtel'].'" ';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)==0){
            $sql = ' INSERT INTO member (memtel,memfirst,memlass,mememail,mempass,memstatus)
            VALUES ("'.$_POST['memtel'].'","'.$_POST['memfirst'].'","'.md5($_POST['memlass']).'","'.$_POST['mememail'].'","'.$_POST['mempass'].'","0") ';
            mysqli_query($GLOBALS['conn'],$sql);
            header("Location:login.php");

        }else{
            $err = '<div class="alert alert-danger">อีเมลล์นี้ถูกใช้งานไปแล้ว</div>';
            header("Location:login.php");


        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สนามเสือ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap">
    <link rel="stylesheet" href="./ycss.css">
    <style>
        body {
            background-image: url('football2.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .outer-border {
            box-shadow: 0px 0px 20px 5px rgba(255, 255, 255, 0.7);
            background-color: rgba(255, 255, 255, 0.3);
            padding: 20px;
            margin-top: 50px;
        }

        .inner-border {
            box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.5);
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 20px;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .btn-login,
        .btn-back {
            font-size: 14px; /* ปรับขนาดตรงนี้ */
            font-weight: bold;
            padding: 8px 16px; /* ปรับขนาดตรงนี้ */
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-login:hover,
        .btn-back:hover {
            transform: scale(1.05);
        }

        .btn-back {
            background-color: #4d4d4d;
            border-color: #fff;
            color: #fff;
        }

        .btn-back:hover {
            background-color: #fff;
            border-color: #000;
            color: #000;
        }

        .btn-login {
            background-color: #4CAF50;
            border-color: #4CAF50;
            color: #fff;
        }

        .btn-login:hover {
            background-color: #0080ff;
            border-color: #45a049;
        }

        .footer {
            background-color: #28a745;
            color: white;
            padding: 8px 0; /* Adjust footer padding */
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success p-2 border">
        <div class="container">
            <a href="./admin/index.php" class="navbar-brand text-info">
                <img src="img/lo1.png" width="100px" height="100px" alt="Logo">
            </a>
            <button class="btn btn-secondary me-2 btn-back" onclick="goBack()"><i class="fas fa-arrow-left"></i> ย้อนกลับ</button>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-5">
                <div class="outer-border rounded">
                    <div class="inner-border rounded">
                        <form method="post" class="d-flex flex-column align-items-center">
                            <h1 class="mb-4">เข้าสู่ระบบ</h1>
                            <input name="mememail" type="email" placeholder="อีเมล" class="form-control my-2" required>
                            <input name="mempass" type="password" placeholder="รหัสผ่าน" class="form-control my-2" required>
                            <button name="btn1" class="btn btn-primary btn-lg mt-4 btn-login" type="submit">เข้าสู่ระบบ</button>
                            <div class="text-center mt-3">
                                ยังไม่มีบัญชีผู้ใช้งาน? <a class="text-secondary" href="register.php">สมัครสมาชิก</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function goBack() {
            window.location.href = 'index.php';
        }
    </script>
    <footer class="footer">
        <div class="container">
            <p>Copyright &copy; 2024 สนามเสือ. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
