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
use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsRequestInterface;
use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsResponseInterface;

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
        CreateContactListRequestInterface $request,
    ): CreateContactListResponseInterface {
        return $this->requester->post(
            'marketing/lists',
            $request,
            CreateContactListResponseInterface::class,
        );
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createRecipients(CreateRecipientsRequestInterface $request): CreateRecipientsResponseInterface
    {
        return $this->requester->post(
            'marketing/contacts',
            $request,
            CreateRecipientsResponseInterface::class,
        );
    }

    public function addMultipleRecipientsToContactList(
        int $listId,
        AddMultipleRecipientsRequestInterface $request,
    ): AddMultipleRecipientsResponseInterface {
        throw new \LogicException('New marketing api does not support this api. Use createRecipients instead.');
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createCampaign(CreateCampaignRequestInterface $request): CreateCampaignResponseInterface
    {
        return $this->requester->post(
            'marketing/singlesends',
            $request,
            CreateCampaignResponseInterface::class,
        );
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function scheduleCampaign(int $campaignId, ScheduleCampaignRequestInterface $request): ScheduleCampaignResponseInterface
    {
        return $this->requester->post(
            \sprintf('marketing/singlesends/%d/schedules', $campaignId),
            $request,
            ScheduleCampaignResponseInterface::class,
        );
    }
}
