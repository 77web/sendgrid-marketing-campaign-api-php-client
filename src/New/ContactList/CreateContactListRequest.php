<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\ContactList;

use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListRequestInterface;

class CreateContactListRequest implements CreateContactListRequestInterface
{
    public function __construct(
        public string $name,
    ) {
    }
}
