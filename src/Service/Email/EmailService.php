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

use Ftven\Build\Common\Feature\OutputAwareTrait;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class EmailService implements EmailServiceInterface
{
    /**
     * @param array|string $recipients
     * @param string       $subject
     * @param string       $body
     * @param string       $sender
     *
     * @return $this
     *
     * @todo extract static calls into a SwiftMailer service
     */
    public function send($recipients, $subject, $body, $sender)
    {
        $transport = \Swift_SmtpTransport::newInstance();
        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance($subject)
            ->setFrom($sender)
            ->setTo($recipients)
            ->setBody($body)
        ;

        $mailer->send($message);

        return $this;
    }
}