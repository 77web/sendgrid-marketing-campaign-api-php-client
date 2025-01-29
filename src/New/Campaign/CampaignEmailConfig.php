<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\Campaign;

readonly class CampaignEmailConfig
{
    public function __construct(
        public int $senderId,
        public string $subject,
        public string|null $htmlContent = null,
        public string|null $plainContent = null,
        public bool $generatePlainContent = true,
        public int|null $suppressionGroupId = null,
        public string|null $customUnsubscribeUrl = null,
        public string|null $ipPool = null,
    ) {
    }
}
