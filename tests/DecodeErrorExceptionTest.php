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
use PHPUnit\Framework\TestCase;

final class DecodeErrorExceptionTest extends TestCase
{
    private const JSON = '\'x\': \'123\'';
    private DecodeErrorException $object;

    protected function setUp(): void
    {
        $this->object = new DecodeErrorException();
    }

    public function testSetGetJson(): void
    {
        $this->object->setJson(self::JSON);

        self::assertSame(self::JSON, $this->object->getJson());
    }
}
