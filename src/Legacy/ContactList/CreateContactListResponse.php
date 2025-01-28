<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Legacy\ContactList;

use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListResponseInterface;

class CreateContactListResponse implements CreateContactListResponseInterface
{
    public function __construct(
        public int $id,
        public string $name,
        public int $recipientCount,
    ) {
    }
}
