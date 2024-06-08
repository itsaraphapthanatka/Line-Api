<?php
  require_once __DIR__ . '/vendor/autoload.php';
  
  // debug
  error_reporting(-1);
  ini_set('display_errors', 'On');
  
  // Channel secret - (from https://developers.line.me/console/)
  $token = 'fmgZS5qsjPSo77mc0WtKxi0E7vwp4T136BpPXugDxVUvku2LocT3TP6djzPQ2sCa1FEFHpRiuukRsHwIeTRYlMehPS0qXPXPhIOt+SzfExqP93qAJKl2Mj4fJF7TFYalFjEdElvMwND7Zr9IhYQ49wdB04t89/1O/w1cDnyilFU=';
  // $token = $_POST['token'];
  
  // Channel access token - (from https://developers.line.me/console/)
  $secret = '6405f946a2fffc5af226887250330b87';
  
  // connect key setup
  $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($token);
  $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $secret]);
  
  $request = file_get_contents('php://input');   // Get request content
  $request_array = json_decode($request, true);   // Decode JSON to Array
  $arrayHeader = array();
  $arrayHeader[] = "Content-Type: application/json";
  $arrayHeader[] = "Authorization: Bearer {$token}";
// // if(isset($_POST['to']) && trim($_POST['to']) != '' && isset($_POST['text']) && trim($_POST['text']) != ''){
  //   if(trim($request_array['id']) != ''){
  //   // check for send message only
  //   $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($request_array['text']);
  //   $response = $bot->pushMessage($request_array['id'], $textMessageBuilder);
  
  //   // check status sending line api
  //   if($response->isSucceeded()){
    //     echo "true";
    //     return;
    //   }else{
    //     echo "false";
    //   }
    echo $request_array['type'];
    $message = $request_array['type'];
    $n = 0;
    if($message == "message"){
      $arrayPostData['to'] = $request_array['id'];
      // $arrayPostData['messages'][0]['type'] = "text";
      // $arrayPostData['messages'][0]['text'] = $request_array['text'];
      // $arrayPostData['messages'][1]['type'] = "sticker";
      // $arrayPostData['messages'][1]['packageId'] = "2";

      // $arrayPostData['messages'][1]['stickerId'] = "34";z
      $arrayPostData['messages'][0]['type'] = "flex";
      $arrayPostData['messages'][0]['altText'] = $request_array['text'];
      $arrayPostData['messages'][0]['contents']['type'] =  "bubble";
      $arrayPostData['messages'][0]['contents']['direction'] =  "ltr";
      $arrayPostData['messages'][0]['contents']['header']['type'] =  "box";
      $arrayPostData['messages'][0]['contents']['header']['layout'] =  "vertical";
      $arrayPostData['messages'][0]['contents']['header']['contents'][0]['type'] =  "text";
      $arrayPostData['messages'][0]['contents']['header']['contents'][0]['text'] =  $request_array['text'];
      $arrayPostData['messages'][0]['contents']['header']['contents'][0]['size'] =  "lg";
      $arrayPostData['messages'][0]['contents']['header']['contents'][0]['align'] =  "start";
      $arrayPostData['messages'][0]['contents']['header']['contents'][0]['weight'] =  "bold";
      $arrayPostData['messages'][0]['contents']['header']['contents'][0]['color'] =  "#009813";

      $arrayPostData['messages'][0]['contents']['header']['contents'][1]['type'] =  "text";
      $arrayPostData['messages'][0]['contents']['header']['contents'][1]['text'] =  $request_array['text2'];
      $arrayPostData['messages'][0]['contents']['header']['contents'][1]['size'] =  "lg";
      $arrayPostData['messages'][0]['contents']['header']['contents'][1]['weight'] =  "bold";
      $arrayPostData['messages'][0]['contents']['header']['contents'][1]['color'] =  "#000000";

      // $arrayPostData['messages'][0]['contents']['header']['contents'][2]['type'] =  "text";
      // $arrayPostData['messages'][0]['contents']['header']['contents'][2]['text'] =  $request_array['pay'];
      // $arrayPostData['messages'][0]['contents']['header']['contents'][2]['size'] =  "lg";
      // $arrayPostData['messages'][0]['contents']['header']['contents'][2]['weight'] =  "bold";
      // $arrayPostData['messages'][0]['contents']['header']['contents'][2]['color'] =  "#000000";

      // $arrayPostData['messages'][0]['contents']['body']['type'] =  "box";
      // $arrayPostData['messages'][0]['contents']['body']['layout'] =  "vertical";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][0]['type'] =  "separator";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][0]['color'] =  "#C3C3C3";

      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['type'] =  "box";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['layout'] =  "baseline";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['margin'] =  "lg";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['contents'][0]['type'] =  "text";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['contents'][0]['text'] =  $request_array['detail'];
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['contents'][0]['align'] =  "start";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['contents'][0]['color'] =  "#000000";
      
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['contents'][1]['type'] =  "text";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['contents'][1]['text'] =   $request_array['unit'];
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['contents'][1]['align'] =  "end";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][1]['contents'][1]['color'] =  "#000000";

      // $arrayPostData['messages'][0]['contents']['body']['contents'][2]['type'] =  "separator";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][2]['margin'] =  "lg";
      // $arrayPostData['messages'][0]['contents']['body']['contents'][2]['color'] =  "#C3C3C3";
// 
//            $arrayPostData['messages'][0]['contents']['footer']['type'] =  "box";
//            $arrayPostData['messages'][0]['contents']['footer']['layout'] =  "horizontal";
//            $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['type'] =  "text";
//            $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['text'] =  "View Details";
//            $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['size'] =  "lg";
//            $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['align'] =  "start";
//            $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['color'] =  "#0084B6";
//            $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['action']['type'] =  "uri";
//            $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['action']['label'] =  "View Detail";
//            $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['action']['uri'] =  $request_array['base_url'];
      
      
      var_dump($arrayPostData);
    if($n==0){
    pushMsg($arrayHeader,$arrayPostData);
    }

    $n++;
    echo true;
   }elseif ($message == "flex") {

   $arrayPostData = [
    "to" => $request_array['id'],
    "messages" => [
    [
      "type" => "flex",
      "altText" => "ขอขอบคุณที่ท่านได้ทำการจองนัดหมาย",
      "contents" => [
      "type" => "bubble",
      "hero" => [
        "type" => "image",
        "url" => "lineoa-appoint.lumpsum.cloudbotpush/theme/dist/assets/media/auth/book.png",
        "size" => "full",
        "aspectRatio" => "20:13",
        "aspectMode" => "fit",
        "action" => [
        "type" => "uri",
        "label" => "Action",
        "uri" => "https://linecorp.com/"
        ]
      ],
      "body" => [
        "type" => "box",
        "layout" => "vertical",
        "spacing" => "md",
        "contents" => [
        [
        "type" => "text",
        "text" => "BookOK Optical Shop",
        "weight" => "bold",
        "size" => "xl",
        "align" => "center",
        "contents" => []
        ],
        [
        "type" => "text",
        "text" => "ขอขอบพระคุณที่ท่านจองนัดหมายเพื่อวัดสายตากับเรา",
        "weight" => "bold",
        "size" => "md",
        "align" => "center",
        "gravity" => "center",
        "margin" => "lg",
        "wrap" => true,
        "contents" => []
        ],
        [
        "type" => "box",
        "layout" => "vertical",
        "margin" => "xxl",
        "contents" => [
        [
          "type" => "spacer"
        ]
        ]
        ]
        ]
      ]
      ]
      ],
      [
      "type" => "text",
      "text" => "รบกวนตรวจสอบความถูกต้องของข้อมูลการจอง\nคุณ ".$request_array['name']."\nวันที่: {$request_array['date']} \nเวลา: {$request_array['time']}"
      ],
      // [
      // "type" => "flex",
      // "altText" => "ขอขอบคุณที่ท่านได้ทำการจองนัดหมาย",
      // "contents" => [
      // "type" => "bubble",
      // "hero" => [
      //   "type" => "image",
      //   "url" => "lineoa-appoint.lumpsum.cloudbotpush//theme/dist/assets/media/auth/book.png",
      //   "size" => "full",
      //   "aspectRatio" => "20:13",
      //   "aspectMode" => "fit",
      //   "action" => [
      //   "type" => "uri",
      //   "label" => "Action",
      //   "uri" => "https://linecorp.com/"
      //   ]
      // ],
      // "body" => [
      //   "type" => "box",
      //   "layout" => "vertical",
      //   "spacing" => "md",
      //   "contents" => [
      //   [
      //   "type" => "text",
      //   "text" => "BookOK Optical Shop",
      //   "weight" => "bold",
      //   "size" => "xl",
      //   "align" => "center",
      //   "contents" => []
      //   ],
      //   [
      //   "type" => "text",
      //   "text" => "รบกวนทำการชำระค่ามัดจำมาที่บัญชีธนาคารกสิกรไทย หมายเลขบัญชี 7362830839 ชื่อบัญชี นายจิรายุ ก. และส่งสลิปยืนยันทางแชทภายใน 20 นาทีครับ ถ้าเกินระยะเวลาที่กำหนด ระบบจะทำการยกเลิกการนัดหมายของคุณลูกค้าโดยอัตโนมัติ",
      //   "weight" => "regular",
      //   "size" => "sm",
      //   "align" => "center",
      //   "gravity" => "center",
      //   "margin" => "lg",
      //   "wrap" => true,
      //   "contents" => []
      //   ],
      //   [
      //   "type" => "box",
      //   "layout" => "vertical",
      //   "margin" => "xxl",
      //   "contents" => [
      //   [
      //     "type" => "spacer"
      //   ]
      //   ]
      //   ]
      //   ]
      // ]
      // ]
      // ],
    ]
  ];


  pushMsg($arrayHeader,$arrayPostData);
   }
   function pushMsg($arrayHeader,$arrayPostData){
    $strUrl = "https://api.line.me/v2/bot/message/push";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
    print_r($result);
   }
   function pushMsgjson($arrayHeader,$arrayPostData){
  

  $data = [
    'messages' => [$arrayPostData]
  ];
  $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
  // echo $data;
    $strUrl = "https://api.line.me/v2/bot/message/push";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
   }
   exit;
  
   
  ?>
