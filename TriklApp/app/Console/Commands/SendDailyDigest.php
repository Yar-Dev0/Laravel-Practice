<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;
use App\Models.User;
use App\Mail\DailyDigest;

class SendDailyDigest extends Command
{
    protected $signature = 'digest:send';
    protected $description = 'Send daily email digest of top posts to all users';

    public function handle()
    {
        $topPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new DailyDigest($topPosts));
        }

        return 0;
    }
}