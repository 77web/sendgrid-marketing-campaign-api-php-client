<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Legacy\Recipients;

use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsRequestInterface;

/**
 * @extends \ArrayIterator<int, RecipientRequest>
 */
class CreateRecipientsRequest extends \ArrayIterator implements CreateRecipientsRequestInterface
{
    /**
     * @param array<int, RecipientRequest> $recipients
     */
    public function __construct(
        array $recipients,
    ) {
        parent::__construct($recipients);
    }
}
