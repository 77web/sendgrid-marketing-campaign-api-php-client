<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Legacy\Campaign;

use Linkage\SendgridMarketingCampaignApiClient\Campaign\ScheduleCampaignResponseInterface;

class ScheduleCampaignResponse implements ScheduleCampaignResponseInterface
{
    public function __construct(
        public int $id,
        public int $sendAt,
        public string $status,
    ) {
    }
}
