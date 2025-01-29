<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Legacy\Recipients;

use Linkage\SendgridMarketingCampaignApiClient\Recipients\RecipientRequestInterface;

class RecipientRequest implements RecipientRequestInterface
{
    public function __construct(
        public string $email,
        public string $firstName = '',
        public string $lastName = '',
    ) {
    }
}
