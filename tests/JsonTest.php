<?php
/**
 * This file is part of the json-cache package.
 *
 * Copyright (c) 2018-2019, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: Besitzer
 * Date: 09.09.2018
 * Time: 09:51
 */
namespace JsonClassTest;

use ExceptionalJSON\DecodeErrorException;
use ExceptionalJSON\EncodeErrorException;
use JsonClass\Json;
use PHPUnit\Framework\TestCase;

final class JsonTest extends TestCase
{
    /**
     * @var Json
     */
    private $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new Json();
    }

    /**
     * @return void
     */
    public function testDecodeFail(): void
    {
        $this->expectException(DecodeErrorException::class);
        $this->expectExceptionMessage('Syntax error');

        $this->object->decode('\'x\': \'123\'');
    }

    /**
     * @return void
     */
    public function testDecode(): void
    {
        self::assertSame('123', $this->object->decode('{"x": "123"}')->x);
    }

    /**
     * @return void
     */
    public function testEncodeFail(): void
    {
        $f = fopen(__FILE__, 'r');

        $this->expectException(EncodeErrorException::class);
        $this->expectExceptionMessage('Type is not supported');

        $this->object->encode($f, 0, -1);
    }

    /**
     * @return void
     */
    public function testEncode(): void
    {
        self::assertSame('"abc"', $this->object->encode('abc', 0, -1));
    }
}
