<?php
namespace App\Services;

use App\Http\DTO\FeedbackDTO;
use App\Repositories\FeedbackRepositoryFactory;

class FeedbackService
{
    public function saveFeedback(FeedbackDTO $feedbackDTO)
    {
        $databaseRepository = FeedbackRepositoryFactory::create('database');
        $fileRepository = FeedbackRepositoryFactory::create('file');

        $databaseRepository->saveFeedback($feedbackDTO);
        $fileRepository->saveFeedback($feedbackDTO);
    }
}
