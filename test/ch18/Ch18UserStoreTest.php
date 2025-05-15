<?php

/* listing 18.05 listing 18.06 */

namespace popp\ch18;

use PHPUnit\Framework\TestCase;
use popp\ch18\batch03\UserStore;

class Ch18UserStoreTest extends TestCase
{
    private UserStore $store;

    protected function setUp(): void
    {
        $this->store = new UserStore();
    }

    /**
     * @throws \Exception
     */
    public function testGetUser(): void
    {
        $this->store->addUser('bob williams', 'a@b.com', '12345');
        $user = $this->store->getUser('a@b.com');

        $this->assertEquals('a@b.com', $user->getMail());
        $this->assertEquals('bob williams', $user->getName());
        $this->assertEquals('12345', $user->getPass());
    }

    /* listing 18.07 listing 18.08 */
    public function testAddUserShortPass(): void
    {
        $this->expectException(\Exception::class);
        $this->store->addUser('bob williams', 'bob@example.com', 'ff');
    }

    /* listing 18.10 */
    public function testAddUserDuplicate(): void
    {
        try {
            $ret = $this->store->addUser('bob williams', 'a@b.com', '123456');
            $ret = $this->store->addUser('bob stevens', 'a@b.com', '123456');
            $this->fail('Exception should have been thrown');
        } catch (\Exception $e) {
            $const = $this->logicalAnd(
                $this->logicalNot($this->containsEqual('bob stevens')),
                $this->isType('object')
            );

            $this->AssertThat($this->store->getUser('a@b.com'), $const);
        }
    }
}
