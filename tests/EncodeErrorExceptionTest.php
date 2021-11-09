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

use JsonClass\EncodeErrorException;
use PHPUnit\Framework\TestCase;

final class EncodeErrorExceptionTest extends TestCase
{
    private EncodeErrorException $object;

    protected function setUp(): void
    {
        $this->object = new EncodeErrorException();
    }

    public function testSetGetJson(): void
    {
        $value = '\'x\': \'123\'';

        $this->object->setValue($value);

        self::assertSame($value, $this->object->getValue());
    }
}
