<?php
declare(strict_types=1);
namespace TestApp\Policy;

use Phauthentic\Authorization\IdentityInterface;
use Phauthentic\Authorization\Policy\RequestPolicyInterface;
use Phauthentic\Authorization\Policy\Result;
use Psr\Http\Message\ServerRequestInterface;

/**
 * For testing request based policies
 */
class RequestPolicy implements RequestPolicyInterface
{
    /**
     * Method to check if the request can be accessed
     *
     * @param \Authorization\IdentityInterface|null $identity Identity
     * @param \Cake\Http\ServerRequest $request Request
     * @return bool|\Authorization\Policy\ResultInterface
     */
    public function canAccess(?IdentityInterface $identity, ServerRequestInterface $request)
    {
        if ($request->getParam('controller') === 'Articles'
            && $request->getParam('action') === 'index'
        ) {
            return true;
        }

        // More checks here

        return false;
    }

    /**
     * Method to check if the request can be accessed
     *
     * @param null|\Authorization\IdentityInterface|null $idenity Identity
     * @param \Cake\Http\ServerRequest $request Request
     * @return \Authorization\Policy\ResultInterface|bool
     */
    public function canEnter(?IdentityInterface $identity, ServerRequestInterface $request)
    {
        if ($request->getParam('controller') === 'Articles'
            && $request->getParam('action') === 'index'
        ) {
            return new Result(true);
        }

        return new Result(false, 'wrong action');
    }
}
