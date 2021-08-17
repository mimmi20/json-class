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

use ExceptionalJSON\DecodeErrorException;
use ExceptionalJSON\EncodeErrorException;
use ExceptionalJSON\Exception;
use JsonClass\Json;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

use function fopen;

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
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    public function testDecode(): void
    {
        self::assertSame('123', $this->object->decode('{"x": "123"}')->x);
    }

    /**
     * @throws EncodeErrorException
     * @throws Exception
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
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function testEncode(): void
    {
        self::assertSame('"abc"', $this->object->encode('abc', 0, -1));
    }
}
