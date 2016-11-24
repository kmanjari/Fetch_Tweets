<?php
namespace App\Http\Controllers;

use App\Tweet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getTweet(Request $request, $username = null)
    {
        $status = 'OK';
        $code = 200;

        try
        {
            $name = $request->name;
            if (\Route::getFacadeRoot()->current()->uri() == 'handle/{username}')
            {
                $tweets = \Twitter::getUserTimeline(['screen_name' => $username, 'count' => 50, 'format' => 'json']);
            }
            else
            {
                $tweets = \Twitter::getUserTimeline(['screen_name' => $name, 'count' => 50, 'format' => 'json']);
            }
            $tweetArray = [];
            $tweetsForDB = json_decode($tweets);
            foreach ($tweetsForDB as $tweet)
            {
                $checkTweet = Tweet::where('tweet_id', $tweet->id)->first();
                if (!$checkTweet)
                {
                    $tweetArray[] = ['tweet_id' => $tweet->id, 'id_str' => $tweet->id_str, 'text' => $tweet->text, 'truncated' => $tweet->truncated, 'created_at' => Carbon::parse($tweet->created_at)];
                }
            }

            \DB::table('tweets')->insert($tweetArray);

            if (\Route::getFacadeRoot()->current()->uri() == 'handle/{username}')
            {
                $response = ['status' => $status, 'code' => $code, 'data' => $tweets];
                return $response;
            }

            \Session::flash('flash_message', 'Added tweets into database');
            return view('welcome');

        } catch (\Exception $e)
        {
            \Log::info($e->getMessage() . ' on ' . $e->getLine() . ' in ' . $e->getFile());
            $response = ['status' => $e->getMessage(), 'code' => $e->getCode()];
            return $response;
        }
    }

    public function showTweet()
    {
        return view('welcome');
    }

}