<?php declare(strict_types=1);

namespace popp\ch13\batch07;

/* listing 13.40 */
class IdentityObject
{
    protected ?Field $currentField = null;
    protected array $fields = [];
    protected array $enforce = [];

    // And identity object can start off empty or with a field
    public function __construct(?string $field = null, ?array $enforce = null)
    {
        if (! is_null($enforce)) {
            $this->enforce = $enforce;
        }

        if (! is_null($field)) {
            $this->field($field);
        }
    }

    // field names to which this is constrained
    public function getObjectFields(): array
    {
        return  $this->enforce;
    }

    // kick off a new field
    // will throw an error if a current field is not complete
    // (ie age rather than age > 40)
    // the method returns a reference to the current object
    // allowing for fluent syntax
    /**
     * @throws \Exception
     */
    public function field(string $fieldName): self
    {
        if (! $this->isVoid() && $this->currentField->isIncomplete()) {
            throw new \Exception('Incomplete field');
        }

        $this->enforceField($fieldName);

        if (isset($this->fields[$fieldName])) {
            $this->currentField = $this->fields[$fieldName];
        } else {
            $this->currentField = new Field($fieldName);
            $this->fields[$fieldName] = $this->currentField;
        }

        return $this;
    }

    // does the identity object have any fields yet?
    public function isVoid(): bool
    {
        return empty($this->fields);
    }

    // is the given fieldName legal?
    /**
     * @throws \Exception
     */
    public function enforceField(string $fieldName): void
    {
        if (! in_array($fieldName, $this->enforce) && ! empty($this->enforce)) {
            $forceList = implode(', ', $this->enforce);
            throw new \Exception("Field '{$fieldName}' is not a legal field ($forceList)");
        }
    }

    // add an equality operator to  the current field
    // ie 'age' becomes age=40
    // returns a reference to the current object (via operator())
    public function eq($value): self
    {
        return $this->operator("=", $value);
    }

    // less than
    public function lt($value): self
    {
        return $this->operator("<", $value);
    }

    // greater than
    public function gt($value): self
    {
        return $this->operator(">", $value);
    }

    // does the work for the operator methods
    // gets the current field and adds the operator and test value to it
    /**
     * @throws \Exception
     */
    private function operator(string $symbol, mixed $value): self
    {
        if ($this->isVoid()) {
            throw new \Exception("Operator '{$symbol}' is not defined");
        }

        $this->currentField->addTest($symbol, $value);

        return $this;
    }

    // return all comparisons built up so far in an associative array
    public function getComps(): array
    {
        $ret = [];

        foreach ($this->fields as $field) {
            $ret = array_merge($ret, $field->getComps());
        }

        return $ret;
    }

    public function __toString(): string
    {
        $ret = [];

        foreach ($this->getComps() as $compData) {
            $ret[] = "{$compData['name']} {$compData['operator']} {$compData['value']}";
        }

        return implode(" AND ", $ret);
    }

}
