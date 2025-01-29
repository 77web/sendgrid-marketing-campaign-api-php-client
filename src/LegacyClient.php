<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient;

use Linkage\SendgridMarketingCampaignApiClient\Campaign\CreateCampaignRequestInterface;
use Linkage\SendgridMarketingCampaignApiClient\Campaign\CreateCampaignResponseInterface;
use Linkage\SendgridMarketingCampaignApiClient\Campaign\ScheduleCampaignRequestInterface;
use Linkage\SendgridMarketingCampaignApiClient\Campaign\ScheduleCampaignResponseInterface;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\AddMultipleRecipientsRequestInterface;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\AddMultipleRecipientsResponseInterface;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListRequestInterface;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListResponseInterface;
use Linkage\SendgridMarketingCampaignApiClient\Legacy\Campaign\CreateCampaignResponse;
use Linkage\SendgridMarketingCampaignApiClient\Legacy\Campaign\ScheduleCampaignResponse;
use Linkage\SendgridMarketingCampaignApiClient\Legacy\ContactList\AddMultipleRecipientsResponse;
use Linkage\SendgridMarketingCampaignApiClient\Legacy\ContactList\CreateContactListResponse;
use Linkage\SendgridMarketingCampaignApiClient\Legacy\Recipients\CreateRecipientsResponse;
use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsRequestInterface;
use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsResponseInterface;

class LegacyClient implements ClientInterface
{
    public function __construct(
        private readonly SendgridApiRequester $requester,
    ) {
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createContactList(
        CreateContactListRequestInterface $request,
    ): CreateContactListResponseInterface {
        return $this->requester->post(
            'contactdb/lists',
            $request,
            CreateContactListResponse::class,
        );
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createRecipients(CreateRecipientsRequestInterface $request): CreateRecipientsResponseInterface
    {
        return $this->requester->post(
            'contactdb/recipients',
            $request,
            CreateRecipientsResponse::class,
        );
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function addMultipleRecipientsToContactList(
        int $listId,
        AddMultipleRecipientsRequestInterface $request,
    ): AddMultipleRecipientsResponseInterface {
        return $this->requester->post(
            \sprintf('contactdb/lists/%d/recipients', $listId),
            $request,
            AddMultipleRecipientsResponse::class,
        );
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createCampaign(CreateCampaignRequestInterface $request): CreateCampaignResponseInterface
    {
        return $this->requester->post(
            'campaigns',
            $request,
            CreateCampaignResponse::class,
        );
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function scheduleCampaign(int $campaignId, ScheduleCampaignRequestInterface $request): ScheduleCampaignResponseInterface
    {
        return $this->requester->post(
            \sprintf('campaigns/%d/schedules', $campaignId),
            $request,
            ScheduleCampaignResponse::class,
        );
    }
}
