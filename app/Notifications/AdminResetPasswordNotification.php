<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminResetPasswordNotification extends Notification
{
    use Queueable;

    public string $token;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }


    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }


    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url(route(
            'admin.password.reset',
            [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ],
            false
        ));

        return (new MailMessage)
            ->subject('Đặt lại mật khẩu quản trị')
            ->greeting('Xin chào ' . $notifiable->name . '!')
            ->line('Bạn vừa yêu cầu đặt lại mật khẩu cho tài khoản quản trị.')
            ->action('Đặt lại mật khẩu', $url)
            ->line('Liên kết này sẽ hết hạn sau một khoảng thời gian nhất định.')
            ->line('Nếu bạn không yêu cầu đổi mật khẩu, bạn có thể bỏ qua email này.');
    }
}