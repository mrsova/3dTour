<?php

if(!empty($_POST) ){
  // echo json_encode($_POST);
    $mail_thema = "Интернет заказ с сайта antidron";
    $date = date('d-m-Y H:i:s');
    //формирование описания
    $description =
        "Интернет заказ с сайта antidron
        <br/>Дата/время оформления: ".$date.
        "<br/>ФИО: ".strip_tags($_POST['uname'])." ".strip_tags($_POST['lastname']).
        "<br/>Телефон: ".strip_tags($_POST['phone']).
        "<br/>E-mail: ".strip_tags($_POST['email']).
        "<br/>Сообщение ".strip_tags($_POST['message']);
    $from = strip_tags($_POST['emailto']);
    $emailto = strip_tags($_POST['emailto']);
    $headers="Content-Type: text/html; charset=utf-8\nFrom: {$from}\n";
   if(mail($emailto, $mail_thema, $description, $headers)){
       echo json_encode(array('status'=>'ok'));
   }else{
       echo json_encode(array('status'=>'fail'));
   }
}
