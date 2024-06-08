<?php
  require_once __DIR__ . '/vendor/autoload.php';
  
  // debug
  error_reporting(-1);
  ini_set('display_errors', 'On');
  
  // Channel secret - (from https://developers.line.me/console/)
  $token = 'cyhk4oo4d9/u6W3tYZlF5DDR0p3cMOe9aOJb91SbpyBB2LBQ4vqdJrE0CKoAlCHJZvdPtVSaE3PqFhoGT+m79r8JAQ2T7jNUCSqELXoUb9OPZNmQO9afNURfbhavK9lij4ue+Wfpp9mBnVgxlc0OkQdB04t89/1O/w1cDnyilFU=';
  // $token = $_POST['token'];
  
  // Channel access token - (from https://developers.line.me/console/)
  $secret = 'f2c13425c9ee4f90d8728b996c2a1a92';
  
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
            "altText" => "Booking",
            "contents" => [
              "type" => "bubble",
              // "header" => [
              //   "type" => "box",
              //   "layout" => "vertical",
              //   "contents" => [
              //     [
              //       "type"=> "image",
              //       "url"=> "https://sv1.picz.in.th/images/2023/02/08/L5se4z.jpg",
              //       "size"=> "full",
              //       "aspectMode"=> "cover",
              //       "margin"=> "none",
              //       "align"=> "center",
              //       "backgroundColor"=> "#044383",
              //       "offsetTop"=> "none",
              //       "offsetBottom"=> "none",
              //       "offsetStart"=> "none",
              //       "aspectRatio"=> "31:15",
              //       "position"=> "absolute",
              //       "offsetEnd"=> "none",
              //       "gravity"=> "center"
              //     ]
              //   ],
              //   "spacing"=> "none",
              //   "margin"=> "none",
              //   "height"=> "100px",
              //   "justifyContent"=> "flex-end"
              // ],
              "body" => [
                "type" => "box",
                "layout" => "vertical",
                "spacing" => "md",
                "contents" => [
                  [
                    "type" => "text",
                    "text" => "นัดหมาย",
                    "wrap" => true,
                    "weight" => "bold",
                    "size" => "lg",
                    "margin" => "none"
                  ],
                  [
                    "type" => "box",
                    "layout" => "vertical",
                    "margin" => "xs",
                    "spacing" => "xs",
                    "contents" => [
                      [
                        "type" => "box",
                        "layout" => "baseline",
                        "spacing" => "sm",
                        "contents" => [
                          [
                            "type" => "text",
                            "text" => "ลูกค้า :",
                            "size" => "sm",
                            "flex" => 2,
                            "margin" => "none"
                          ],
                          [
                            "type" => "text",
                            "text" => $request_array['name'],
                            "wrap" => true,
                            "size" => "md",
                            "color" => "#000000",
                            "flex" => 8,
                            "weight" => "regular",
                            "decoration" => "none",
                            "align" => "start"
                          ]
                        ],
                        "margin" => "none"
                      ],
                      [
                        "type" => "box",
                        "layout" => "baseline",
                        "spacing" => "sm",
                        "contents" => [
                          [
                            "type" => "text",
                            "text" => "ผลิดภัณฑ์ :",
                            "size" => "sm",
                            "flex" => 2,
                            "margin" => "none"
                          ],
                          [
                            "type" => "text",
                            "text" => $request_array['packagename'],
                            "wrap" => true,
                            "size" => "md",
                            "color" => "#000000",
                            "flex" => 8,
                            "weight" => "regular",
                            "decoration" => "none",
                            "align" => "start"
                          ]
                        ],
                        "margin" => "none"
                      ],
                      [
                        "type" => "box",
                        "layout" => "baseline",
                        "spacing" => "sm",
                        "contents" => [
                          [
                            "type" => "text",
                            "text" => "วันที่นัด :",
                            "size" => "sm",
                            "flex" => 2,
                            "margin" => "none"
                          ],
                          [
                            "type" => "text",
                            "text" => $request_array['date'],
                            "wrap" => true,
                            "size" => "md",
                            "color" => "#044383",
                            "flex" => 8,
                            "weight" => "regular",
                            "decoration" => "none"
                          ]
                        ]
                      ],
                      [
                        "type" => "box",
                        "layout" => "baseline",
                        "spacing" => "sm",
                        "contents" => [
                          [
                            "type" => "text",
                            "text" => "เาลานัด :",
                            "size" => "sm",
                            "flex" => 2,
                            "margin" => "none"
                          ],
                          [
                            "type" => "text",
                            "text" =>  $request_array['time'],
                            "wrap" => true,
                            "size" => "md",
                            "color" => "#044383",
                            "flex" => 8,
                            "weight" => "regular"
                          ]
                        ]
                      ],
                    ],
                    "borderWidth" => "none",
                    "borderColor" => "#D5EAFF"
                  ]
                ],
              ],
              // "footer" => [
              //   "type" => "box",
              //   "layout" => "vertical",
              //   "contents" => [
              //     [
              //       "type" => "image",
              //       "url" => "https://sv1.picz.in.th/images/2023/02/08/L52v2N.jpg",
              //       "size" => "full",
              //       "aspectRatio" => "18:4",
              //       "aspectMode" => "cover",
              //       "margin" => "none",
              //       "offsetTop" => "none",
              //       "offsetBottom" => "none",
              //       "offsetStart" => "none",
              //       "position" => "absolute",
              //       "align" => "center",
              //       "gravity" => "center",
              //       "offsetEnd" => "none"
              //     ]
              //   ],
              //   "spacing" => "none",
              //   "margin" => "none",
              //   "offsetEnd" => "none",
              //   "offsetBottom" => "none",
              //   "height" => "65px",
              //   "borderColor" => "#576975"
              // ],
              "styles" => [
                "footer" => [
                  "backgroundColor" => "#576975",
                  "separator" => true
                ]
              ]
            ]
          ]
        ]
      ];

      pushMsg($arrayHeader,$arrayPostData);
   }elseif ($message == "text"){
     $arrayPostData = [
       "to" => $request_array['id'],
       "messages" => [
         [
           "type" => "text",
           "text" => "แจ้งเตือนการจองนัดหมาย \nลูกค้า : ". $request_array['name'] ."\nอีเมล์ : ".$request_array['email']."\nเบอร์โทร : ". $request_array['mobile'] ."\nผลิตภัณฑ์ : ".$request_array['packagename']."\nวันนัด : ".$request_array['date']."\nเวลานัด : ".$request_array['time']
         ],
         [
          "type" => "text",
          "text" => "คุณยืนยันการจองนัดหมายนี้  ใช่หรือไม่?",
          "quickReply"=> [
            "items"=> [
              [
                "type"=> "action",
                "action"=> [
                  "type"=> "message",
                  "label"=> "Confirm",
                  "text" => "Confirm"
                ]
              ]
            ]
          ]
        ]
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
