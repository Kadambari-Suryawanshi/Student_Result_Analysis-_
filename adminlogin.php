<html>
    <head>
        <title>Administrator Login</title>
        <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="css/login.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>
    <body>
        <div class="main">
            <div class="login">
                <form action="" method="post" name="login">
                    <fieldset>
                        <legend class="heading">Admin Login</legend>

                        <!--?php
                            include('init.php');

                            $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                                echo '<select name="class">';
                                echo '<option selected disabled>Select Class</option>';
                            while($row = mysqli_fetch_array($class_result)){
                                $display=$row['name'];
                                echo '<option value="'.$display.'">'.$display.'</option>';
                            }
                            echo'</select>'
                        ?>
                        -->

                        <?php
                            include "init.php";
                            session_start();
                            mysqli_select_db($conn,"resultanalyis");
                        
                            if(isset($_POST['email'],$_POST['password'])){
                                $email=$_POST['email'];
                                $pw=$_POST['password'];
                                $sql="select * from admin where email='".$email."' AND password='".$pw."' limit 1";
                                $res=mysqli_query($conn,$sql);
                                if(mysqli_num_rows($res)==1){
                                    $_SESSION['login_user']=$username;
                                    header("Location: dashboard.php");
                                    echo '<script language="javascript">';
                                    echo "alert('Login Successfully!')";
                                    echo '</script>';
                                }else {
                                    echo '<script language="javascript">';
                                    echo 'alert("Invalid Username or Password")';
                                    echo '</script>';
                                }
                            }
                        ?>

                        <input type="text" name="email" placeholder="Email" autocomplete="off">
                        <input type="password" name="password" placeholder="Password" autocomplete="off">
                        <input type="submit" value="L O G I N">
                    </fieldset>
                </form>    
            </div>
        </div>
    </body>
</html>