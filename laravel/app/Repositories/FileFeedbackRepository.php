<?php

namespace App\Repositories;

use App\Http\DTO\FeedbackDTO;
use Illuminate\Support\Facades\Storage;

class FileFeedbackRepository implements FeedbackRepository
{
    public function saveFeedback(FeedbackDTO $data): bool
    {
        $filename = 'feedbacks.txt';
        $content = json_encode($data) . PHP_EOL;

        $result = Storage::disk('local')->append($filename, $content);
        if (!$result) {
            throw new \Exception('Failed to save feedback to file');
        }
        return true;
    }
}
