<?php
/**
 * This file is part of the json-class package.
 *
 * Copyright (c) 2018-2019, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);
namespace JsonClass;

final class Json implements JsonInterface
{
    /**
     * Returns the JSON representation of a value.
     *
     * @param mixed $value   the value being encoded
     * @param int   $depth   user specified recursion depth
     * @param int   $options bit mask of JSON encode options
     *
     * @throws \ExceptionalJSON\EncodeErrorException When the encode operation fails
     *
     * @return string JSON encoded string
     */
    public function encode($value, int $options = self::DEFAULT_OPTIONS, int $depth = self::DEFAULT_DEPTH): string
    {
        return \ExceptionalJSON\encode($value, $options, $depth);
    }

    /**
     * Decodes a JSON string.
     *
     * @param string $json    the JSON string being decoded
     * @param bool   $assoc   when TRUE, returned objects will be converted into associative arrays
     * @param int    $depth   user specified recursion depth
     * @param int    $options bit mask of JSON decode options
     *
     * @throws \ExceptionalJSON\DecodeErrorException when the decode operation fails
     *
     * @return mixed the value encoded in JSON in appropriate PHP type
     */
    public function decode(string $json, bool $assoc = false, int $depth = self::DEFAULT_DEPTH, int $options = self::DEFAULT_OPTIONS)
    {
        return \ExceptionalJSON\decode($json, $assoc, $depth, $options);
    }
}
