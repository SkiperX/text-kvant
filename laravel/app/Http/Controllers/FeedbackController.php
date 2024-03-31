<?php
namespace App\Http\Controllers;

use App\Http\DTO\FeedbackDTO;
use App\Http\Requests\FeedbackRequest;
use App\Services\FeedbackService;

class FeedbackController extends Controller
{
    protected $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function store(FeedbackRequest $request)
    {
        $data = new FeedbackDTO($request);

        try {
            $this->feedbackService->saveFeedback($data);
        }  catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Feedback saved successfully'], 201);
    }
}
