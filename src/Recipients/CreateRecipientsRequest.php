<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Recipients;

/**
 * @extends \ArrayIterator<int, RecipientRequest>
 */
class CreateRecipientsRequest extends \ArrayIterator
{
    /**
     * @param array<RecipientRequest> $recipients
     */
    public function __construct(
        array $recipients,
    ) {
        parent::__construct($recipients);
    }
}
