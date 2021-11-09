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

use const JSON_THROW_ON_ERROR;

final class JsonTest extends TestCase
{
    private Json $object;

    protected function setUp(): void
    {
        $this->object = new Json();
    }

    /**
     * @throws DecodeErrorException
     */
    public function testDecodeFail(): void
    {
        $this->expectException(DecodeErrorException::class);
        $this->expectExceptionMessage('Syntax error');

        $this->object->decode('\'x\': \'123\'');
    }

    /**
     * @throws DecodeErrorException
     */
    public function testDecodeFailWithException(): void
    {
        $this->expectException(DecodeErrorException::class);
        $this->expectExceptionMessage('Syntax error');

        $this->object->decode('\'x\': \'123\'', false, JsonInterface::DEFAULT_DEPTH, JSON_THROW_ON_ERROR);
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

    /**
     * @throws EncodeErrorException
     */
    public function testEncodeFail(): void
    {
        $f = fopen(__FILE__, 'r');

        $this->expectException(EncodeErrorException::class);
        $this->expectExceptionMessage('Type is not supported');

        $this->object->encode($f, 0, -1);
    }

    /**
     * @throws EncodeErrorException
     */
    public function testEncodeFailWithException(): void
    {
        $f = fopen(__FILE__, 'r');

        $this->expectException(EncodeErrorException::class);
        $this->expectExceptionMessage('Type is not supported');

        $this->object->encode($f, JSON_THROW_ON_ERROR, -1);
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
