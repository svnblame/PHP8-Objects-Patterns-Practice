<?php declare(strict_types=1);

namespace popp\ch04\batch02;

/* listing 04.07, page 85 */
class ShopProduct 
{
    public const AVAILABLE    = 0;
    public const OUT_OF_STOCK = 1;
    public int $status;

    private string $title;
    private string $producerMainName;
    private string $producerFirstName;
    protected float|int $price;
    private int $discount = 0;
    private int $id = 0;

    /* listing 04.05, page 82 */
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        int|float $price
    ) {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
    }

    public function setID(int $id): void 
    {
        $this->id = $id;
    }

    public function getProducerFirstName(): string 
    {
        return $this->producerFirstName;
    }

    public function getProducerMainName(): string 
    {
        return $this->producerMainName;
    }

    public function setDiscount(int $num): void 
    {
        $this->discount = $num;
    }

    public function getDiscount(): int 
    {
        return $this->discount;
    }

    public function getTitle(): string 
    {
        return $this->title;
    }

    public function getPrice(): float 
    {
        return ($this->price - $this->discount);
    }

    public function getProducer(): string 
    {
        return "{$this->producerFirstName}" . 
            " {$this->producerMainName}";
    }

    public function getSummaryLine(): string 
    {
        $base = "$this->title ( $this->producerMainName, ";
        $base .= "$this->producerFirstName )";
        return $base;
    }

    public static function getInstance(int $id, \PDO $pdo): ShopProduct 
    {
        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (empty($row)) {
            return null;
        }

        switch ($row['type']) {
            case "book":
                $product = new BookProduct(
                    $row['title'],
                    $row['firstname'],
                    $row['mainname'],
                    (float) $row['price'],
                    (int) $row['numpages']
                );
                break;
            case "cd":
                $product = CdProduct(
                    $row['title'],
                    $row['firstname'],
                    $row['mainname'],
                    (float) $row['price'],
                    (int) $row['playlength']
                );
            default:
                $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
                $product = new ShopProduct(
                    $row['title'],
                    $firstname,
                    $row['mainname'],
                    (float) $row['price']
                );
        }

        $product->setId((int) $row['id']);
        $product->setDiscount((int) $row['discount']);

        return $product;
    }
}
