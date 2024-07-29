<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Recipients;

class CreateRecipientsResponse
{
    /**
     * @param array<int>    $errorIndices
     * @param array<int>    $unmodifiedIndices
     * @param array<string> $persistedRecipients
     * @param array<CreateRecipientError> $errors
     */
    public function __construct(
        public int $errorCount,
        public array $errorIndices,
        public array $unmodifiedIndices,
        public int $newCount,
        public array $persistedRecipients,
        public int $updatedCount,
        public array $errors,
    ) {
    }

    // for SymfonySerializer
    public function addError(CreateRecipientError $error): void
    {
        $this->errors[] = $error;
    }

    // for SymfonySerializer
    public function removeError(CreateRecipientError $error): void
    {
        // do nothing
    }

}
