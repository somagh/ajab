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
	else if($result['message']['from']['id']=="121259997"&&rand(12,42)==12)
	{
		$text_reply = 'وز زر مفت نزن';
		$reply=$result['message']['message_id'];
	}
	else if(strpos($text, 'وز ساکت') !== false||strpos($text, 'وز ساکت') !== false)
	{
		$text_reply = 'vez ostad '.$result['message']['from']['first_name'].' mifarmayand zer moft nazan';
	}
	else if(strpos($text, 'پی ننه') !== false||strpos($text, 'pnane') !== false||strpos($text, 'پي ننه') !== false)
		$text_reply = 'پی ننه کو؟ پی ننه کو؟ پی ننه پی ننه پی ننه کو؟';
	else if(strpos($text, 'وزننه') !== false)
		$text_reply = 'وزننه نسخه جدید پی ننه';
	else if($result['message']['from']['username']=="aryakowsary")
		$text_reply = '';
	else if()
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
    $res = file_get_contents($url);
	?>
</body>
</html>
