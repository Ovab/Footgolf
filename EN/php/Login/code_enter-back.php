<?php
include_once "../connect.php";
$speler = $_SESSION['user_name'];
$verify = $_GET['c'];
$email = $_SESSION['email'];
echo $verify . "<br>";
echo $email . "<br>";
$telnummer = (int)$_SESSION['telefoon'];
if ($stmt = $conn->prepare("select `Speler-email` from `spelers` where `Speler-email`=?")) {
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        $row_cnt = $stmt->num_rows;
        if ($row_cnt == 0) {
            if ($stmt = $conn->prepare("select verifyCode, SpelerEmail from `emailverify` where verifyCode=? and SpelerEmail=?")) {
                $stmt->bind_param("ss", $verify, $email);
                if ($stmt->execute()) {
                    $stmt->store_result();
                    $row_cnt = $stmt->num_rows;
                    if ($row_cnt == 1) {
                        $stmt->free_result();
                        if ($stmt2 = $conn->prepare("INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES(?,?,?)")) {
                            $stmt2->bind_param('ssi', $email, $speler, $telnummer);
                            if ($stmt2->execute()) {
                                $_SESSION['signed_in'] = true;
                                $_SESSION['user_name'] = $speler;
                                $stmt3 = $conn->prepare("DELETE FROM emailverify WHERE SpelerEmail=?");
                                $stmt3->bind_param('s', $email);
                                $stmt3->execute();
                                header("location: ../../index.php");
                            } else {
                                session_destroy();
                                session_start();
                                $_SESSION['errors'] = "Something went wrong inserting the account in the database, please try again";
                                header("location:login-front-end.php");
                            }
                        } else {
                            session_destroy();
                            session_start();
                            $_SESSION['errors'] = "Something went wrong inserting the account in the database, please try again";
                            header("location:login-front-end.php");
                        }
                    } else {
                        session_destroy();
                        session_start();
                        $_SESSION['errors'] = "Your link might be expired, please try again";
                        header("location:login-front-end.php");
                    }
                } else {
                    session_destroy();
                    session_start();
                    $_SESSION['errors'] = "Something went wrong verifying your link";
                    header("location:login-front-end.php");
                }

            } else {
                session_destroy();
                session_start();
                $_SESSION['errors'] = "Unknown error checking your code";
                header("location:login-front-end.php");
            }
        } else {
            session_destroy();
            session_start();
            $_SESSION['errors'] = $email . " is already in the database";
            header("location:login-front-end.php");
        }
    } else {
        session_destroy();
        session_start();
        $_SESSION['errors'] = "We couldn't check if the account is already in the database";
        header("location:login-front-end.php");
    }
} else {
    session_destroy();
    session_start();
    $_SESSION['errors'] = "We couldn't check if the account is already in the database";
    header("location:login-front-end.php");
}