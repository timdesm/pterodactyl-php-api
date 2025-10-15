<?php

namespace Timdesm\PterodactylPhpApi\Managers;

use Timdesm\PterodactylPhpApi\Resources\ApiKey;
use Timdesm\PterodactylPhpApi\Resources\Collection;
use Timdesm\PterodactylPhpApi\Resources\RecoveryTokens;
use Timdesm\PterodactylPhpApi\Resources\SystemPermissions;
use Timdesm\PterodactylPhpApi\Resources\User;

class AccountManager extends Manager
{
    /**
     * Get information of the account.
     *
     * @return User
     */
    public function details()
    {
        return $this->http->get('account');
    }

    /**
     * Get permissions of the account.
     *
     * @return SystemPermissions
     */
    public function permissions()
    {
        return $this->http->get('account/permissions');
    }

    /**
     * Get all API keys for the authenticated account.
     *
     * @return Collection
     */
    public function apiKeys()
    {
        return $this->http->get('account/api-keys');
    }

    /**
     * Create a new API key for the authenticated account.
     *
     * @param array $data
     *
     * @return ApiKey
     */
    public function createApiKey(array $data)
    {
        return $this->http->post('account/api-keys', [], $data);
    }

    /**
     * Delete an API key for the authenticated account.
     *
     * @param string $identifier
     *
     * @return void
     */
    public function deleteApiKey($identifier)
    {
        return $this->http->delete("account/api-keys/$identifier");
    }

    /**
     * Retrieve the current two factor authentication status.
     *
     * @return array
     */
    public function twoFactor()
    {
        return $this->http->get('account/2fa');
    }

    /**
     * Enable two factor authentication using a TOTP code.
     *
     * @param string $code
     *
     * @return RecoveryTokens
     */
    public function enableTwoFactor($code)
    {
        return $this->http->post('account/2fa', [], ['code' => $code]);
    }

    /**
     * Disable two factor authentication for the account.
     *
     * @param string $password
     *
     * @return void
     */
    public function disableTwoFactor($password)
    {
        return $this->http->delete('account/2fa', [], ['password' => $password]);
    }

    /**
     * Fetch the account activity log entries.
     *
     * @param array $query
     *
     * @return Collection
     */
    public function activity(array $query = [])
    {
        return $this->http->get('account/activity', $query);
    }
}
