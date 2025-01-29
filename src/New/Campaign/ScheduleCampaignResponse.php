<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\Campaign;

use Linkage\SendgridMarketingCampaignApiClient\Campaign\ScheduleCampaignResponseInterface;

readonly class ScheduleCampaignResponse implements ScheduleCampaignResponseInterface
{
    public function __construct(
        public int $id,
        public int $sendAt,
        public string $status,
    ) {
    }
}
