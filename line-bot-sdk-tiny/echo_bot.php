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
            }
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $replyMsg
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


