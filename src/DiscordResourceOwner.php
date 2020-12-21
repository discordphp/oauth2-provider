<?php

namespace DiscordPhp\OAuth2;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class DiscordResourceOwner implements ResourceOwnerInterface
{
    private array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function getUsername(): string
    {
        return $this->data['username'];
    }

    public function getDiscriminator(): string
    {
        return $this->data['discriminator'];
    }

    public function getAvatarHash()
    {
        return $this->data['avatar'];
    }

    public function getEmail(): ?string
    {
        return $this->data['email'];
    }
}