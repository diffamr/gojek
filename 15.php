<?php
date_default_timezone_set('Asia/Jakarta');
include "function2.php";
echo color("green","Input Token : ");
$token = trim(fgets(STDIN));
echo "\n".color("white","Claim Gofood 15k kh ? y/n : ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("nevy","+++++++++++++++ Claim Gofood 15k +++++++++++++++");
        echo "\n".color("yellow","Mencoba Claim Voucher Gofood");
        echo "\n".color("yellow","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(15);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2107"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green"," Message: ".$message);
        }else{
        echo "\n".color("green"," Message: ".$message);
        sleep(5);
        }
        echo "\n".color("yellow","Mencoba Claim Voucher Gofood");
        echo "\n".color("yellow","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(2);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2107"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green"," Message: ".$message);
        }else{
        echo "\n".color("green"," Message: ".$message);
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