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

    public function getUpdates($offset="",$limit="",$timeout=""){
        return $this->sendRequest(
            "get",
            $this->baseUrl."getUpdates?offset=$offset&limit=$limit&timeout=$timeout"
        );
    }
    public function SendMessage($chat_id, $text){
        return $this->sendRequest(
            "get",
            $this->baseUrl."sendMessage?chat_id=$chat_id&text=$text"
        );
    }
    public function SendDocument($filePath, $chat_id, $mood="r"){
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

}