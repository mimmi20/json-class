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

namespace JsonClassTest;

use JsonClass\DecodeErrorException;
use JsonClass\EncodeErrorException;
use JsonClass\Json;
use JsonClass\JsonInterface;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use stdClass;

use function assert;
use function fopen;

use const JSON_ERROR_SYNTAX;
use const JSON_ERROR_UNSUPPORTED_TYPE;
use const JSON_THROW_ON_ERROR;

final class JsonTest extends TestCase
{
    private Json $object;

    protected function setUp(): void
    {
        $this->object = new Json();
    }

    public function testDecodeFail(): void
    {
        $json = '\'x\': \'123\'';

        try {
            $this->object->decode($json);

            self::fail('DecodeErrorException expected');
        } catch (DecodeErrorException $ex) {
            self::assertSame('Syntax error', $ex->getMessage());
            self::assertSame(JSON_ERROR_SYNTAX, $ex->getCode());
            self::assertSame($json, $ex->getJson());
        }
    }

    public function testDecodeFailWithException(): void
    {
        $json = '\'x\': \'123\'';

        try {
            $this->object->decode($json, false, JsonInterface::DEFAULT_DEPTH, JSON_THROW_ON_ERROR);

            self::fail('DecodeErrorException expected');
        } catch (DecodeErrorException $ex) {
            self::assertSame('Syntax error', $ex->getMessage());
            self::assertSame(JSON_ERROR_SYNTAX, $ex->getCode());
            self::assertSame($json, $ex->getJson());
        }
    }

    /**
     * @throws DecodeErrorException
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    public function testDecode(): void
    {
        $decoded = $this->object->decode('{"x": "123"}');

        assert($decoded instanceof stdClass);

        self::assertSame('123', $decoded->x);
    }

    public function testEncodeFail(): void
    {
        $f = fopen(__FILE__, 'r');

        try {
            $this->object->encode($f, JsonInterface::DEFAULT_OPTIONS, -1);

            self::fail('EncodeErrorException expected');
        } catch (EncodeErrorException $ex) {
            self::assertSame('Type is not supported', $ex->getMessage());
            self::assertSame(JSON_ERROR_UNSUPPORTED_TYPE, $ex->getCode());
            self::assertSame($f, $ex->getValue());
        }
    }

    public function testEncodeFailWithException(): void
    {
        $f = fopen(__FILE__, 'r');

        try {
            $this->object->encode($f, JSON_THROW_ON_ERROR, -1);

            self::fail('EncodeErrorException expected');
        } catch (EncodeErrorException $ex) {
            self::assertSame('Type is not supported', $ex->getMessage());
            self::assertSame(JSON_ERROR_UNSUPPORTED_TYPE, $ex->getCode());
            self::assertSame($f, $ex->getValue());
        }
    }

    /**
     * @throws EncodeErrorException
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    public function testEncode(): void
    {
        self::assertSame('"abc"', $this->object->encode('abc', 0, -1));
    }
}
