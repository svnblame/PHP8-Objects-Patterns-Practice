<?php

/* listing 18.09 */

namespace popp\ch18;

use PHPUnit\Framework\TestCase;
use popp\ch18\batch01\UserStore;
use popp\ch18\batch01\Validator;

class Ch18ValidatorTest extends TestCase
{
    private Validator $validator;

    /**
     * @throws \Exception
     */
    protected function setUp(): void
    {
        $store = new UserStore();
        $store->addUser('bob williams', 'bob@example.com', '12345');

        $this->validator = new Validator($store);
    }

    public function testValidateCorrectPass(): void
    {
        $this->assertTrue(
            $this->validator->validateUser(
                'bob@example.com', '12345'),
            'Expecting successful validation'
        );
    }

    /* listing 18.11 */
    public function testValidateIncorrectPass(): void
    {
        $store = $this->createMock(UserStore::class);
        $this->validator = new Validator($store);

        /* listing 18.12 listing 18.13 listing 18.14 */
        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with($this->equalTo('bob@example.com'));

        /* listing 18.15 */
        $store->expects($this->any())
            ->method('getUser')
            ->will($this->returnValue([
                'name' => 'bob williams',
                'mail' => 'bob@example.com',
                'pass' => 'right'
            ]));

        $this->validator->validateUser('bob@example.com', 'wrong');
    }
}
