<?php declare(strict_types=1);

namespace popp\ch12\batch10;

/* listing 12.43 */
class VenueManager extends Base {
    private string $addVenue = 'INSERT INTO venue (name) VALUES (?)';
    private string $addSpace = 'INSERT INTO space (name, venue) VALUES (?, ?)';
    private string $addEvent = 'INSERT INTO event (name, space, start, duration) VALUES (?, ?, ?, ?)';

    /* listing 12.44 */
    public function addVenue(string $name, array $spaces): array
    {
        $pdo = $this->getPdo();
        $ret = [];
        $ret['venue'] = [$name];
        $stmt =  $pdo->prepare($this->addVenue);
        $stmt->execute($ret['venue']);
        $vid = $pdo->lastInsertId();

        $ret['spaces'] = [];

        $stmt = $pdo->prepare($this->addSpace);

        foreach ($spaces as $spaceName) {
            $values = [$spaceName, $vid];
            $stmt->execute($values);
            $sid = $pdo->lastInsertId();
            array_unshift($values, $sid);
            $ret['spaces'][] = $values;
        }

        return $ret;
    }

    /* listing 12.45 */
    public function bookEvent(int $spaceId, string $name, int $time, int $duration): void
    {
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare($this->addEvent);
        $stmt->execute([$name, $spaceId, $time, $duration]);
    }
}
