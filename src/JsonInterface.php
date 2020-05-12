<?php
/**
 * This file is part of the json-class package.
 *
 * Copyright (c) 2018-2020, Thomas Mueller <mimmi20@live.de>
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
     * @param mixed $value   the value being encoded
     * @param int   $depth   user specified recursion depth
     * @param int   $options bit mask of JSON encode options
     *
     * @throws \ExceptionalJSON\EncodeErrorException When the encode operation fails
     *
     * @return string JSON encoded string
     */
    public function encode($value, int $options = 0, int $depth = 512): string;

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
    public function decode(string $json, bool $assoc = false, int $depth = 512, int $options = 0);
}
