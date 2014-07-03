<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature\ServiceAware;

use Ftven\Build\Common\Service\Git\GitServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait GitServiceAwareTrait
{
    /**
     * @var GitServiceInterface
     */
    protected $gitService;
    /**
     * @param GitServiceInterface $gitService
     *
     * @return $this
     */
    public function setGitService(GitServiceInterface $gitService)
    {
        $this->gitService = $gitService;

        return $this;
    }
    /**
     * @return GitServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getGitService()
    {
        if (null === $this->gitService) {
            throw new \RuntimeException('Git service not set', 500);
        }

        return $this->gitService;
    }
}