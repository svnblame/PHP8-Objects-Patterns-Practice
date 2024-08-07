<?php declare(strict_types=1);

/* listing 05.84 */
namespace popp\ch05\batch09;

#[info]
class Person
{
    /* listing 05.84 */
    private string $name;
    private string $companyId;
    private string $department;

    /* listing 05.86 */
    #[moreinfo]
    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    /* listing 05.88 */
    #[ApiInfo("The 3 digit company identifier", "A five character department tag")]
    public function setInfo(int $companyId, string $department): void
    {
        $this->companyId = $companyId;
        $this->department = $department;
    }
}