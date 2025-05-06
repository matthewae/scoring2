<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProjectDocumentSubmission extends Notification implements ShouldQueue
{
    use Queueable;

    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Ada pengajuan dokumen baru dari guest',
            'project_id' => $this->project->id,
            'guest_id' => $this->project->guest_id,
            'created_at' => now()->toDateTimeString()
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pengajuan Dokumen Baru')
            ->line('Ada pengajuan dokumen baru dari guest yang membutuhkan review.')
            ->action('Lihat Dokumen', route('dashboard.user.projects.show', $this->project))
            ->line('Terima kasih telah menggunakan aplikasi kami!');
    }
}