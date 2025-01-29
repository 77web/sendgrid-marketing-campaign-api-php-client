<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\Campaign;

use Linkage\SendgridMarketingCampaignApiClient\Campaign\CreateCampaignRequestInterface;

readonly class CreateCampaignRequest implements CreateCampaignRequestInterface
{
    /**
     * @param null|array<string> $categories
     */
    public function __construct(
        public string $name,
        public CampaignSendTo $sendTo,
        public CampaignEmailConfig $emailConfig,
        public array|null $categories = null,
    ) {
    }
}
