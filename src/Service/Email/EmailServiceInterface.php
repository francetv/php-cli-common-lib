<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Email;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
interface EmailServiceInterface
{
    /**
     * @param array|string $recipients
     * @param string       $subject
     * @param string       $body
     * @param string       $sender
     *
     * @return $this
     */
    public function send($recipients, $subject, $body, $sender);
}