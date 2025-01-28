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

interface ClientInterface
{
    /**
     * @see https://sendgrid.kke.co.jp/docs/API_Reference/Web_API_v3/Marketing_Campaigns/contactdb.html#Create-a-List-POST
     *
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createContactList(CreateContactListRequestInterface $request): CreateContactListResponseInterface;

    /**
     * @see https://sendgrid.kke.co.jp/docs/API_Reference/Web_API_v3/Marketing_Campaigns/contactdb.html#Add-Multiple-Recipients-POST
     *
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createRecipients(CreateRecipientsRequestInterface $request): CreateRecipientsResponseInterface;

    /**
     * @see https://sendgrid.kke.co.jp/docs/API_Reference/Web_API_v3/Marketing_Campaigns/contactdb.html#Add-Multiple-Recipients-to-a-List-POST
     *
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function addMultipleRecipientsToContactList(int $listId, AddMultipleRecipientsRequestInterface $request): AddMultipleRecipientsResponseInterface;

    /**
     * @see https://sendgrid.kke.co.jp/docs/API_Reference/Web_API_v3/Marketing_Campaigns/campaigns.html#Create-a-Campaign-POST
     *
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createCampaign(CreateCampaignRequestInterface $request): CreateCampaignResponseInterface;

    /**
     * @see https://sendgrid.kke.co.jp/docs/API_Reference/Web_API_v3/Marketing_Campaigns/campaigns.html#Send-a-Campaign-POST
     *
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function scheduleCampaign(int $campaignId, ScheduleCampaignRequestInterface $request): ScheduleCampaignResponseInterface;
}
