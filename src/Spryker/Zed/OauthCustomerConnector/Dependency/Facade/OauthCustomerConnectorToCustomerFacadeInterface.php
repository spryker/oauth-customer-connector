<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthCustomerConnector\Dependency\Facade;

use Generated\Shared\Transfer\CustomerCriteriaTransfer;
use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

interface OauthCustomerConnectorToCustomerFacadeInterface
{
    public function tryAuthorizeCustomerByEmailAndPassword(CustomerTransfer $customerTransfer): bool;

    public function getCustomer(CustomerTransfer $customerTransfer): CustomerTransfer;

    public function getCustomerByCriteria(CustomerCriteriaTransfer $customerCriteriaTransfer): CustomerResponseTransfer;
}
