<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');

$channelAccessToken = '/lVVIqrqKviiUWyOSz+tb+yFQqJtaa8HNMLE3fbw1b6RKuml+KooV8F73Gm76nhKPnhd9tVLwcX/SoTiQ91o+WytapLvkDuXfQz6ZzxAnXLWMlK6OPv1XRmiLj308Hc4yenYjOTFF/As8UF59izRAQdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'bbd40ae0c329ee4732e0b24c1148a37a';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            $replyMsg = $message['text'];
            if(strpos($message['text'], '賺錢') !== false){
                $replyMsg = '近三月績效排行前三名為...';
                $reply = $simpleReply;
            }
            
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            $reply
                            )
                        )
                    ));
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
$simpleReply= array('type' => 'text','text' => $replyMsg);
$fundList=array (
  'type' => 'carousel',
  'actions' => 
  array (
  ),
  'columns' => 
  array (
    0 => 
    array (
      'title' => '復華中小精選基金',
      'text' => '淨值81.49,近三個月報酬率17.81',
      'actions' => 
      array (
        0 => 
        array (
          'type' => 'postback',
          'label' => '加入觀察清單',
          'text' => '將ＸＸＸ基金加入網銀觀察清單',
          'data' => 'shoppingCart',
        ),
        1 => 
        array (
          'type' => 'postback',
          'label' => '立即申購',
          'text' => '立即申購ＸＸＸ基金',
          'data' => 'buy',
        ),
        2 => 
        array (
          'type' => 'uri',
          'label' => '看更多詳細資訊',
          'uri' => 'https://www.esunbank.com.tw/bank/personal/wealth/fund/ranking',
        ),
      ),
    ),
    1 => 
    array (
      'title' => '統一台灣動力基金',
      'text' => '淨值81.49,近三個月報酬率17.81',
      'actions' => 
      array (
        0 => 
        array (
          'type' => 'message',
          'label' => '動作 1',
          'text' => '動作 1',
        ),
        1 => 
        array (
          'type' => 'message',
          'label' => '動作 2',
          'text' => '動作 2',
        ),
        2 => 
        array (
          'type' => 'message',
          'label' => '動作 3',
          'text' => '動作 3',
        ),
      ),
    ),
    2 => 
    array (
      'title' => '復華全方位基金',
      'text' => '淨值81.49,近三個月報酬率17.81',
      'actions' => 
      array (
        0 => 
        array (
          'type' => 'message',
          'label' => '動作 1',
          'text' => '動作 1',
        ),
        1 => 
        array (
          'type' => 'message',
          'label' => '動作 2',
          'text' => '動作 2',
        ),
        2 => 
        array (
          'type' => 'message',
          'label' => '動作 3',
          'text' => '動作 3',
        ),
      ),
    ),
  ),
);
