<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\Recipients;

use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsResponseInterface;

class CreateRecipientsResponse implements CreateRecipientsResponseInterface
{
    /**
     */
    public function __construct(
        public string $jobId,
    ) {
    }
}
