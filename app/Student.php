<?php
declare(strict_types=1);

namespace bslagter\klas\app;

final class Student
{
    /** @var Group */
    private $group;
    /** @var string */
    private $name;
    /** @var Address */
    private $address;
    /** @var int */
    private $segment;

    public function __construct(Group $group, string $name, Address $address)
    {
        $this->group = $group;
        $this->name = $name;
        $this->address = $address;
    }

    public function getGroup(): Group
    {
        return $this->group;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getSegment(): int
    {
        return $this->segment;
    }

    public function getSegmentPlusOne(): int
    {
        return $this->segment + 1;
    }

    public function setSegment(int $segment)
    {
        $this->segment = $segment;
        return $this;
    }

    public function hasSegment(): bool
    {
        return isset($this->segment);
    }
}
