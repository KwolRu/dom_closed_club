<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/crest.php");
$group_id = '-4698239918';
$token = '7926863498:AAGWC_E-elcyJ1TFT1LfyRIKsZJUGXakvg8';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8') : null;
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : null;
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : null;

    if ($phone) {
        $message = "*Новая заявка:*\n";
        $message .= "*Телефон:* $phone\n";
        if ($name) {
            $message .= "*Имя:* $name\n";
        }
        if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message .= "*Email:* $email\n";
        }

        

        $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$group_id&text=" . urlencode($message) . "&parse_mode=Markdown";

        $fields=array("CATEGORY_ID"=>0,"SOURCE_ID"=>"WEB");
        $contact=array();
        
        if(empty($name))  
        {
            $fields["TITLE"]="Заявка с сайта dom-club.com ".$phone." [".date("d.m.Y H:i", time())."]"; 
            $contact["NAME"]="Контакт с сайта dom-club.com [".$phone."]";
        }
        else 
        {
       
        $fields["TITLE"]="Заявка с сайта dom-club.com ".$name." ".$phone." [".date("d.m.Y H:i", time())."]"; 
        $contact["NAME"]=$name;
        }
        if(!empty($email)) $contact["EMAIL"]=array(array("VALUE"=>$email, "VALUE_TYPE"=>"WORK"));
        if(!empty($phone)) $contact["PHONE"]=array(array("VALUE"=>$phone, "VALUE_TYPE"=>"WORK"));

        $cid=0;
        $result = CRest::call('crm.duplicate.findbycomm', [
            'type' => 'PHONE',
            'values' => [$phone]
        ]);

        if(@is_array($result['result']['CONTACT']))
        {
            $cid=intval($result['result']['CONTACT'][0]);
        }
        else
        {
            $result = CRest::call(
                'crm.contact.add',
                [
                    'FIELDS' => $contact
                ]);

                $cid=intval($result["result"]);
        }

        if($cid>0)
        {
            $fields["CONTACT_ID"]=$cid;
            $result = CRest::call(
                'crm.deal.add',
                [
                    'FIELDS' => $fields
                ]);
        }

       


        $response = file_get_contents($url);

        if ($response) {
            header('Location: thanks.php');
            exit;
        } else {
            echo 'Ошибка отправки сообщения';
        }
    } else {
        echo 'Телефон обязателен для заполнения';
    }
} else {
    echo 'Неверный метод запроса';
}
?>
