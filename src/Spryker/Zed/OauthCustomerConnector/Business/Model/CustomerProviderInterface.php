<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthCustomerConnector\Business\Model;

use Generated\Shared\Transfer\OauthUserTransfer;

interface CustomerProviderInterface
{
    public function getCustomerOauthUser(OauthUserTransfer $oauthUserTransfer): OauthUserTransfer;

    public function getCustomerImpersonationOauthUser(OauthUserTransfer $oauthUserTransfer): OauthUserTransfer;
}
