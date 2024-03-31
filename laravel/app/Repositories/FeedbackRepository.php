<?php

namespace App\Repositories;

use App\Http\DTO\FeedbackDTO;
use App\Models\Feedback;

interface FeedbackRepository
{
    public function saveFeedback(FeedbackDTO $data): bool;
}



