<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\Campaign;

readonly class CampaignSendTo
{
    /**
     * @param null|array<int> $listIds
     * @param null|array<int> $segmentIds
     */
    public function __construct(
        public array|null $listIds = null,
        public array|null $segmentIds = null,
        public bool $all = false,
    ) {
    }
}
