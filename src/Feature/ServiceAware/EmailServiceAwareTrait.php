<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature\ServiceAware;

use Ftven\Build\Common\Service\Email\EmailServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait EmailServiceAwareTrait
{
    /**
     * @var EmailServiceInterface
     */
    protected $emailService;
    /**
     * @param EmailServiceInterface $emailService
     *
     * @return $this
     */
    public function setEmailService(EmailServiceInterface $emailService)
    {
        $this->emailService = $emailService;

        return $this;
    }
    /**
     * @return EmailServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getEmailService()
    {
        if (null === $this->emailService) {
            throw new \RuntimeException('Email service not set', 500);
        }

        return $this->emailService;
    }
}