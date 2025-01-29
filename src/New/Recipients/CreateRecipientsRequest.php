<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\New\Recipients;

use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsRequestInterface;

/**
 * @extends \ArrayIterator<int, RecipientRequest>
 */
class CreateRecipientsRequest extends \ArrayIterator implements CreateRecipientsRequestInterface
{
    /**
     * @param array<int, RecipientRequest> $contacts
     * @param array<string> $listIds
     */
    public function __construct(
        array $contacts,
        public array $listIds,
    ) {
        parent::__construct($contacts);
    }
}
