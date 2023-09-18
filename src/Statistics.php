<?php

namespace OmidSandi\Statistics;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use OmidSandi\Statistics\Models\Statistic;

class Statistics
{

    public function add_view()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $user_id = Auth::check() ? Auth::user()->id : null;
        $time = Carbon::now()->subHour(24)->format('Y-m-d H:i:s');
        $stat = Statistic::where('user_id', $user_id)
            ->where('user_agent', $userAgent)
            ->where('ip', $ip)
            ->where('created_at', '>', $time)
            ->first();
        if (!is_null($stat)) {
            Statistic::create([
                'ip' => $ip,
                'user_id' => $user_id,
                'user_agent' => $userAgent
            ]);
        }
    }

    public function all_view(): Collection
    {
        return Statistic::all();
    }

    public function login_user()
    {
        return Statistic::where('user_id', '!=', null)->get();
    }

    public function guest_view($time = false)
    {
        if ($time):
            $time = Carbon::now()->subHour($time)->format('Y-m-d H:i:s');
            $stat = Statistic::where('user_id', null)->where('created_at', '>=', $time)->get();
        else:
            $stat = Statistic::where('user_id', null)->get();
        endif;
        return $stat;
    }

}
