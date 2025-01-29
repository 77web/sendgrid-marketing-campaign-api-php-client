<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\Recipients;

use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientErrorInterface;

class CreateRecipientError implements CreateRecipientErrorInterface
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
