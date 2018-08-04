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
$test = array (
  'type' => 'template',
  'altText' => 'this is a carousel template',
  'template' => 
  array (
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
  ),
);

$rebalance = array (
  'type' => 'template',
  'altText' => 'this is a buttons template',
  'template' => 
  array (
    'type' => 'buttons',
    'actions' => 
    array (
      0 => 
      array (
        'type' => 'postback',
        'label' => '查看基金現況',
        'text' => '查看基金現況',
        'data' => 'check',
      ),
      1 => 
      array (
        'type' => 'postback',
        'label' => '申購/贖回',
        'text' => '我要申購/贖回',
        'data' => 'buyOrSell',
      ),
      2 => 
      array (
        'type' => 'postback',
        'label' => '看其他市場',
        'text' => '動作 3',
        'data' => '資料 3',
      ),
      3 => 
      array (
        'type' => 'uri',
        'label' => '看市場分析',
        'uri' => 'https://www.esunbank.com.tw/event/wealth/epaper/20180730/index.html',
      ),
    ),
    'thumbnailImageUrl' => 'https://www.esunbank.com.tw/event/wealth/fundworld/images/sunny.svg',
    'title' => '市場波動通知',
    'text' => '您的基金庫存 [復華全方位基金] 所屬市場近期有波動：從悲觀轉向樂觀。',
  ),
);
$fundinfo=array (
  'type' => 'template',
  'altText' => 'this is a buttons template',
  'template' => 
  array (
    'type' => 'buttons',
    'actions' => 
    array (
      0 => 
      array (
        'type' => 'postback',
        'label' => '申購/贖回',
        'text' => '動作 1',
        'data' => '資料 1',
      ),
      1 => 
      array (
        'type' => 'postback',
        'label' => '加入觀察清單',
        'text' => '動作 2',
        'data' => '資料 2',
      ),
      2 => 
      array (
        'type' => 'uri',
        'label' => '詳細資訊',
        'uri' => 'https://www.esunbank.com.tw/bank/personal/wealth/fund/search?localpath=/w/wr/wr01.djhtm&query=a=ACFH15-2916',
      ),
    ),
    'title' => '復華全方位基金'
    'text' => '最新淨值 (2018/8/3)：TWD 33.01\n三個月績效：18.27%\n風險報酬等級：RR4',
  ),
);


foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $replyMsg = $message['text'];
                    if(strpos($message['text'], '賺錢') !== false){
                        $replyMsg = '近三月績效排行前三名為......';
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => $replyMsg
                                ),
                                $test
                                
                            )
                        ));
                    }
                    if(strpos($message['text'], '1313') !== false){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                $rebalance
                                
                            )
                        ));
                    }
                    /*else{
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => $replyMsg
                                )
                            )
                        ));
                    }*/
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
            case 'postback':
              //$message = $event['postback.data'];
              /*if($message['data']=='check'){
                     $replyMsg = '查看復華基金';
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $replyMsg
                            ),
                           $test
                          
                         )
                    ));                   
              }*/
              if($event['postback']['data']=='check'){
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $fundinfo
                            )
                          
                         )
                    )); 
              }      
              break;

        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};


