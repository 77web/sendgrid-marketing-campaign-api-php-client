<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient;

use Linkage\SendgridMarketingCampaignApiClient\Campaign\CreateCampaignRequest;
use Linkage\SendgridMarketingCampaignApiClient\Campaign\CreateCampaignResponse;
use Linkage\SendgridMarketingCampaignApiClient\Campaign\ScheduleCampaignRequest;
use Linkage\SendgridMarketingCampaignApiClient\Campaign\ScheduleCampaignResponse;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\AddMultipleRecipientsRequest;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\AddMultipleRecipientsResponse;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListRequest;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListResponse;
use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsRequest;
use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsResponse;

class NewClient implements ClientInterface
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
        CreateContactListRequest $request,
    ): CreateContactListResponse {
        return $this->requester->post(
            'marketing/lists',
            $request,
            CreateContactListResponse::class,
        );
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createRecipients(CreateRecipientsRequest $request): CreateRecipientsResponse
    {
        return $this->requester->post(
            'marketing/contacts',
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
        AddMultipleRecipientsRequest $request,
    ): AddMultipleRecipientsResponse {
        throw new \LogicException('New marketing api does not support this api. Use createRecipients instead.');
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createCampaign(CreateCampaignRequest $request): CreateCampaignResponse
    {
        return $this->requester->post(
            'marketing/singlesends',
            $request,
            CreateCampaignResponse::class,
        );
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function scheduleCampaign(int $campaignId, ScheduleCampaignRequest $request): ScheduleCampaignResponse
    {
        return $this->requester->post(
            \sprintf('marketing/singlesends/%d/schedules', $campaignId),
            $request,
            ScheduleCampaignResponse::class,
        );
    }
}
