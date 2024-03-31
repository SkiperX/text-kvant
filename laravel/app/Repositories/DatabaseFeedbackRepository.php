<?php

namespace App\Repositories;

use App\Http\DTO\FeedbackDTO;
use App\Models\Feedback;

class DatabaseFeedbackRepository implements FeedbackRepository
{
    public function saveFeedback(FeedbackDTO $data): bool
    {
        $feedback = Feedback::create($data->toArray());
        if (!$feedback) {
            throw new \Exception('Failed to save feedback to database');
        }
        return true;
    }
}
