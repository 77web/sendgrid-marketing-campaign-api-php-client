<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\Campaign;

use Linkage\SendgridMarketingCampaignApiClient\Campaign\CreateCampaignResponseInterface;

readonly class CreateCampaignResponse implements CreateCampaignResponseInterface
{
    /**
     * @param array<string> $categories
     */
    public function __construct(
        public int $id,
        public string $status,
        public string $name,
        public CampaignSendTo $sendTo,
        public CampaignEmailConfig $emailConfig,
        public array $categories = [],
    ) {
    }
}
