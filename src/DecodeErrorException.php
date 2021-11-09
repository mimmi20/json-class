<?php
/**
 * This file is part of the json-class package.
 *
 * Copyright (c) 2018-2021, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace JsonClass;

use RuntimeException;

/**
 * Exception thrown when a JSON decoding operation fails.
 */
final class DecodeErrorException extends RuntimeException
{
    private ?string $json = null;

    public function setJson(string $json): void
    {
        $this->json = $json;
    }

    public function getJson(): ?string
    {
        return $this->json;
    }
}
