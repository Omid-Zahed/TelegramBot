<?php
namespace Tiger;
class TelegramBot{
    private     $token  ="";
    private     $baseUrl="";
    protected   $client;
    public function __construct($token)
    {
        $this->token=$token;
        $this->baseUrl="https://api.telegram.org/bot".$token."/";
        $this->client=new \GuzzleHttp\Client();

    }

    private function sendRequest($method,$uri,$config=[]){
        return $this->client->request($method, $uri, $config);



    }


    public function sendMessage($chat_id, $text){
        return $this->sendRequest(
            "get",
            $this->baseUrl."sendMessage?chat_id=$chat_id&text=$text"
        );
    }
    public function sendDocument($filePath, $chat_id, $mood="r"){
       return $this->sendRequest('POST', $this->baseUrl . "sendDocument", [
            'multipart' => [
                [
                    'name'     => 'chat_id',
                    'contents' => $chat_id
                ],
                [
                    'name'     => 'document',
                    'contents' => fopen($filePath, $mood)
                ]
            ]
        ]);
    }
    public function getUpdates($offset="",$limit="",$timeout=""){
        return $this->sendRequest(
            "get",
            $this->baseUrl."getUpdates?offset=$offset&limit=$limit&timeout=$timeout"
        );
    }
    public function getMe(){
        return $this->sendRequest(
            "get",
            $this->baseUrl."getMe"
        );
    }
    public function sendSticker($chat_id,$sticker_id,$disable_notification=false,$reply_to_message_id=null,$reply_markup=null)
    {
        $query=[];
        $query["chat_id"]=$chat_id;
        $query["sticker"]=$sticker_id;
        $query["disable_notification"]=$disable_notification;
        is_null($reply_markup)?: $query["reply_markup"]=$reply_markup;
        is_null($reply_to_message_id)?: $query["reply_to_message_id"]=$reply_to_message_id;
        $query=http_build_query($query);
        $url=$this->baseUrl."sendSticker?".$query;
        return $this->sendRequest("get",$url);


    }
}