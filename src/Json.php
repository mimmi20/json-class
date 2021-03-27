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

use ExceptionalJSON\DecodeErrorException;
use ExceptionalJSON\EncodeErrorException;

use function ExceptionalJSON\decode;
use function ExceptionalJSON\encode;

final class Json implements JsonInterface
{
    /**
     * Returns the JSON representation of a value.
     *
     * @param mixed $value   the value being encoded
     * @param int   $depth   user specified recursion depth
     * @param int   $options bit mask of JSON encode options
     *
     * @return string JSON encoded string
     *
     * @throws EncodeErrorException when the encode operation fails
     */
    public function encode($value, int $options = self::DEFAULT_OPTIONS, int $depth = self::DEFAULT_DEPTH): string
    {
        return encode($value, $options, $depth);
    }

    /**
     * Decodes a JSON string.
     *
     * @param string $json    the JSON string being decoded
     * @param bool   $assoc   when TRUE, returned objects will be converted into associative arrays
     * @param int    $depth   user specified recursion depth
     * @param int    $options bit mask of JSON decode options
     *
     * @return mixed the value encoded in JSON in appropriate PHP type
     *
     * @throws DecodeErrorException when the decode operation fails
     */
    public function decode(string $json, bool $assoc = false, int $depth = self::DEFAULT_DEPTH, int $options = self::DEFAULT_OPTIONS)
    {
        return decode($json, $assoc, $depth, $options);
    }
}
