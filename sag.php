<html>
<title>Welcome!</title>
<body bgcolor ="yellow">
<?php
$string = json_decode(file_get_contents('php://input'));
    function objectToArray( $object )
    {
        if( !is_object( $object ) && !is_array( $object ) )
        {
            return $object;
        }
        if( is_object( $object ) )
        {
            $object = get_object_vars( $object );
        }
        return array_map( 'objectToArray', $object );
    }
    $token='99331505:AAEQcTOdUSAPxN2d8tYOd-_DTjtg49EgV5k';
    $result = objectToArray($string);
    $user_id = $result['message']['chat']['id'];
    $text = $result['message']['text'];
	if(strpos($result['message']['entities'][0]['type'],'bot_command')!==false)
	{
		$text_reply='این دستور فیک است اه';
		$reply=$result['message']['message_id'];
	}
	else if(strpos($text, 'بزار') !== false)
	{
		$text_reply = 'بذار*';
		$reply=$result['message']['message_id'];
	}
	else if(strpos($text, 'میزار') !== false||strpos($text, 'می زار') !== false)
	{
		$text_reply = 'می ذار*';
		$reply=$result['message']['message_id'];
	}
	else if(strpos($text, 'گزاشت') !== false)
	{
		$text_reply = 'گذاشت*';
		$reply=$result['message']['message_id'];
	}
	else if($result['message']['from']['id']=="121259997"&&rand(12,32)==12)
	{
		$text_reply = '<b>وز زر مفت نزن</b>';
		$reply=$result['message']['message_id'];
	}
	else if(strpos($text, 'وز ساکت') !== false||strpos($text, 'وز ساکت') !== false)
	{
		$text_reply = 'vez ostad '.$result['message']['from']['first_name'].' mifarmayand zer moft nazan';
	}
	else if(strpos($text, 'پی ننه') !== false||strpos($text, 'pnane') !== false||strpos($text, 'پي ننه') !== false||strpos($text, 'پيننه') !== false)
		$text_reply = '🎤🎤🎤<i>پی ننه کو؟ پی ننه کو؟ پی ننه پی ننه پی ننه کو؟</i>🎤🎤🎤';
	else if(strpos($text, 'وزننه') !== false)
		$text_reply = 'وزننه نسخه جدید پی ننه';
	else if($result['message']['from']['username']=="aryakowsary" || $result['message']['from']['username']=="A_H_P_A")
	{
		$arr = explode(" ", $text);
    	if($arr[1] == 'ساکت' )
      		$text_reply = $arr[0].' استاد میفرمایند ساکت ';  
		else
	      	$text_reply = '';
	}
	else
	{
		$text_reply = '';
		if(rand(1,100)==20)
		{
		$text_reply = $result['message']['from']['first_name'].' zer nazan';
		$reply=$result['message']['message_id'];
		}
	}
	$xml = file_get_contents("http://requestb.in/1b31zb21");
    $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$user_id;
    $url .= '&text=' .$text_reply;
	$url .= '&reply_to_message_id=' .$reply;
	$url .= '&parse_mode=html';
    $res = file_get_contents($url);
	?>
</body>
</html>
