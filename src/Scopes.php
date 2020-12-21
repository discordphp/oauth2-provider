<?php

namespace DiscordPhp\OAuth2;

/**
 * Discord OAuth2 scopes
 *
 * @package DiscordPhp\OAuth2
 */
final class Scopes
{
    public const BOT                          = 'bot';
    public const CONNECTIONS                  = 'connections';
    public const EMAIL                        = 'email';
    public const IDENTIFY                     = 'identify';
    public const GUILDS                       = 'guilds';
    public const GUILDS_JOIN                  = 'guilds.join';
    public const GDM_JOIN                     = 'gdm.join';
    public const MESSAGES_READ                = 'messages.read';
    public const RPC                          = 'rpc';
    public const RPC_API                      = 'rpc.api';
    public const RPC_NOTIFICATIONS_READ       = 'rpc.notifications.read';
    public const WEBHOOK_INCOMING             = 'webhook.incoming';
    public const APPLICATIONS_BUILDS_UPLOAD   = 'applications.builds.upload';
    public const APPLICATIONS_BUILDS_READ     = 'applications.builds.read';
    public const APPLICATIONS_STORE_UPDATE    = 'applications.store.update';
    public const APPLICATIONS_ENTITLEMENTS    = 'applications.entitlements';
    public const RELATIONSHIPS_READ           = 'relationships.read';
    public const ACTIVITIES_READ              = 'activities.read';
    public const ACTIVITIES_WRITE             = 'activities.write';
    public const APPLICATIONS_COMMANDS_UPDATE = 'applications.commands.update';
}