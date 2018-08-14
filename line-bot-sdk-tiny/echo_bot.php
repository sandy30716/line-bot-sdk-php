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
$channelAccessToken = 'WMHQW5NCy3kTj42HAawh2ACvAHdhl3rWF0yjkMmm+ls0O5+RLzm7TmneIwqOTIiMF5qH6f3b0CMBxkMO9BJptWZUEwQxm7yasa4k7ozhQRDFqtS31/1OB7Ep9m8iSQ8XkekBXPFiss4vL/Q3XgS3nwdB04t89/1O/w1cDnyilFU=';
$channelSecret = '18844738320293975f367ec929d3fa68';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);

function emoticon($code){
  $bin = hex2bin(str_repeat('0', 8 - strlen($code)) . $code);
  // UTF8へエンコード
  $emoticon =  mb_convert_encoding($bin, 'UTF-8', 'UTF-32BE');  
  return $emoticon;

}


$code = '100078';
// 16進エンコードされたバイナリ文字列をデコード
$bin = hex2bin(str_repeat('0', 8 - strlen($code)) . $code);
// UTF8へエンコード
$emoticon =  mb_convert_encoding($bin, 'UTF-8', 'UTF-32BE');

//配列などに格納して使う
//$text[] =  array("type" => "text","text" => $emoticon);


class Fund
{
    public $name;
    public $performance='';
    public $level;
    public $status;
    public $value='';
    public $code;
    public $uri;
    public function __toString ( ){
      return '近三個月績效：'.$this->performance.',淨值：'.$this->value.',風險等級：'.$this->level;
    }
}

$fund1 = new Fund();
$fund1->name = '復華全方位基金';
$fund1->code = '2916';
$fund1->performance = '18.27%';
$fund1->level = 'RR4';
$fund1->status = '樂觀';
$fund1->value = 'TWD 33.01';
$fund1->uri = 'https://www.esunbank.com.tw/bank/personal/wealth/fund/search?localpath=/w/wr/wr01.djhtm&query=a=ACFH15-2916';

$fund2 = new Fund();
$fund2->name = 'NB美國多元企業機會基金';
$fund2->code = 'ar13';
$fund2->performance = '6.32%';
$fund2->level = 'RR4';
$fund2->status = '樂觀';
$fund2->value = 'USD 15.13';
$fund2->uri = 'https://www.esunbank.com.tw/bank/personal/wealth/fund/search?localpath=/w/wb/wb01.djhtm&query=a=NBT74-AR13';

$fund3 = new Fund();
$fund3->name = '富達拉丁美洲基金';
$fund3->code = 'aa41';
$fund3->performance = '-8.68%';
$fund3->level = 'RR5';
$fund3->status = '樂觀';
$fund3->value = 'USD 33.19';
$fund3->uri = 'https://www.esunbank.com.tw/bank/personal/wealth/fund/search?localpath=/w/wb/wb01.djhtm&query=a=FTZ07-AA41';

$fund4 = new Fund();
$fund4->name = '富蘭克林坦伯頓全球投資系列新興國家固定收益基金';
$fund4->code = 'kk41';
$fund4->performance = '-3.68%';
$fund4->level = 'RR3';
$fund4->status = '樂觀';
$fund4->value = 'USD 8.2';
$fund4->uri = 'https://www.esunbank.com.tw/bank/personal/wealth/fund/search?localpath=/w/wb/wb01.djhtm&query=a=FLZB8-KK41';

$fund5 = new Fund();
$fund5->name = '貝萊德世界礦業基金';
$fund5->code = 'ag25';
$fund5->performance = '-6.34%';
$fund5->level = 'RR4';
$fund5->status = '樂觀';
$fund5->value = 'USD 37.7';
$fund5->uri = 'https://www.esunbank.com.tw/bank/personal/wealth/fund/search?localpath=/w/wb/wb01.djhtm&query=a=SHZ19-AG25';

$fund6 = new Fund();
$fund6->name = '安聯收益成長基金';
$fund6->code = 'bb39';
$fund6->performance = '3.31%';
$fund6->level = 'RR3';
$fund6->status = '樂觀';
$fund6->value = 'USD 9.09';
$fund6->uri = 'https://www.esunbank.com.tw/bank/personal/wealth/fund/search?localpath=/w/wb/wb01.djhtm&query=a=TLZ64-BB39';

$funds = array(2916=>$fund1,ar13=>$fund2,aa41=>$fund3,kk41=>$fund4,ag25=>$fund5,bb39=>$fund6);
$random_keys=array_rand($funds);
$randomFund = $funds[$random_keys];

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
  'altText' => '市場波動通知',
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
        'data' => 'check:'.$randomFund->code,
      ),
      1 => 
      array (
        'type' => 'postback',
        'label' => '申購/贖回',
        'text' => '我要申購/贖回',
        'data' => 'buyOrSell:'.$randomFund->code,
      ),
      2 => 
      array (
        'type' => 'postback',
        'label' => '看其他市場',
        'text' => '看其他市場',
        'data' => 'market',
      ),
      3 => 
      array (
        'type' => 'postback',
        'label' => '看熱門基金',
        'text' => '看熱門基金',
        'data' => 'rank',
      ),
    ),
    'thumbnailImageUrl' => 'https://www.esunbank.com.tw/event/wealth/fundworld/images/sunny.svg',
    'title' => '市場波動通知',
    'text' => '您的基金庫存 ['.$randomFund->name.'] 所屬市場近期有波動：從悲觀轉向樂觀。',
  ),
);

$redemption = array (
  'type' => 'template',
  'altText' => '贖回入帳通知',
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
        'data' => 'check:'.$randomFund->code,
      ),
      1 => 
      array (
        'type' => 'postback',
        'label' => '申購/贖回',
        'text' => '我要申購/贖回',
        'data' => 'buyOrSell:'.$randomFund->code,
      ),
      2 => 
      array (
        'type' => 'postback',
        'label' => '看其他市場',
        'text' => '看其他市場',
        'data' => 'market',
      ),
      3 => 
      array (
        'type' => 'postback',
        'label' => '看熱門基金',
        'text' => '看熱門基金',
        'data' => 'rank',
      ),
    ),
    'thumbnailImageUrl' => 'https://geneonline.news/wp-content/uploads/2015/10/fund.jpg',
    'title' => '贖回入帳通知',
    'text' => '您的贖回的基金 ['.$randomFund->name.'] 贖回款 131,313 元已入帳至您的帳戶 13131313131313。',
  ),
);

$takeProfit = array (
  'type' => 'template',
  'altText' => '基金停利通知',
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
        'data' => 'check:'.$randomFund->code,
      ),
      1 => 
      array (
        'type' => 'postback',
        'label' => '申購/贖回',
        'text' => '我要申購/贖回',
        'data' => 'buyOrSell:'.$randomFund->code,
      ),
      2 => 
      array (
        'type' => 'postback',
        'label' => '看其他市場',
        'text' => '看其他市場',
        'data' => 'market',
      ),
      3 => 
      array (
        'type' => 'postback',
        'label' => '看熱門基金',
        'text' => '看熱門基金',
        'data' => 'rank',
      ),
    ),
    'thumbnailImageUrl' => 'https://www.forexboat.com/wp-content/uploads/2016/10/Take-Profit-e1476972246124.jpg',
    'title' => '基金停利通知',
    'text' => '您的基金 ['.$randomFund->name.'] 已達您設定的停利點。',
  ),
);

$notifications = array($rebalance,$redemption,$takeProfit);
$random_keys=array_rand($notifications);
$randomNotification = $notifications[$random_keys];

$fundinfo=array (
  'type' => 'template',
  'altText' => 'this is',
  'template' => 
  array (
    'type' => 'buttons',
    'actions' => 
    array (
      0 => 
      array (
        'type' => 'uri',
        'label' => '詳細資訊',
        'uri' => 'https://www.esunbank.com.tw/bank/personal/wealth/fund/search?localpath=/w/wr/wr01.djhtm&query=a=ACFH15-2916',
      ),
      1 => 
      array (
        'type' => 'postback',
        'label' => '申購',
        'text' => '申購',
        'data' => 'list',
      ),
      2 => 
      array (
        'type' => 'uri',
        'label' => '贖回',
        'uri' => 'https://ebank.esunbank.com.tw/index.jsp',
      ),
    ),
    'title' => '復華全方位基金',
    'text' => '最新淨值 (2018/8/3)：TWD 33.01 三個月績效：18.27% 風險報酬等級：RR4',
  ),
);
$buyOrSell=array (
  'type' => 'template',
  'altText' => '申購或贖回？',
  'template' => 
  array (
    'type' => 'confirm',
    'actions' => 
    array (
      0 => 
      array (
        'type' => 'postback',
        'label' => '申購',
        'text' => '我要申購',
        'data' => 'buy',
      ),
      1 => 
      array (
        'type' => 'uri',
        'label' => '贖回',
        'uri' => 'https://ebank.esunbank.com.tw/index.jsp',
      ),
    ),
    'text' => '您要申購或贖回？',
  ),
);
$list=array (
  'type' => 'text',
  'text' => '已將復華全方位基金加入網銀觀察清單，立即登入網銀申購'.emoticon('100050').'→https://ebank.esunbank.com.tw/index.jsp',
);
$market=array (
  'type' => 'template',
  'altText' => '看其他市場',
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
        'title' => '北美',
        'text' => '相對樂觀^_^',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => $funds[ar13]->name,
            'text' => '查看'.$funds[ar13]->name,
            'data' => 'check:ar13',
          ),
          1 => 
          array (
            'type' => 'postback',
            'label' => $funds[ar13]->name,
            'text' => '查看'.$funds[ar13]->name,
            'data' => 'check:ar13',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => '看更多北美市場基金',
            'uri' => 'https://www.esunbank.com.tw/event/wealth/fundworld/#America',
          ),
        ),
      ),
      1 => 
      array (
        'title' => '拉丁美洲',
        'text' => '中立>"<',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => $funds[aa41]->name,
            'text' => '查看'.$funds[aa41]->name,
            'data' => 'check:aa41',
          ),
          1 => 
          array (
            'type' => 'postback',
            'label' => $funds[aa41]->name,
            'text' => '查看'.$funds[aa41]->name,
            'data' => 'check:aa41',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => '看更多拉美市場基金',
            'uri' => 'https://www.esunbank.com.tw/event/wealth/fundworld/#LatinAmerica',
          ),
        ),
      ),
      2 => 
      array (
        'title' => '亞洲',
        'text' => '悲觀QAQ',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => $funds[2916]->name,
            'text' => '查看'.$funds[2916]->name,
            'data' => 'check:2916',
          ),
          1 => 
          array (
            'type' => 'postback',
            'label' => $funds[2916]->name,
            'text' => '查看'.$funds[2916]->name,
            'data' => 'check:2916',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => '看更多台灣市場基金',
            'uri' => 'https://www.esunbank.com.tw/event/wealth/fundworld/#Taiwan',
          ),
        ),
      ),
    ),
  ),
);

$rank=array (
  'type' => 'imagemap',
  'baseUrl' => 'https://i.imgur.com/P2Qquub.png?_ignored=',
  'altText' => '你的風險等級？',
  'baseSize' => 
  array (
    'width' => 1040,
    'height' => 276,
  ),
  'actions' => 
  array (
    0 => 
    array (
      'type' => 'message',
      'area' => 
      array (
        'x' => 17,
        'y' => 76,
        'width' => 268,
        'height' => 184,
      ),
      'text' => '我是積極型',
    ),
    1 => 
    array (
      'type' => 'message',
      'area' => 
      array (
        'x' => 290,
        'y' => 78,
        'width' => 240,
        'height' => 181,
      ),
      'text' => '我是成長型',
    ),
    2 => 
    array (
      'type' => 'message',
      'area' => 
      array (
        'x' => 542,
        'y' => 81,
        'width' => 259,
        'height' => 175,
      ),
      'text' => '我是穩健型',
    ),
    3 => 
    array (
      'type' => 'message',
      'area' => 
      array (
        'x' => 810,
        'y' => 81,
        'width' => 226,
        'height' => 175,
      ),
      'text' => '我是保守型',
    ),
  ),
);

$popularRank1=array (
  'type' => 'template',
  'altText' => '基金清單',
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
        'title' => (string)$fund4->name,
        'text' => (string)$fund4,
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => '加入觀察清單',
            'text' => '加入觀察清單',
            'data' => 'list:'.$fund4->code,
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => '詳細資訊',
            'uri' => (string)$fund4->uri,
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => '看更多人氣基金',
            'uri' => 'https://www.esunbank.com.tw/event/wealth/popularrank/index.html',
          ),
        ),
      ),
      1 => 
      array (
        'title' => (string)$fund5->name,
        'text' => (string)$fund5,
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => '加入觀察清單',
            'text' => '加入觀察清單',
            'data' => 'list:'.$fund5->code,
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => '詳細資訊',
            'uri' => (string)$fund5->uri,
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => '看更多人氣基金',
            'uri' => 'https://www.esunbank.com.tw/event/wealth/popularrank/index.html',
          ),
        ),
      ),
      2 => 
      array (
        'title' => (string)$fund6->name,
        'text' => (string)$fund6,
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => '加入觀察清單',
            'text' => '加入觀察清單',
            'data' => 'list:'.$fund6->code,
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => '詳細資訊',
            'uri' => (string)$fund6->uri,
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => '看更多人氣基金',
            'uri' => 'https://www.esunbank.com.tw/event/wealth/popularrank/index.html',
          ),
        ),
      ),
    ),
  ),
);

$type = array (
  'type' => 'template',
  'altText' => '想知道大家都在關注哪些基金嗎？',
  'template' => 
  array (
    'type' => 'buttons',
    'actions' => 
    array (
      0 => 
      array (
        'type' => 'postback',
        'label' => '玉山精選人氣基金',
        'text' => '有哪些玉山精選人氣基金？',
        'data' => 'popular',
      ),
      1 => 
      array (
        'type' => 'postback',
        'label' => '波動最小',
        'text' => '我想看波動最小的',
        'data' => 'popular',
      ),
      2 => 
      array (
        'type' => 'postback',
        'label' => '近三月績效最好',
        'text' => '我想看績效最好的',
        'data' => 'popular',
      ),
    ),
    'title' => '熱門基金',
    'text' => '想知道大家都在關注哪些基金嗎？',
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
                    else if(strpos($message['text'], '1313') !== false){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                              array(
                                'type' => 'text',
                                'text' => 'N個月後'.emoticon('100077')
                              ),
                              $rebalance
                                
                            )
                        ));
                    }
                    else if(strpos($message['text'], 'hi') !== false){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                              array(
                                'type' => 'text',
                                'text' => '~~~~人氣基金~~~~'.emoticon('100077')
                              ),
                              $rank
                                
                            )
                        ));
                    }
                    else if(strpos($message['text'], '積極型') !== false){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                              array(
                                'type' => 'text',
                                'text' => '你較勇於嘗試新觀念新方法新事物，也願意利用風險較高或是新推出的金融商品作為投資工具，來獲取較高的報酬，屬於行為積極的理財投資者，具有較高的投資風險容忍度。儘管金融投資工具擁有高報酬、高風險的特性，但高風險卻不保證必然可獲得較高的投資報酬。建議在選擇理財投資工具時，除了高報酬率之外，也應該注意其風險高低，以免過於樂觀而忽略了所隱含的風險。以下人氣基金適合積極型的你：'
                              ),
                              $type
                                
                            )
                        ));
                    }
                    else if(strpos($message['text'], '成長型') !== false){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                              array(
                                'type' => 'text',
                                'text' => '你願意承受部分風險，追求資產能有成長的機會，個性較為積極主動，生活中願意嘗試新鮮的事物，對理財相關的產品接受度較高，在資產配置中可將共同基金列為資產成長主力，但也別忘了應保持持有部分的流動資金及定存，使資產在穩定中成長。以下人氣基金適合成長型的你：'
                              ),
                              $type
                                
                            )
                        ));
                    }
                    else if(strpos($message['text'], '穩健型') !== false){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                              array(
                                'type' => 'text',
                                'text' => '你願意承受稍高的風險，以獲取較高的報酬，但每當作一個決策時，必定會慎重評估其可能隱含的損失風險，風險承受度適中。建議可以多吸收各種投資理財或新金融商品的相關知識，以利在不同的經濟景氣循環下選擇適當的金融投資工具，達成理財目標。以下人氣基金適合穩健型的你：'
                              ),
                              $type
                                
                            )
                        ));
                    }
                    else if(strpos($message['text'], '保守型') !== false){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                              array(
                                'type' => 'text',
                                'text' => '你個性較穩重，期待投資能夠盡量保本並有穩定的回報，不輕易嘗試波動較大的金融投資工具，其實對金融投資工具而言，高報酬、高風險雖然是一體的兩面，但只要仔細瞭解不同金融投資商品的特質並規劃得當，納入一些相對風險較低的金融投資工具，將更能完成各項理財規劃。以下人氣基金適合保守型的你：'
                              ),
                              $type
                                
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
              $postbackData=$event['postback']['data'];
              if(strpos($postbackData, 'check') !== false){
                $pieces = explode(":", $postbackData);
                //$fundinfo[template][title]=$funds[$pieces[1]]->name;
                //$fundinfo[template][text]=$funds[$pieces[1]];
                $fundinfo[template][title]=(string)$funds[$pieces[1]]->name;
                $fundinfo[template][text]=(string)$funds[$pieces[1]];
                $code = (string)$pieces[1];
                //$fundinfo[template][actions][0][data]='buyOrSell:'.$code;
                $fundinfo[template][actions][1][data]='list:'.$code;
                $fundinfo[template][actions][0][uri]=(string)$funds[$pieces[1]]->uri;
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                                $fundinfo
                         )
                    )); 
              }  
              else if(strpos($postbackData, 'buyOrSell') !== false){
                    $pieces = explode(":", $postbackData);
                    $buyOrSell[template][actions][0][data]='buy:'.$pieces[1];
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                                $buyOrSell
                         )
                    )); 
              }
              else if((strpos($postbackData, 'buy') !== false) ||(strpos($postbackData, 'list') !== false)){
                    $pieces = explode(":", $postbackData);
                    $list[text]='已將['.$funds[$pieces[1]]->name.']加入網銀觀察清單，立即登入網銀申購→https://ebank.esunbank.com.tw/index.jsp';
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                                $list
                         )
                    )); 
              }
              else if($postbackData==='market'){
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                                $market
                         )
                    )); 
              }
              else if($postbackData==='popular'){
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                                $popularRank1
                         )
                    )); 
              }
              else if($postbackData==='rank'){
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                                $rank
                         )
                    )); 
              }

              break;

        case 'follow':
            $source = $event['source'];
            $replyMsg = 'hi!';
            $userId = $source['userId'];

            //get profile

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://api.line.me/v2/bot/profile/".$userId);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


            $headers = array();
            $headers[] = "Authorization: Bearer ".$channelAccessToken;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            $jsonResult = json_decode($result, true);
            $name = $jsonResult['displayName'];
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }

            curl_close ($ch);


                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                              array(
                                'type' => 'text',
                                'text' => 'Hello! '.$name
                              )
                                
                            )
                        ));
                    for($i=1;$i<4;$i++){
                      sleep(1);
                      $client->pushMessage(array(
                          'to' => (string)$userId,
                              'messages' => array(
                                array(
                                  'type' => 'text',
                                  'text' => $i.'個月後...'
                                ) 
                              )
                      ));             
                    }
                    $client->pushMessage(array(
                        'to' => (string)$userId,
                            'messages' => array(
                              array(
                                'type' => 'text',
                                'text' => '親愛的'.$name.'您好 ,好久不見!ㄎㄎ'
                              ),
                              $randomNotification
                                
                            )
                    )); 


        break;

        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};


