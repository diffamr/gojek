<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("white"," ============================================\n");
echo color("green","| Auto Create Account Gojek X Redeem Voucher |\n");
echo "| Time       :".date('(d-m-Y) (H:i:s)')."        |\n";
echo color("green","| Diff Comdersszz                            |\n");
echo " ============================================\n";

//function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("nevy","Nomor : ");
       // $no = trim(fgets(STDIN));
        $nohp = trim(fgets(STDIN));
        $nohp = str_replace("62","62",$nohp);
        $nohp = str_replace("(","",$nohp);
        $nohp = str_replace(")","",$nohp);
        $nohp = str_replace("-","",$nohp);
        $nohp = str_replace(" ","",$nohp);

        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            if (substr(trim($nohp),0,3)=='62') {
                $hp = trim($nohp);
            }
            else if (substr(trim($nohp),0,1)=='0') {
                $hp = '62'.substr(trim($nohp),1);
        }
         elseif(substr(trim($nohp), 0, 2)=='62'){
            $hp = '6'.substr(trim($nohp), 1);
        }
        else{
            $hp = '1'.substr(trim($nohp),0,13);
        }
    }
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$hp.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","The OTP code has been sent")."\n";
        otp:
        echo color("nevy","Input OTP : ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo "\n";
        echo color("green","Successfully Registered\n");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("green","Your Access Token : ".$token."\n");
        save("toket.txt",$token);
        echo "\n";
        echo color("white","===========(INFORMATION ACCOUNT)===========");
        echo "\n";
        echo color("nevy","Email : ".$email.'@gmail.com');
        echo "\n";
        echo color("nevy","Name : ".$nama."\n");
        echo color("nevy","Nomor : +".$hp."\n");
        echo color("white","\n===========(REDEEM VOUCHER)===========");
        echo "\n".color("yellow","Mencoba Claim Voucher Gofood");
        echo "\n".color("yellow","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(25);
        }
        $boba10 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2107"}');
        $messageboba10 = fetch_value($boba10,'"message":"','"');
        if(strpos($boba10, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","(+) Message: ".$messageboba10);
        goto goride;
        }else{
        echo "\n".color("red","(+) Message: ".$messageboba10);
        echo "\n";
        echo "\n".color("yellow","Mencoba Claim Voucher Gofood");
        echo "\n".color("yellow","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(2);
        }
        $boba19 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2107"}');
        $messageboba19 = fetch_value($boba19,'"message":"','"');
        if(strpos($boba19, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","(+) Message: ".$messageboba19);
        goto goride;
        }else{
        echo "\n".color("green","(+) Message: ".$messageboba19);
        goride:
        echo "\n";
        echo "\n".color("yellow","Mencoba Claim Voucher Gofood");
        echo "\n".color("yellow","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(2);
        }
        $goride = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2107"}');
        $message1 = fetch_value($goride,'"message":"','"');
        echo "\n".color("green","(+) Message: ".$message1);
        echo "\n";
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
         $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
          $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
           $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
            $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
            echo "\n";
        echo "\n".color("yellow","Total Voucher ".$total." : ");
        echo color("green","1. ".$voucher1);
        echo "\n".color("green","                     2. ".$voucher2);
        echo "\n".color("green","                     3. ".$voucher3);
        echo "\n".color("green","                     4. ".$voucher4);
        echo "\n".color("green","                     5. ".$voucher5);
        echo "\n".color("green","                     6. ".$voucher6);
        echo "\n".color("green","                     7. ".$voucher7);
        echo "\n".color("green","                     8. ".$voucher8);
        echo "\n".color("green","                     9. ".$voucher9);
        echo "\n".color("green","                     10. ".$voucher10);
        echo "\n".color("green","                     11. ".$voucher11);
        echo"\n";
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
        $expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
        $expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
        $expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
        $expired11 = getStr1('"expiry_date":"','"',$cekvoucher,'11');
         }
         
        }
        setpin:
         echo "\n".color("nevy","SET Pin kh ? y/n : ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("green","+++++++++++++++ Pin Anda = 123789 +++++++++++++++")."\n";
         $data2 = '{"pin":"123789"}';
                          $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo color("nevy","Input OTP Pin : ");
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         echo "\n";
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }
         }else{
            echo color("red","Otp yang anda input salah");
            echo"\n==================================\n\n";
            echo color("yellow","Silahkan input kembali\n");
            goto otp;
            }
         }else{
         echo color("red","Nomor sudah teregistrasi");
         echo"\n==================================\n\n";
         echo color("yellow","Silahkan registrasi kembali\n");
         goto ulang;
         }
//  }

// echo change()."\n";


