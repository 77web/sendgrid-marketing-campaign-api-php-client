<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Legacy\Campaign;

use Linkage\SendgridMarketingCampaignApiClient\Campaign\ScheduleCampaignRequestInterface;

class ScheduleCampaignRequest implements ScheduleCampaignRequestInterface
{
    // timestamp
    public int $sendAt;

    public function __construct(
        \DateTimeImmutable $shouldSendAt,
    ) {
        $this->sendAt = $shouldSendAt->getTimestamp();
    }
}
