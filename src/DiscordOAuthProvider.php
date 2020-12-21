<?php

namespace DiscordPhp\OAuth2;

use JetBrains\PhpStorm\Pure;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

/**
 * Discord OAuth2 provider
 *
 * @package DiscordPhp\OAuth2
 */
class DiscordOAuthProvider extends AbstractProvider
{
    public const BASE_URI = 'https://discord.com/api/oauth2/';

    /**
     * Checks a provider response for errors.
     *
     * @param ResponseInterface $response
     * @param array|string      $data Parsed response data
     *
     * @return void
     * @throws IdentityProviderException
     * @throws \JsonException
     */
    protected function checkResponse(ResponseInterface $response, $data): void
    {
        if ($response->getStatusCode() >= 400) {
            throw new IdentityProviderException(
                $data['message'] ?? json_encode($data, JSON_THROW_ON_ERROR),
                0,
                null
            );
        }
    }

    /**
     * Generates a resource owner object from a successful resource owner
     * details request.
     *
     * @param array       $response
     * @param AccessToken $token
     *
     * @return \DiscordPhp\OAuth2\DiscordResourceOwner
     */
    #[Pure]
    protected function createResourceOwner(array $response, AccessToken $token): DiscordResourceOwner
    {
        return new DiscordResourceOwner($response);
    }

    /**
     * Returns the base URL for requesting an access token.
     *
     * Eg. https://oauth.service.com/token
     *
     * @param array $params
     *
     * @return string
     */
    public function getBaseAccessTokenUrl(array $params): string
    {
        return self::BASE_URI . 'token';
    }

    /**
     * Returns the base URL for authorizing a client.
     *
     * Eg. https://oauth.service.com/authorize
     *
     * @return string
     */
    public function getBaseAuthorizationUrl(): string
    {
        return self::BASE_URI . 'authorize';
    }

    /**
     * Returns the default scopes used by this provider.
     *
     * This should only be the scopes that are required to request the details
     * of the resource owner, rather than all the available scopes.
     *
     * @return array
     */
    protected function getDefaultScopes(): array
    {
        return [
            Scopes::IDENTIFY,
            Scopes::EMAIL,
        ];
    }

    /**
     * Returns the URL for requesting the resource owner's details.
     *
     * @param AccessToken $token
     *
     * @return string
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token): string
    {
        return self::BASE_URI . 'users/@me';
    }

    /**
     * Returns the string that should be used to separate scopes when building
     * the URL for requesting an access token.
     *
     * @return string Scope separator, defaults to ','
     */
    protected function getScopeSeparator(): string
    {
        return ' ';
    }
}