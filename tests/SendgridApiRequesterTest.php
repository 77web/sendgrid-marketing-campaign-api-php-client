<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient\Tests;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListRequest;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListResponse;
use Linkage\SendgridMarketingCampaignApiClient\SendgridApiClientException;
use Linkage\SendgridMarketingCampaignApiClient\SendgridApiRequester;
use Linkage\SendgridMarketingCampaignApiClient\SendgridApiServerException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class SendgridApiRequesterTest extends TestCase
{
    private MockObject&ClientInterface $guzzleClientMock;

    protected function setUp(): void
    {
        $this->guzzleClientMock = $this->createMock(ClientInterface::class);
    }

    public function testPost(): void
    {
        $this->guzzleClientMock->expects($this->once())
            ->method('request')
            ->with('POST', '/dummy/path', [
                'body' => '{"name":"dummy-name"}',
            ])
            ->willReturn(new Response(body: (string) json_encode(['id' => 1, 'name' => 'dummy-name', 'recipient_count' => 0])))
        ;

        /** @var CreateContactListResponse $actual */
        $actual = $this->getSUT()->post(
            '/dummy/path',
            new CreateContactListRequest('dummy-name'),
            CreateContactListResponse::class,
        );

        $this->assertInstanceOf(CreateContactListResponse::class, $actual);
        $this->assertSame(1, $actual->id);
        $this->assertSame('dummy-name', $actual->name);
        $this->assertSame(0, $actual->recipientCount);
    }

    public function testPostClientError(): void
    {
        $this->expectException(SendgridApiClientException::class);

        $this->guzzleClientMock->expects($this->once())
            ->method('request')
            ->willThrowException(new ClientException('dummy', $this->createMock(Request::class), $this->createMock(Response::class)))
        ;

        $this->getSUT()->post(
            '/dummy/path',
            new CreateContactListRequest('dummy-name'),
            CreateContactListResponse::class,
        );
    }

    public function testPostServerError(): void
    {
        $this->expectException(SendgridApiServerException::class);

        $this->guzzleClientMock->expects($this->once())
            ->method('request')
            ->willThrowException(new ServerException('dummy', $this->createMock(Request::class), $this->createMock(Response::class)))
        ;

        $this->getSUT()->post(
            '/dummy/path',
            new CreateContactListRequest('dummy-name'),
            CreateContactListResponse::class,
        );
    }

    private function getSUT(): SendgridApiRequester
    {
        return new SendgridApiRequester(
            'test',
            $this->guzzleClientMock,
        );
    }
}
