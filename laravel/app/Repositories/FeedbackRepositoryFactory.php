<?php
namespace App\Repositories;

class FeedbackRepositoryFactory
{
    public static function create(string $type): FeedbackRepository
    {
        switch ($type) {
            case 'database':
                return new DatabaseFeedbackRepository();
            case 'file':
                return new FileFeedbackRepository();
            default:
                throw new \InvalidArgumentException("Unsupported repository type: $type");
        }
    }
}
