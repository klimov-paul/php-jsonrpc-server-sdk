<?php
namespace Tests\Technical\Domain\Model;

use PHPUnit\Framework\TestCase;
use Yoanm\JsonRpcServer\Domain\Exception\JsonRpcInvalidParamsException;

/**
 * @covers \Yoanm\JsonRpcServer\Domain\Exception\JsonRpcInvalidParamsException
 */
class JsonRpcInvalidParamsExceptionTest extends TestCase
{
    const DEFAULT_METHOD = 'default-method';
    const DEFAULT_MESSAGE = 'default-message';

    public function testShouldHaveTheRightJsonRpcErrorCode()
    {
        $exception = new JsonRpcInvalidParamsException(self::DEFAULT_MESSAGE);

        $this->assertSame(-32602, $exception->getErrorCode());
    }

    public function testShouldHandleAMessageAnPutItInExceptionData()
    {
        $method = 'my-method';
        $message = 'my-message';

        $exception = new JsonRpcInvalidParamsException($message);

        $this->assertArrayHasKey(
            JsonRpcInvalidParamsException::DATA_MESSAGE_KEY,
            $exception->getErrorData()
        );
        $this->assertSame(
            $message,
            $exception->getErrorData()[JsonRpcInvalidParamsException::DATA_MESSAGE_KEY]
        );
    }
}