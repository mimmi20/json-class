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

interface JsonInterface
{
    public const DEFAULT_DEPTH   = 512;
    public const DEFAULT_OPTIONS = 0;

    /**
     * Returns the JSON representation of a value.
     *
     * @param mixed $value the value being encoded
     * @param int   $flags bit mask of JSON encode options
     * @param int   $depth user specified recursion depth
     * @phpstan-param int<1, max> $depth
     *
     * @return string JSON encoded string
     *
     * @throws EncodeErrorException when the encode operation fails
     */
    public function encode($value, int $flags = self::DEFAULT_OPTIONS, int $depth = self::DEFAULT_DEPTH): string;

    /**
     * Decodes a JSON string.
     *
     * @param string $json  the JSON string being decoded
     * @param bool   $assoc when TRUE, returned objects will be converted into associative arrays
     * @param int    $depth user specified recursion depth
     * @param int    $flags bit mask of JSON decode options
     * @phpstan-param int<1, max> $depth
     *
     * @return mixed the value encoded in JSON in appropriate PHP type
     *
     * @throws DecodeErrorException when the decode operation fails
     */
    public function decode(string $json, bool $assoc = false, int $depth = self::DEFAULT_DEPTH, int $flags = self::DEFAULT_OPTIONS);
}
