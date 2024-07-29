<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Recipients;

readonly class CreateRecipientError
{
    /**
     * @param array<int> $errorIndices
     */
    public function __construct(
        public string $message,
        public array $errorIndices,
    ) {
    }
}
