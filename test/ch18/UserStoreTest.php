<?php

/* listing 18.05 listing 18.06 */

namespace popp\ch18;

use PHPUnit\Framework\TestCase;
use popp\ch18\batch01\UserStore;

class UserStoreTest extends TestCase
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

        $this->assertEquals('a@b.com', $user['mail']);
    }

    /* listing 18.07 listing 18.08 */
    public function testAddUserShortPass(): void
    {
        $this->expectException(\Exception::class);
        $this->store->addUser('bob williams', 'bob@example.com', 'ff');
    }
}
