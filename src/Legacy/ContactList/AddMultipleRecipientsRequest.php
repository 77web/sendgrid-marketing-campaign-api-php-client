<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Legacy\ContactList;

use Linkage\SendgridMarketingCampaignApiClient\ContactList\AddMultipleRecipientsRequestInterface;

/**
 * @extends \ArrayIterator<int, string>
 */
class AddMultipleRecipientsRequest extends \ArrayIterator implements AddMultipleRecipientsRequestInterface
{
    /**
     * @param array<int, string> $recipientIds
     */
    public function __construct(
        array $recipientIds,
    ) {
        parent::__construct($recipientIds);
    }
}
