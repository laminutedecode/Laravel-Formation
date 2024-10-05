<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

     protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toDatabase(){
        return [
            'article_id'=>$this->article->id,
            'title'=>$this->article->title,
            'author_id'=>$this->article->author_id,
            'message'=>'Un nouvel article a été créé: '.$this->article->title,
            'url'=>url('/articles/'.$this->article->id),
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("Nouvelle article")
                    ->line('Un nouvelle article a été créé')
                    ->action('Voir article', url('/articles/'.$this->article->id))
                    ->line('Merci pour votre attention');
    }

    

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    
}
