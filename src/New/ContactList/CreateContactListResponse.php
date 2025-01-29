<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\ContactList;

use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListResponseInterface;

readonly class CreateContactListResponse implements CreateContactListResponseInterface
{
    public function __construct(
        public int $id,
        public string $name,
        public int $contactCount,
    ) {
    }
}
