<?php

/* listing 18.09 */

namespace ch18;

use PHPUnit\Framework\TestCase;
use popp\ch18\batch01\UserStore;
use popp\ch18\batch01\Validator;

class ValidatorTest extends TestCase
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
}
