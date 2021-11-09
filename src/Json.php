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

use JsonException;

use function json_decode;
use function json_encode;
use function json_last_error;
use function json_last_error_msg;

use const JSON_ERROR_NONE;

final class Json implements JsonInterface
{
    /**
     * Returns the JSON representation of a value.
     *
     * @param mixed $value   the value being encoded
     * @param int   $depth   user specified recursion depth
     * @param int   $options bit mask of JSON encode options
     * @phpstan-param int<1, max> $depth
     *
     * @return string JSON encoded string
     *
     * @throws EncodeErrorException when the encode operation fails
     */
    public function encode($value, int $options = JsonInterface::DEFAULT_OPTIONS, int $depth = JsonInterface::DEFAULT_DEPTH): string
    {
        try {
            $result = json_encode($value, $options, $depth);
        } catch (JsonException $exception) {
            $ex = new EncodeErrorException($exception->getMessage(), $exception->getCode(), $exception);

            $ex->setValue($value);

            throw $ex;
        }

        $code = json_last_error();

        if (JSON_ERROR_NONE !== $code || false === $result) {
            $ex = new EncodeErrorException(json_last_error_msg(), $code);

            $ex->setValue($value);

            throw $ex;
        }

        return $result;
    }

    /**
     * Decodes a JSON string.
     *
     * @param string $json    the JSON string being decoded
     * @param bool   $assoc   when TRUE, returned objects will be converted into associative arrays
     * @param int    $depth   user specified recursion depth
     * @param int    $options bit mask of JSON decode options
     * @phpstan-param int<1, max> $depth
     *
     * @return mixed the value encoded in JSON in appropriate PHP type
     *
     * @throws DecodeErrorException when the decode operation fails
     */
    public function decode(string $json, bool $assoc = false, int $depth = JsonInterface::DEFAULT_DEPTH, int $options = JsonInterface::DEFAULT_OPTIONS)
    {
        try {
            $result = json_decode($json, $assoc, $depth, $options);
        } catch (JsonException $exception) {
            $ex = new DecodeErrorException($exception->getMessage(), $exception->getCode(), $exception);

            $ex->setJson($json);

            throw $ex;
        }

        $code = json_last_error();

        if (JSON_ERROR_NONE !== $code) {
            $ex = new DecodeErrorException(json_last_error_msg(), $code);

            $ex->setJson($json);

            throw $ex;
        }

        return $result;
    }
}
