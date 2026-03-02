<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthCustomerConnector\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\OauthCustomerConnector\Business\Installer\OauthCustomerScopeInstaller;
use Spryker\Zed\OauthCustomerConnector\Business\Installer\OauthCustomerScopeInstallerInterface;
use Spryker\Zed\OauthCustomerConnector\Business\Model\CustomerProvider;
use Spryker\Zed\OauthCustomerConnector\Business\Model\CustomerProviderInterface;
use Spryker\Zed\OauthCustomerConnector\Business\Model\Installer;
use Spryker\Zed\OauthCustomerConnector\Business\Model\InstallerInterface;
use Spryker\Zed\OauthCustomerConnector\Business\Model\ScopeProvider;
use Spryker\Zed\OauthCustomerConnector\Business\Model\ScopeProviderInterface;
use Spryker\Zed\OauthCustomerConnector\Dependency\Facade\OauthCustomerConnectorToCustomerFacadeInterface;
use Spryker\Zed\OauthCustomerConnector\Dependency\Facade\OauthCustomerConnectorToOauthFacadeInterface;
use Spryker\Zed\OauthCustomerConnector\Dependency\Service\OauthCustomerConnectorToUtilEncodingServiceInterface;
use Spryker\Zed\OauthCustomerConnector\OauthCustomerConnectorConfig;
use Spryker\Zed\OauthCustomerConnector\OauthCustomerConnectorDependencyProvider;

/**
 * @method \Spryker\Zed\OauthCustomerConnector\OauthCustomerConnectorConfig getConfig()
 */
class OauthCustomerConnectorBusinessFactory extends AbstractBusinessFactory
{
    public function createCustomerProvider(): CustomerProviderInterface
    {
        return new CustomerProvider(
            $this->getCustomerFacade(),
            $this->getUtilEncodingService(),
            $this->getOauthCustomerIdentifierExpanderPlugins(),
        );
    }

    public function createScopeProvider(): ScopeProviderInterface
    {
        return new ScopeProvider($this->getConfig());
    }

    /**
     * @deprecated Will be removed in the next major.
     *
     * @return \Spryker\Zed\OauthCustomerConnector\Business\Model\InstallerInterface
     */
    public function createInstaller(): InstallerInterface
    {
        return new Installer($this->getOauthFacade(), $this->getConfig());
    }

    public function createOauthCustomerScopeInstaller(): OauthCustomerScopeInstallerInterface
    {
        return new OauthCustomerScopeInstaller(
            $this->getOauthFacade(),
            $this->getConfig(),
        );
    }

    public function getCustomerFacade(): OauthCustomerConnectorToCustomerFacadeInterface
    {
        return $this->getProvidedDependency(OauthCustomerConnectorDependencyProvider::FACADE_CUSTOMER);
    }

    public function getOauthFacade(): OauthCustomerConnectorToOauthFacadeInterface
    {
        return $this->getProvidedDependency(OauthCustomerConnectorDependencyProvider::FACADE_OAUTH);
    }

    public function getModuleConfig(): OauthCustomerConnectorConfig
    {
        return $this->getConfig();
    }

    public function getUtilEncodingService(): OauthCustomerConnectorToUtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(OauthCustomerConnectorDependencyProvider::SERVICE_UTIL_ENCODING);
    }

    /**
     * @return array<\Spryker\Zed\OauthCustomerConnectorExtension\Dependency\Plugin\OauthCustomerIdentifierExpanderPluginInterface>
     */
    public function getOauthCustomerIdentifierExpanderPlugins(): array
    {
        return $this->getProvidedDependency(OauthCustomerConnectorDependencyProvider::PLUGINS_OAUTH_CUSTOMER_IDENTIFIER_EXPANDER);
    }
}
