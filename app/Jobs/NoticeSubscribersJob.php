<?php

namespace App\Jobs;

use App\Notifications\SubscriberNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use App\Models\Subscribe;
use App\Models\Article;

class NoticeSubscribersJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var null
     */
    private $user_id;
    /**
     * @var null
     */
    private $source_id;
    /**
     * @var Article
     */
    private $article;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->user_id = $article->user_id;
        $this->source_id = $article->source_id;
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emails = Subscribe::select('email')->where('user_id', '=', $this->user_id)->where('source_id', '=', $this->source_id)->get();
        if (!is_null($emails))
            Notification::send($emails, new SubscriberNotification($this->article->user->name,$this->article->source->name));
    }
}
