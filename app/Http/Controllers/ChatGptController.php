<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ChatGptController extends Controller
{
    /**
     * index
     *
     * @param  Request  $request
     */
    public function index(Request $request)
    {
        return view('create');
    }

    /**
     * chat
     *
     * @param  Request  $request
     */
    public function chat(Request $request)
    {
        // バリデーション
        $request->validate([
            'sentence' => 'required',
        ]);
        // dd($request->all());

        // if ($request->has('translate')) {
            // 文章
        $sentence = $request->input('sentence');

        // ChatGPT API処理
        $chat_response = $this->chat_gpt("以下の文章を英語にしてください。「", $sentence, "」");
        return view('create', compact('sentence', 'chat_response'));
        // }
        // return redirect()->route('create');
    }

    /**
     * ChatGPT API呼び出し
     * ライブラリ
     */
    function chat_gpt($system, $user)
    {

        // APIキー
        $api_key = env('CHAT_GPT_KEY');

        // パラメータ
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $system
                ],
                [
                    "role" => "user",
                    "content" => $user
                ]
            ]
        );

        $openaiClient = \Tectalic\OpenAi\Manager::build(
            new \GuzzleHttp\Client(),
            new \Tectalic\OpenAi\Authentication($api_key)
        );

        try {

            $response = $openaiClient->chatCompletions()->create(
                new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest($data)
            )->toModel();

            return $response->choices[0]->message->content;
        } catch (\Exception $e) {
            return "ERROR";
        }
    }
}
